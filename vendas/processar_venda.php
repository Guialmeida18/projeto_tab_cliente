<?php
require_once "../configuracao/pdo.php";

$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
$produto = isset($_POST['produto']) ? $_POST['produto'] : null;
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : null;
$valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : null;
$situacao = isset($_POST['situacao']) ? $_POST['situacao'] : null;

try {
    // Verificar se os campos obrigatórios foram fornecidos
    if (empty($descricao) || empty($cliente) || empty($produto) || empty($quantidade) || empty($valor_total) || empty($situacao)) {
        throw new Exception("Todos os campos são obrigatórios.");
    }

    // Verificar se os campos numéricos estão no formato esperado
    if (!is_numeric($quantidade) || !is_numeric($valor_total)) {
        throw new Exception("A quantidade e o valor total devem ser valores numéricos.");
    }

    // Obter o id_cliente usando a função
    $id_cliente = obterIdCliente($cliente, $pdo);

    // Inserir dados na tabela de vendas
    $sql = "INSERT INTO vendas (descricao, id_cliente, id_produto, quantidade, valor_total, situacao) 
            VALUES (:descricao, :id_cliente, :produto, :quantidade, :valor_total, :situacao)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor_total', $valor_total);
    $stmt->bindParam(':situacao', $situacao);

    // Executar a inserção
    $stmt->execute();

    // Verificar o estoque
    verificarEstoque($produto, $quantidade, $pdo);

    echo "Operação concluída com sucesso!";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

function verificarEstoque($id_produto, $quantidade_em_estoque, $pdo) {
    try {
        // Consulta ao banco de dados para obter a quantidade em estoque
        $query = "SELECT quantidade_em_estoque FROM produtos WHERE id_produto = :id_produto";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->execute();

        // Verifica se a consulta foi bem-sucedida
        if ($stmt) {
            // Obtém o resultado da consulta
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o resultado não está vazio
            if ($produto !== false && isset($produto['quantidade_em_estoque'])) {
                $quantidade_em_estoque = $produto['quantidade_em_estoque'];

                // Restante do código para verificar o estoque
                // ...
            } else {
                // Informa ao usuário que não foi possível obter informações do produto
                echo "Não foi possível obter informações do produto.";
            }
        } else {
            // Tratar erros na consulta
            $errorInfo = $stmt->errorInfo();
            echo "Erro na consulta: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Erro na execução: " . $e->getMessage();
    }
}


    function obterIdCliente($nomeCliente, $pdo) {
        try {
            // Consulta ao banco de dados para obter o id_cliente com base no nome do cliente
            $query = "SELECT id_empresa FROM empresas WHERE id_empresa = :id_empresa";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_empresa', $nomeCliente);
            $stmt->execute();

            // Obtém o id_cliente
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Certifique-se de que o nome da coluna está correto
            // Substitua 'id_cliente' pelo nome correto da coluna na sua tabela 'empresas'
           print_r($result);
           // return $result['id_empresa'];  // Substitua 'id_cliente' pelo nome correto da coluna
        } catch (PDOException $e) {
            throw new Exception("Erro na obtenção do id_cliente: " . $e->getMessage());
        }

    }






