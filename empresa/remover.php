<?php
require_once "../configuracao/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_empresa'])) {
    $empresaId = $_GET['id_empresa'];

    // Lógica para remover a empresa com o ID fornecido
    $stmt = $pdo->prepare("DELETE FROM empresas WHERE id_empresa = ?");
    $stmt->execute([$empresaId]);

    // Pode redirecionar para a lista de empresas após a remoção
header("location: index.php");
    exit();
} else {
    echo "Requisição inválida.";
    // Pode redirecionar para uma página de erro
    // header("Location: erro.php");
    // exit();

}