<?php
include("conexao.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

echo "<h1>Lista de Usuários</h1>";

if ($resultado) {
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_array($resultado)) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px 0;'>";
            echo "Nome: " . htmlspecialchars($linha['nome']) . "<br>";
            echo "Email: " . htmlspecialchars($linha['email']) . "<br>";
            echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a> | ";
            echo "<a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>";
            echo "</div>";
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($conn);
}
?>
<a href='cadastrar.php'>Cadastrar novo</a>
