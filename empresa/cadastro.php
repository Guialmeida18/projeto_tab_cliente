 <!DOCTYPE html>
 <?php
 global $empresas
 ?>

<html>
<head>
    <title> cadastro </title>
</head>
</body>
<ul>
    <li><a href="index.php"> home</a></li>
    <li><a href="cadastro.php"> cadastrar</a></li>

</ul>
<h2>Cadastro de empresas</h2>
<form method="POST" action="cadastro_emp.php">
    <table
        <tr>
            <td>razao social:</td>
            <td><input type="text" name="razao_social" required></td>
        </tr>
    <tr>
        <td>cnpj:</td>
        <td><input type="text" name="cnpj" required></td>
    </tr>
    <tr>
        <td>endereco:</td>
        <td><input type="text" name="endereco" required></td>
    </tr>
    <tr>
        <td>cep:</td>
        <td><input type="text" name="cep"required></td>
    </tr>
    <tr>
        <td>email:</td>
        <td><input type="text" name="email" required></td>
    </tr>
    <tr>
        <td>cidade:</td>
        <td><input type="text" name="cidade"required></td>
    </tr>
    <tr>
        <td>uf:</td>
        <td><input type="text" name="uf" required></td>
    </tr>
    <tr>
        <td>numero:</td>
        <td><input type="text" name="numero" required></td>
    </tr>
    <tr>
        <td>telefone:</td>
        <td><input type="text" name="telefone" required </td>
    </tr>
    <tr>

    <tr>
        <td><input type="submit" name="cadastrar" value="cadastrar"></td><br>
</form>
    </tr>

<!--    --><?php //foreach ($empresas as $empresa): ?>
<!--    <tr>-->
<!--        <td>--><?php //=$empresa['razao social']?><!--</td>-->
<!--        <td>--><?php //=$empresa['cnpj']?><!--</td>-->
<!--        <td>--><?php //=$empresa['endereco']?><!--</td>-->
<!--        <td>--><?php //=$empresa['cep']?><!--</td>-->
<!--        <td>--><?php //=$empresa['telefone']?><!--</td>-->
<!--        <td>--><?php //=$empresa['email']?><!--</td>-->
<!--        <td>--><?php //=$empresa['ciade']?><!--</td>-->
<!--        <td>--><?php //=$empresa['uf']?><!--</td>-->
<!--        <td>--><?php //=$empresa['numero']?><!--</td>-->
<!--        <td>-->
<!--            <form method="post" action="">-->
<!--                <input type="hidden" name="edit_id" value="--><?php //= $empresa['id'] ?><!--">-->
<!--                <input type="submit" name="editar" value="Editar">-->
<!--            </form>-->
<!--            <form method="post" action="">-->
<!--                <input type="hidden" name="excluir_id" value="--><?php //= $empresa['id'] ?><!--">-->
<!--                <input type="submit" name="excluir" value="Excluir">-->
<!--            </form>-->
<!---->
<!--        </td>-->
<!--    </tr>-->
<!--    --><?php //endforeach;?>
<!--</table>-->


</body>
</html>