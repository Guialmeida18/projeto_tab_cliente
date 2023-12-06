<!DOCTYPE html>
<html>
<head>
    <title> cadastro produtos </title>
</head>
</body>
<ul>
    <li><a href="index.php"> home</a></li>
    <li><a href="cadastro.php"> cadastrar</a></li>

</ul>
<h2>Cadastro de produtos</h2>
<form method="POST" action="cadastro_produto.php">
    <table
    <tr>
        <td>nome produto:</td>
        <td><input type="text" name=" nome produto" required></td>
    </tr>
    <tr>
        <td>Descricao:</td>
        <td><input type="text" name="Descricao do produto" required></td>
    </tr>
    <tr>
        <td>valor do produto:</td>
        <td><input type="text" name="valor do produto" required></td>
    </tr>
    <tr>
        <td>quantidade em estoque:</td>
        <td><input type="text" name="quantidade em estoque"required></td>
    </tr>
    <tr>
        <td>codigo do produto:</td>
        <td><input type="text" name="codigo do produto" required></td>
    </tr>
    <td><input type="submit" name="cadastrar" value="cadastar"></td>
</form>
</tr>