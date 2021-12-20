<?php
    require '../config.php';
    $id = $_GET['id'];
    $produto = new Produto;
    $venda = new Venda;
    $venda_produtos = new VendaProdutos;
    $vendas = $venda_produtos->BuscaPorProduto($id);
    $venda_produtos->deleteFromProduto($id);
    foreach($vendas as $e){
        $venda->delete($e->venda_id);
    }
    if($produto->delete($id)){
        header('Location: ../estoque.php?sucesso=1');
    }
    else{
        header('Location: ../estoque.php?sucesso=0');
    }
?>    