<?php
require_once "../configuracao/pdo.php";
$stmt = $pdo->prepare("SELECT * FROM empresas");
$stmt->execute();
$empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title> cadastro </title>
</head>
<body>
<form method="POST" action="cadastro_emp.php">
    <ul>
        <li><a href="index.php"> home</a></li>
        <li><a href="cadastro.php"> cadastrar</a></li>

    </ul>
    <table border="1">

        <thead>
        <tr>
            <th>razao social</th>
            <th>cnpj</th>
            <th>endereco</th>
            <th>cep</th>
            <th>email</th>
            <th>cidade</th>
            <th> uf</th>
            <th>numero</th>
            <th>telefone</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= $empresa['razao_social'] ?></td>
                <td><?= $empresa['cnpj'] ?></td>
                <td><?= $empresa['endereco'] ?></td>
                <td><?= $empresa['cep'] ?></td>
                <td><?= $empresa['telefone'] ?></td>
                <td><?= $empresa['email'] ?></td>
                <td><?= $empresa['cidade'] ?></td>
                <td><?= $empresa['uf'] ?></td>
                <td><?= $empresa['numero'] ?></td>
                <td><a href="editar.php?id_empresa=<?= $empresa['id_empresa'] ?>">editar </a></td>
                <td><a href="remover.php?id_empresa=<?= $empresa['id_empresa'] ?>">remover </a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </tbody>
    </table>
</body>
</html>