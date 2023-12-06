<?php
require_once "../configuracao/pdo.php";

if (isset($_GET['id_produto'])) {
    $id = $_GET['id_produto'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id_produto = ?");
        $stmt->execute([$id]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$registro) {
            throw new Exception("Registro não encontrado.");
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }
} else {
    echo "ID não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Editar Dados</h1>
<form method="POST" action="editar_processar.php">
    <input type="hidden" name="id" value="<?= $registro['id_produto'] ?>">
    <table>
        <tr>
            <td><label for="nome_produto">Nome do produto:</label></td>
            <td><input type="text" name="nome_produto" id="nome_produto" value="<?= isset($registro['nome_produto']) ? htmlspecialchars($registro['nome_produto']) : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="descricao_do_produto">Descrição do produto:</label></td>
            <td><input type="text" name="descricao_do_produto" id="descricao_do_produto" value="<?= isset($registro['descricao_do_produto']) ? htmlspecialchars($registro['descricao_do_produto']) : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="valor_produto">Valor do produto:</label></td>
            <td><input type="text" name="valor_produto" id="valor_produto" value="<?= isset($registro['valor_produto']) ? htmlspecialchars($registro['valor_produto']) : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="quantidade_estoque">Quantidade em estoque:</label></td>
            <td><input type="text" name="quantidade_estoque" id="quantidade_estoque" value="<?= isset($registro['quantidade_estoque']) ? htmlspecialchars($registro['quantidade_estoque']) : '' ?>"></td>
        </tr>
        <tr>
            <td><label for="codigo_produto">Código do produto:</label></td>
            <td><input type="text" name="codigo_produto" id="codigo_produto" value="<?= isset($registro['codigo_produto']) ? htmlspecialchars($registro['codigo_produto']) : '' ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="Salvar" value="Salvar"></td>
        </tr>
    </table>
</form>
</body>
</html>

