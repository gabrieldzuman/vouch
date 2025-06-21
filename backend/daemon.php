<?php
if (!defined('MSG_IPC_NOWAIT')) {
    define('MSG_IPC_NOWAIT', 1);
}

$key = crc32(__FILE__);
$queue = msg_get_queue($key);

echo "Daemon rodando...\n";

try {
    $pdo = new PDO('sqlite:database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}

while (true) {
    if (msg_receive($queue, 1, $msgtype, 1024, $msg, true, MSG_IPC_NOWAIT, $err)) {
        $dados = $msg['dados'];
        echo "Recebido: $dados\n";

        try {
            $stmt = $pdo->prepare("INSERT INTO registros (dados) VALUES (:dados)");
            $stmt->execute([':dados' => $dados]);
            $resposta = "Sucesso ao inserir: $dados";
        } catch (Exception $e) {
            $resposta = "Erro: " . $e->getMessage();
        }

        $msgResposta = ['tipo' => 2, 'dados' => $resposta];
        msg_send($queue, 2, $msgResposta);
    }

    sleep(1);
}
