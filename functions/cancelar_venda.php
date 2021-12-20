<?php
    require '../config.php';
    $id = $_GET['id'];
    $venda = new Venda;
    $venda_produtos = new VendaProdutos;
    $produtos = $venda_produtos->BuscaPorVenda($id);
    $produto = new Produto;
    foreach($produtos as $e){
        $produtoAtual = $produto->find($e->produto_id);
        $estoque = $produtoAtual->qtd_estoque + $e->qtd_produto;
        $produto->AtualizaEstoque($estoque, $e->produto_id);
    }
    if($venda_produtos->deleteFromVenda($id)){
        if($venda->delete($id)){
            header('Location: ../vendas.php?sucesso=1');
        }
    }
    else{
        header('Location: ../vendas.php?sucesso=0');
    }
?>