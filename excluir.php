<?php
// Conecta ao banco de dados
$host = "127.0.0.1"; //Localhost
$user = "root"; //usuário
$pass = ""; //senha
$dbname = "fluxo_de_caixa"; //meubanco
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Verifica se o método HTTP utilizado é o POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém o ID do lançamento a ser excluído
  $id = $_POST["id"];

  // Prepara a consulta SQL para excluir o lançamento com o ID especificado
  $sql = "DELETE FROM lancamentos WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  
  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
  
  // Interrompe a execução do script
  exit();
}
?>