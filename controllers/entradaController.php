<?php


$mensagens = [];

if(isset($_POST['cadastra_entrada'])){
    $produto = new Produto;
   
    for($j = 1; $j < 35; $j++){
        if($_POST['quantidade'.$j] == 0){
            continue;
        }
        $id_produto = $_POST['select'.$j];
        $qtd_produto = $_POST['quantidade'.$j];

        $produto_atual = $produto->find($id_produto);

        $novo_estoque = $produto_atual->qtd_estoque +  $qtd_produto;
        $produto->AtualizaEstoque($novo_estoque,$id_produto);      
    }

    array_push($mensagens, "Entrada Realizada");
}