<?php
// Inclua o código para conectar ao banco de dados
require_once "../configuracao/pdo.php";

// Consulta ao banco de dados para obter a lista de produtos
$consultaProdutos = $pdo->query("SELECT id_produto, nome_produto FROM produtos");
$produtos = $consultaProdutos->fetchAll(PDO::FETCH_ASSOC);

$consultaClientes = $pdo->query("SELECT id_empresa, razao_social FROM empresas");
$clientes = $consultaClientes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Venda</title>
</head>
<body>

<h2>Formulário de Venda</h2>
<form action="processar_venda.php" method="post">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>

    <label for="cliente">Cliente:</label>
    <label for="cliente">Cliente:</label>
    <select id="cliente" name="cliente">
        <option value="">Selecione um cliente</option>
        <?php foreach ($clientes as $cliente): ?>
            <option value="<?php echo $cliente['id_empresa']; ?>">
                <?php echo $cliente['razao_social']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label for="produto">Produto:</label>
    <select id="produto" name="produto">
        <option value="">Selecione um produto</option>
        <?php foreach ($produtos as $produto): ?>
            <option value="<?php echo $produto['id_produto']; ?>">
                <?php echo $produto['nome_produto']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="quantidade">Quantidade:</label>
    <input type="number" id="quantidade" name="quantidade" required>

    <label for="valor_total">Valor Total:</label>
    <input type="number" id="valor_total" name="valor_total" required>

    <label for="situacao">Situação:</label>
    <input type="text" id="situacao" name="situacao" required>

    <input type="submit" value="Registrar Venda">
</form>

</body>
</html>

