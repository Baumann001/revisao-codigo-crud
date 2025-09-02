<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);

    if (empty($nome) || empty($email)) {
        echo "Nome e email são obrigatórios!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido!";
    } else {
        $nome = mysqli_real_escape_string($conn, $nome);
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
    }
}

?>

<form method="POST">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Cadastrar">
</form>