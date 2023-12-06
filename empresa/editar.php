<?php
require_once "../configuracao/pdo.php";

// Verifica se o ID foi fornecido na URL
if (isset($_GET['id_empresa'])) {
    $id = $_GET['id_empresa'];

    // Consulta para obter os dados do registro com o ID fornecido
    $stmt = $pdo->prepare("SELECT * FROM empresas WHERE id_empresa = ?");
    $stmt->execute([$id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o registro existe
    if (!$registro) {
        echo "Registro não encontrado.";
        exit();
    }
} else {
    echo "ID não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
</head>
<body>
<h1>Editar Dados</h1>
<form method="POST" action="editar_processar.php">
    <input type="hidden" name="id_empresa" value="<?= $registro['id_empresa'] ?>">
    <table>
    <tr>
        <td>Razão Social:</td>
        <td><input type="text" name="razao_social" value="<?= $registro['razao_social'] ?>"></td>
    </tr>
    <tr>
        <td>CNPJ:</td>
        <td><input type="text" name="cnpj" value="<?= $registro['cnpj'] ?>"></td>
    </tr>

    <tr>
        <td>endereco:</td>
        <td><input type="text" name="endereco" value="<?= $registro['endereco'] ?>"></td>
    </tr>

    <tr>
        <td>cep:</td>
        <td><input type="text" name="cep" value="<?= $registro['cep'] ?>"></td>
    </tr>

    <tr>
        <td>email:</td>
        <td><input type="text" name="email" value="<?= $registro['email'] ?>"></td>
    </tr>

    <tr>
        <td>cidade:</td>
        <td><input type="text" name="cidade" value="<?= $registro['cidade'] ?>"></td>
    </tr>

    <tr>
        <td>uf:</td>
        <td><input type="text" name="uf" value="<?= $registro['uf'] ?>"></td>
    </tr>

    <tr>
        <td>numero:</td>
        <td><input type="text" name="numero" value="<?= $registro['numero'] ?>"></td>
    </tr>

    <tr>
        <td>telefone:</td>
        <td><input type="text" name="telefone" value="<?= $registro['telefone'] ?>"></td>
    </tr>


    <!-- Adicione mais campos conforme necessário -->
    <tr>
        <td><input type="submit" name="Salvar" value="Salvar"></td>
    </tr>
    </table>
</form>
</body>
</html>

