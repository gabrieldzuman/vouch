<?php
$key = crc32(__FILE__);
$queue = msg_get_queue($key);

$dados = $_POST['dados'] ?? '';

if (empty($dados)) {
    die("Dado não fornecido.");
}

$msg = ['tipo' => 1, 'dados' => $dados];

if (!msg_send($queue, 1, $msg, true, false, $err)) {
    die("Falha ao enviar mensagem: $err");
}

if (msg_receive($queue, 2, $msgtype, 1024, $response, true, 0, $err)) {
    echo "<h3>Resposta do daemon: {$response['dados']}</h3>";
} else {
    echo "Erro ao receber resposta: $err";
}
?>
<a href="index.php">Voltar</a>
