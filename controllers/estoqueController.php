<?php

$produto = new Produto;
$produtos = $produto->BuscaPorOrdemAlfabetica();

$mensagens = [];


if(isset($_GET['sucesso'])){
    $_GET['sucesso'] == 1 ? array_push($mensagens, "<h6 class=\"green-text text-darken-3\">Produto Excluido!!</h6>") : array_push($mensagens, "<h6 class=\"red-text text-darken-3\">Erro ao Excluir!!</h6>");
}

if(isset($_POST['busca_produto'])){
    $busca = $_POST['produto'];
    $novaBusca = str_replace(' ', "%", $busca);
    $novaBusca = "%".$novaBusca."%";

    $produtos = $produto->BuscaProdutoLike($novaBusca);
}

function FormatToMoney($e){
    $e = number_format($e, 2);
    return "R$ ".$e;
}

function FormatPorcentagem($e){
    $e = number_format($e, 2);
    return $e."%";
}
?>