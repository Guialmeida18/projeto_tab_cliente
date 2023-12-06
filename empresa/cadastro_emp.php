<?php
global $pdo;
include "./../configuracao/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    if (isset($_POST['cadastrar'])) {
        cadastrarEmpresa($_POST['razao_social'], $_POST['cnpj'], $_POST['endereco'], $_POST['cep'], $_POST['telefone'], $_POST['email'], $_POST['cidade'], $_POST['uf'], $_POST['numero']);
    } elseif (isset($_POST['editar'])) {
        editarEmpresa($_POST['edit_id'], $_POST['edit_razao_social'], $_POST['edit_cnpj'], $_POST['edit_endereco'], $_POST['edit_cep'], $_POST['edit_telefone'], $_POST['edit_email'], $_POST['edit_cidade'], $_POST['edit_uf'], $_POST['edit_numero']);
    } elseif (isset($_POST['excluir'])) {
        excluirEmpresa($_POST['excluir_id']);
    }

//    //$sql = "INSERT INTO empresas (razao social, cnpj, endereco, cep, telefone, email, cidade, uf, numero) VALUES (:razao social, :cnpj, :endereco, :cep, :telefone, :emial, :cidade, :uf, :numero)";
//    $stmt = $pdo->prepare($sql);
//
//    $stmt->bindParam(':razao social', $razao_social);
//    $stmt->bindParam(':cnpj', $cnpj);
//    $stmt->bindParam(':endereco', $endereco);
//    $stmt->bindParam(':cep', $cep);
//    $stmt->bindParam(':telefone', $telefone);
//    $stmt->bindParam(':email', $email);
//    $stmt->bindParam(':cidade', $cidade);
//    $stmt->bindParam(':uf', $uf);
//    $stmt->bindParam(':numero', $numero);
//
//
//    if ($stmt->execute()) {
//        echo 'Cadastro realizado com sucesso!';
//    } else {
//        echo 'Erro ao cadastrar. Por favor, tente novamente.';
//    }
}
function getEmpresas()
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM empresas");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

function cadastrarEmpresa($razao_social, $cnpj, $endereco, $cep, $telefone, $email, $cidade, $uf, $numero){
    global $pdo;
        $stmt = $pdo->prepare("INSERT INTO empresas (razao_social, cnpj, endereco, cep, telefone, email, cidade, uf, numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$razao_social, $cnpj, $endereco, $cep, $telefone, $email, $cidade, $uf, $numero]);

}
function excluirEmpresa($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM  WHERE id_empresa=?");
    $stmt->execute([$id]);
}
$empresas = getEmpresas();