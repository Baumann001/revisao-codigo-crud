<?php
// Conexão com o banco (contém erro de variável e de conexão)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "crud_exemplo";

$conn = mysqli_connect($host, $user, $password, $dbname); 

if (!$conn->connect_error)) {
     die("Conexao falhou: " . $conn->connect_error);
}
?>

