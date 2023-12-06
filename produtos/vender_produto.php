<?php
require_once "./../configuracao/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $produtoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($produtoId !== false && $produtoId !== null) {
        try {
            venderProduto($produtoId);  // Chama a função de venda passando o ID do produto

            // Após a venda, redireciona para a página principal
           // header("location: index.php");
            exit();
        } catch (PDOException $e) {
            // Trata erros durante a execução da consulta
            echo "Erro ao vender produto: " . $e->getMessage();
        }
    } else {
        echo "ID inválido.";
    }
} else {
    echo "Requisição inválida.";
}

function venderProduto($produtoId)
{
    global $pdo;

    // Obtém as informações do produto
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$produtoId]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        echo "Produto não encontrado.";
        return;
    }

    $codigo_do_produto = $produto['codigo_do_produto'];
    $quantidade_venda = 1;  // Pode ajustar a quantidade conforme necessário

    // Sua lógica de venda aqui
    // ...

    // Exemplo de atualização do estoque
    $novaQuantidade = $produto['quantidade_em_estoque'] - $quantidade_venda;
    $stmtUpdate = $pdo->prepare("UPDATE produtos SET quantidade_em_estoque = ? WHERE id = ?");
    $stmtUpdate->execute([$novaQuantidade, $produtoId]);

    // Exemplo de remoção do produto se o estoque for zero
    if ($novaQuantidade === 0) {
        $stmtDelete = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
        $stmtDelete->execute([$produtoId]);
    }

    echo "Venda bem-sucedida. Quantidade restante em estoque: $novaQuantidade";
}