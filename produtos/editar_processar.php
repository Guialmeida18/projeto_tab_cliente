<?php

//require_once "../configuracao/pdo.php";: Inclui o arquivo que contém a configuração do PDO para conectar ao banco de dados.
require_once "../configuracao/pdo.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {: Verifica se o formulário foi enviado usando o método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// id = $_POST['id'];: Obtém o valor do campo 'id' do formulário usando o método POST.
    $id = $_POST['id_produto'];

//$nome_do_produto = $_POST['nome_produto'];: Obtém o valor do campo 'nome_produto' do formulário usando o método POST.
    $nome_do_produto = $_POST['nome_produto'];

    //$descricao_do_produto = $_POST['nome_produto'];: Obtém o valor do campo 'nome_produto' do formulário usando o método POST.
    $descricao_do_produto = $_POST['descricao_do_produto'];

    //$valor_do_produto = $_POST['nome_produto'];: Obtém o valor do campo 'nome_produto' do formulário usando o método POST.
    $valor_do_produto = $_POST['valor_produto'];

    // $quantidade_em_estoque = $_POST['nome_produto'];: Obtém o valor do campo 'nome_produto' do formulário usando o método POST.
    $quantidade_em_estoque = $_POST['quantidade_estoque'];

    //codigo_do_produto = $_POST['nome_produto'];: Obtém o valor do campo 'nome_produto' do formulário usando o método POST.
    $codigo_do_produto = $_POST['codigo_produto'];

//Converte o valor do campo 'valor_produto' para um tipo float. Se o campo estiver vazio, é atribuído o valor padrão de 0.0
    $valor_do_produto = !empty($_POST['valor_produto']) ? floatval($_POST['valor_produto']) : 0.0;

    // Converte o valor do campo 'quantidade_estoque' para um tipo inteiro. Se o campo estiver vazio, é atribuído o valor padrão de 0.
    $quantidade_em_estoque = !empty($_POST['quantidade_estoque']) ? intval($_POST['quantidade_estoque']) : 0;

    // Atualiza o registro no banco de dados
    $stmt = $pdo->prepare("UPDATE produtos SET nome_produto = ?, descricao_do_produto = ?, valor_do_produto = ?, quantidade_em_estoque = ?, codigo_do_produto = ? WHERE id = ?");
    $stmt->execute([$nome_do_produto, $descricao_do_produto, $valor_do_produto, $quantidade_em_estoque, $codigo_do_produto, $id]);

    // Redireciona de volta à página de lista
header("Location: index.php");
  exit();
} else {
 echo "Requisição inválida.";
 exit();
}