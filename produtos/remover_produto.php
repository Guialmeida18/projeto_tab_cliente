<?php
require_once "./../configuracao/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_produto'])) {
// Validar o parâmetro 'id'
$produtosId = filter_input(INPUT_GET, 'id_produto', FILTER_VALIDATE_INT);

if ($produtosId !== false && $produtosId !== null) {
try {
// Lógica para remover o produto com o ID fornecido
$stmt = $pdo->prepare("DELETE FROM produtos WHERE id_produto = ?");
$stmt->execute([$produtosId]);

// Redirecionar para a lista de produtos após a remoção
    header("location: index.php");
    echo "produto removido com sucesso";
exit();
} catch (PDOException $e) {
// Tratar erros durante a execução da consulta
echo "Erro ao excluir produto: " . $e->getMessage();
}
} else {
echo "ID inválido.";
}
} else {
echo "Requisição inválida.";

}