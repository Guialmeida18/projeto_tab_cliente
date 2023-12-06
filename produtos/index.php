<?php
require_once "../configuracao/pdo.php";
$stmt = $pdo->prepare("SELECT * FROM produtos");
$stmt->execute();
$empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title> cadastro </title>
</head>
<body>
<form method="POST" action="cadastro_produto.php">
    <ul>
        <li><a href="index.php"> home</a></li>
        <li><a href="cadastro.php"> cadastrar</a></li>

    </ul>
    <table border="1">
        <thead>
        <tr>
            <th>nome produto</th>
            <th>descricao do produto</th>
            <th>valor do produto</th>
            <th>quantidade em estoque</th>
            <th>codigo do produto</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $produtos = $empresas;
        foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['nome_produto'] ?></td>
                <td><?= $produto['descricao_do_produto'] ?></td>
                <td><?= $produto['valor_do_produto'] ?></td>
                <td><?= $produto['quantidade_em_estoque'] ?></td>
                <td><?= $produto['codigo_do_produto'] ?></td>
                <td><a href="editar.php?id_produto=<?= $produto['id_produto'] ?>">editar</a></td>
                <td><a href="remover_produto.php?id_produto=<?= $produto['id_produto'] ?>">remover</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>
</body>
</html>