<?php

$venda_produtos = new vendaProdutos;
$venda = new Venda;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vendaAtual = $venda->find($id);
    $id_produtos = $venda_produtos->BuscaTudoAtravesVenda($id);
}else{
    header('Location: vendas.php');
}

function PegaNomeProduto($id){
    $produto = new Produto;
    $produtoAtual = $produto->find($id);
    return $produtoAtual->nome;
}

function CalculaPorcentagemVenda($e){
    $porcentagem = ($e->lucro_liquido / ($e->total_venda - $e->lucro_liquido)) * 100;
    $porcentagem = number_format($porcentagem, 2);
    return $porcentagem."%";
}

function FormataData($data){
    $data = new DateTime($data);
    return $data->format('d/m/Y');
}
?>