<?php
require_once "../configuracao/pdo.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $razao_social = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $numero = $_POST['numero'];


// Adicione mais campos conforme necessário

// Atualiza o registro no banco de dados
    $stmt = $pdo->prepare("UPDATE empresas SET razao_social = ?, cnpj = ?, endereco = ?, cep = ?, telefone = ?, email = ?, cidade = ?, uf = ?, numero = ? WHERE id_empresa  = ?");
    $stmt->execute([$razao_social, $cnpj, $endereco, $cep, $telefone, $email, $cidade, $uf, $numero, $id]);

// Redireciona de volta à página de lista
    header("index.php");
    exit();
} else {
    echo "Requisição inválida.";
    exit();
}
