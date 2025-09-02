<?php
include("conexao.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID não fornecido!");
}

$id = (int)$_GET['id'];

if ($id <= 0) {
    die("ID inválido!");
}

$sql = "SELECT nome FROM usuarios WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Usuário não encontrado!");
}

$usuario = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Usuário excluído com sucesso! <a href='index.php'>Ver lista</a>";
        exit();
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
</head>
<body>
    <h1>Excluir Usuário</h1>
    <p>Tem certeza que deseja excluir o usuário: <strong><?php echo htmlspecialchars($usuario['nome']); ?></strong>?</p>

    <form method="POST">
        <button type="submit" name="confirmar" value="1">Sim, excluir</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>

<?php mysqli_close($conn); ?>
