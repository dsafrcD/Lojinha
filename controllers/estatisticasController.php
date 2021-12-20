<?php

$venda_produtos = new VendaProdutos;
$venda = new Venda;
$produtoEstoque = new Produto;

$produtosEstoque = $produtoEstoque->BuscaProdutoPorEstoque();

$produtos = $venda_produtos->BuscaProdutoQuantidadeTotal();

$totalProdutoBruto = $produtoEstoque->PegaTotalProdutoBruto();
$totalProdutoLiquido = $produtoEstoque->PegaTotalProdutoLiquido();

$valores_totais = $venda->PegaTotalVenda();


if(isset($_POST['buscar_estatisticas'])){
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    
    $valores_totais = $venda->PegaTotalVendaPorPeriodo($data_inicial, $data_final);
    $produtos = $venda_produtos->BuscaProdutoQuantidadeTotalPorPeriodo($data_inicial, $data_final);
}

if(($valores_totais->total_venda - $valores_totais->lucro_liquido) == 0){
    $porcentagem = 0;
}else{

    $porcentagem = number_format((($valores_totais->lucro_liquido / ($valores_totais->total_venda - $valores_totais->lucro_liquido)) * 100), 2);
}
?>