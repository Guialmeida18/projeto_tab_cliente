<?php
global $pdo;
require_once "../configuracao/pdo.php";

// Execute a consulta para obter os dados das vendas
$sql = "SELECT * FROM vendas";
$result = $pdo->query($sql);
$vendas = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Vendas</title>
</head>
<body>
<form method="POST" action="form_venda.php">
    <ul>
        <li><a href="exibir_venda.php">Home</a></li>
        <li><a href="form_venda.php">Cadastrar</a></li>
    </ul>
    <h1>Tabela de Vendas</h1>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Situação</th>
            <th>Ações</th> <!-- Nova coluna para botões de ação -->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= isset($venda['id_venda']) ? $venda['id_venda'] : 'N/A' ?></td>
                <td><?= isset($venda['descricao']) ? $venda['descricao'] : 'N/A' ?></td>
                <td><?= isset($venda['id_cliente']) ? $venda['id_cliente'] : 'N/A' ?></td>
                <td>
                    <?php
                    // Aqui, você precisa trazer o nome do produto associado
                    // Supondo que a coluna produto na tabela vendas contenha o ID do produto
                    $produtoId = isset($venda['id_produto']) ? $venda['id_produto'] : null;

                    if (!empty($produtoId)) {
                        // Consulta para obter o nome do produto
                        $queryProduto = $pdo->query("SELECT nome_produto FROM produtos WHERE id_produto = $produtoId");
                        $produto = $queryProduto->fetch(PDO::FETCH_ASSOC);

                        // Se o produto for encontrado, exiba o nome; caso contrário, exiba uma mensagem
                        echo $produto ? $produto['nome_produto'] : 'Produto não encontrado';
                    } else {
                        echo 'N/A';
                    }
                    ?>
                </td>
                <td><?= isset($venda['quantidade']) ? $venda['quantidade'] : 'N/A' ?></td>
                <td><?= isset($venda['valor_total']) ? $venda['valor_total'] : 'N/A' ?></td>
                <td><?= isset($venda['situacao']) ? $venda['situacao'] : 'N/A' ?></td>
                <td>
                    <form method="POST" action="vender.php">
                        <input type="hidden" name="venda_id" value="<?= $venda['id_venda']; ?>">
                        <button type="submit">Vender</button>
                    </form>
                    <form method="POST" action="remover.php">
                        <input type="hidden" name="venda_id" value="<?= $venda['id_venda'] ?>">
                        <button type="submit">Remover</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>
</body>
</html>