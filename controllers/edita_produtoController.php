<?php

$mensagens = [];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $produto = new Produto;
    $produto_buscado = $produto->find($id);
}else{
    header('location: estoque.php');
}

if(isset($_POST['atualizar_produto'])){
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $qtd_estoque = filter_var($_POST['qtd_estoque'], FILTER_SANITIZE_STRING);
    $preco_compra = filter_var($_POST['preco_compra'], FILTER_SANITIZE_STRING);
    $preco_venda = filter_var($_POST['preco_venda'], FILTER_SANITIZE_STRING);

    $produto = new Produto;
    if($produto->AtualizaProduto($nome, $preco_compra, $preco_venda, $qtd_estoque, $id)){
        array_push($mensagens, "<h6 class=\"green-text text-darken-3\">Produto Atualizado</h6>");
    }else{
        array_push($mensagens, "<h6 class=\"red-text text-darken-3\">Erro ao Atualizar</h6>");
    }
}

