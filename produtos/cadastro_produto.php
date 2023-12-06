<?php
include "./../configuracao/pdo.php";

function getProdutos()
{
    //declarei a variavel global "$pdo"
    global $pdo;

    //Prepara uma consulta SQL para selecionar todos os registros da tabela produtos.
    $stmt = $pdo->prepare("SELECT * FROM produtos");

    //Executa a consulta preparada
    $stmt->execute();

    //Retorna todas as linhas resultantes da consulta como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Verifica se a requisição foi feita usando o método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Verifica se o campo cadastrar está presente no formulário enviado.
    if (isset($_POST['cadastrar'])) {

        //Chama a função cadastrarProduto passando os valores do formulário como argumentos. Se algum valor não estiver definido, é passado null
        cadastrarProduto(
            isset($_POST['nome_produto']) ? $_POST['nome_produto'] : null,
            isset($_POST['descricao_do_produto']) ? $_POST['descricao_do_produto'] : null,
            isset($_POST['valor_do_produto']) ? $_POST['valor_do_produto'] : null,
            isset($_POST['quantidade_em_estoque']) ? $_POST['quantidade_em_estoque'] : null,
            isset($_POST['codigo_do_produto']) ? $_POST['codigo_do_produto'] : null
        );
    }
}
//getProdutos() é chamada para obter todos os produtos.
$produtos = getProdutos();

//print_r($produtos);: Imprime os produtos usando print_r para depuração
print_r($produtos);

//Função para Cadastrar Produto:
//global $pdo;: Torna a variável $pdo global dentro da função.
//A função cadastrarProduto verifica se um produto com o mesmo codigo_do_produto já existe no banco de dados.
//Se existir, exibe uma mensagem informando que o produto já existe.
//Se não existir, insere um novo registro na tabela produtos com os valores fornecidos.
function cadastrarProduto($nome_produto, $descricao_do_produto, $valor_do_produto, $quantidade_em_estoque, $codigo_do_produto)
{
    global $pdo;

    // Verifique se o codigo_do_produto já existe
    $query = $pdo->prepare("SELECT COUNT(*) FROM produtos WHERE codigo_do_produto = ?");
    $query->execute([$codigo_do_produto]);
    $count = $query->fetchColumn();

//if ($count > 0) {: Verifica se a variável $count é maior que 0. $count é o resultado de uma consulta que verifica se já existe um produto com o mesmo codigo_do_produto. Se $count for maior que 0, significa que o produto já existe.
    if ($count > 0) {

        echo "Product with codigo_do_produto $codigo_do_produto already exists.";

        //Caso contrário (else):
    } else {

        //$stmt = $pdo->prepare("INSERT INTO produtos (nome_produto, descricao_do_produto, valor_do_produto, quantidade_em_estoque, codigo_do_produto) VALUES (?, ?, ?, ?, ?)");: Prepara uma instrução SQL para inserir um novo produto na tabela produtos.
        $stmt = $pdo->prepare("INSERT INTO produtos (nome_produto, descricao_do_produto, valor_do_produto, quantidade_em_estoque, codigo_do_produto) VALUES (?, ?, ?, ?, ?)");

        //$stmt->execute([$nome_produto, $descricao_do_produto, $valor_do_produto, $quantidade_em_estoque, $codigo_do_produto]);: Executa a instrução preparada, inserindo os valores fornecidos nas posições apropriadas.
        $stmt->execute([$nome_produto, $descricao_do_produto, $valor_do_produto, $quantidade_em_estoque, $codigo_do_produto]);
    }
}

