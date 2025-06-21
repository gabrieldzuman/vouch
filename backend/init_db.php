<?php
$db = new PDO('sqlite:database.db');

$db->exec("CREATE TABLE IF NOT EXISTS registros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    dados TEXT NOT NULL
)");

echo "Banco criado com sucesso.\n";
?>