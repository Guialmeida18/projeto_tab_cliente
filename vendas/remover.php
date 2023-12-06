<?php
require_once "../configuracao/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID da venda foi enviado corretamente
    if (isset($_POST['venda_id'])) {
        $vendaId = $_POST['venda_id'];

        // Lógica para remover a venda do banco de dados
        // Substitua conforme necessário
        $sql = "DELETE FROM vendas WHERE id_venda = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $vendaId, PDO::PARAM_INT);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "Venda removida com sucesso.";
        } else {
            echo "Erro ao remover a venda.";
        }
    } else {
        echo "ID da venda não especificado.";
    }
} else {
    echo "Método de requisição inválido.";
}
