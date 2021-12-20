<?php
    require 'config.php';
    require 'controllers/estatisticasController.php';

    require 'Template/header.php';
?>

<div class="row container">
    <div class="col s12">
        <h1 class="light center">Estatisticas</h1>
        <hr class="hr-custom">
    </div>
</div>
<div class="row container">
    <div class="col s12">
        <p class="fluid-text">Preencha o periodo de tempo que deseja buscar as Estatisticas!</p>
    </div>
    <form action="" method="post">
        <div class="col s4">
            <input type="date" name="data_inicial" id="data_inicial">
        </div>
        <div class="col s4">
            <input type="date" name="data_final" id="data_final">
        </div>
        <div class="col s4">
            <button type="submit" class="btn blue darken-3 right" name="buscar_estatisticas">Buscar Estatisticas</button>
        </div>
    </form>
</div>
<div class="row container">
    <div class="col s12">
        <hr class="hr-custom">
    </div>
</div>
<div class="row container">
    <div class="col s12 m4">
        <div class="square">
            <h3 class="center light">Lucro Total</h3>
            <h2 class="center orange-text">R$ <?php echo number_format($valores_totais->total_venda,2); ?></h2>
        </div>
        <div class="square">
            <h3 class="center light">Lucro Liquido</h3>
            <h2 class="center green-text text-darken-3">R$ <?php echo number_format($valores_totais->lucro_liquido,2); ?></h2>
        </div>
        <div class="square">
            <h3 class="center light">Porcentagem</h3>
            <h2 class="center blue-text text-darken-3"><?php echo $porcentagem?>%</h2>
        </div>
        <div class="square">
            <h4 class="center light">Total em Produtos Bruto</h4>
            <h2 class="center purple-text">R$<?php echo number_format($totalProdutoBruto[0]->total,2)?></h2>
        </div>
        <div class="square">
            <h4 class="center light">Total em Produtos Liquido</h4>
            <h2 class="center cyan-text">R$<?php echo number_format($totalProdutoLiquido[0]->total,2)?></h2>
        </div>
    </div>
    <div class="col s12 m8">
        <h3 class="center light">Produtos</h3>
    </div>
    <div class="col s12 m4">
        <h5 class="light">Produtos mais Vendidos</h5>
        <table class="striped">
            <thead>
                <tr >
                    <td>Produto</td>
                    <td style="text-align:center;">Quantidade</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto->nome;?></td>
                        <td style="text-align:center;"><?php echo $produto->quantidade;?></td>
                    </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
    <div class="col s12 m4">
        <h5 class="light">Menor Estoque</h5>
        <table class="striped">
            <thead>
                <tr >
                    <td>Produto</td>
                    <td style="text-align:center;">Quantidade</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtosEstoque as $e): ?>
                    <tr>
                        <td><?php echo $e->nome;?></td>
                        <td style="text-align:center;"><?php echo $e->qtd_estoque;?></td>
                    </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
</div>
<!-- FOOTER -->
<?php require 'Template/footer.php';?>
