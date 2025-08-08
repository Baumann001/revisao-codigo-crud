<?php
// Configurações de conexão
$host = "localhost";
$user = "root";
$password = "";
$database = "crud_exemplo"; 

// Criar conexão
$conn = mysqli_connect($host, $user, $password, $database);

// Verificar conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida!";
}
?>