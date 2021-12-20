<?php 

$mensagens = [];

if(isset($_POST['cadastra_venda'])){
    $produto = new Produto;
   
    $total_venda = 0;
    $total_gasto = 0;

    for($j = 1; $j < 35; $j++){
        if($_POST['quantidade'.$j] == 0){
            continue;
        }
        $id_produto = $_POST['select'.$j];
        $qtd_produto = $_POST['quantidade'.$j];

        $produto_atual = $produto->find($id_produto);

        $novo_estoque = $produto_atual->qtd_estoque -  $qtd_produto;
        $produto->AtualizaEstoque($novo_estoque,$id_produto);

        $total_venda += $qtd_produto * $produto_atual->preco_venda;
        $total_gasto += $qtd_produto * $produto_atual->preco_compra;      
    }

    $lucro_liquido = $total_venda - $total_gasto;

    $data_venda = date('Y-m-d');

    $venda = new Venda;
    $venda->CadastraVenda($data_venda, $total_venda, $lucro_liquido, '1');

    $venda_id = $venda->PegaIdUltimaVenda();
    $venda_id = $venda_id->maxId;

    $venda_produtos = new VendaProdutos;

    for($j = 1; $j < 35; $j++){
        if($_POST['quantidade'.$j] == 0){
            continue;
        }
        $id_produto = $_POST['select'.$j];
        $qtd_produto = $_POST['quantidade'.$j];
        
        $venda_produtos->CadastraVendaProdutos($venda_id, $id_produto, $qtd_produto);
    }

    array_push($mensagens, "Venda Realizada");

}

?>