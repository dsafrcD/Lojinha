<?php 

$venda = new Venda;

$vendas = $venda->PegaVendasDecrescente();

$mensagens = [];

if(isset($_POST['buscar_vendas'])){
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    $vendas = $venda->PegarVendasPorPeriodo($data_inicial, $data_final);
}


if(isset($_GET['sucesso'])){
    $_GET['sucesso'] == 1 ? array_push($mensagens, "<h6 class=\"green-text text-darken-3\">Cancelado!!</h6>") : array_push($mensagens, "<h6 class=\"red-text text-darken-3\">Erro ao Cancelar!!</h6>");
}

function CalculaPorcentagemVenda($e){
    $porcentagem = ($e->lucro_liquido / ($e->total_venda - $e->lucro_liquido)) * 100;
    $porcentagem = number_format($porcentagem, 2);
    return $porcentagem."%";
}

function FormatToMoney($e){
    $e = number_format($e, 2);
    return "R$ ".$e;
}

function FormataData($data){
    $data = new DateTime($data);
    return $data->format('d/m/Y');
}

function BuscaNome($id){
    $usuario = new Usuario;
    $usuarios = $usuario->find($id);
    return $usuarios->nome;
}
?>