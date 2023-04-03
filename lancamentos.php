<?php
// Conecta ao banco de dados
$host = "127.0.0.1"; //Localhost
$user = "root"; //usuário
$pass = ""; //senha
$dbname = "fluxo_de_caixa"; //meubanco
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}
?>