<?php
    require 'config.php';
    require 'controllers/vendaController.php';

    require 'Template/header.php';
?>

<div class="row container">
    <div class="col s12">
        <p class="fluid-text">Informe o periodo que deseja!</p>
    </div>
    <form action="" method="post">
        <div class="col s4">
            <input type="date" name="data_inicial" id="data_inicial">
        </div>
        <div class="col s4">
            <input type="date" name="data_final" id="data_final">
        </div>
        <div class="col s4">
            <button type="submit" class="btn blue darken-3 right" name="buscar_vendas">Buscar</button>
        </div>
    </form>
</div>
<div class="row container">
    <div class="col s12">
        <hr class="hr-custom2">
    </div>
</div>
<?php if(!empty($mensagens)):?>
    <div class="row container">
        <div class="col s12">
            <?php foreach($mensagens as $mensagem){
                echo $mensagem;
            }                
            ?>
        </div>
    </div>
<?php endif; ?>
<div class="row container">
    <div class="col s12">
    <table class="striped centered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Total Venda</th>
                <th>Cancelar Venda</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendas as $e):?>
                <tr>
                    <td><?php echo FormataData($e->data);?></td>
                    <td><?php echo FormatToMoney($e->total_venda);?></td>
                    <td><a href="functions/cancelar_venda.php?id=<?php echo $e->id;?>" class="btn red darken-2">Cancelar</a></td>
                <tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<!-- FOOTER -->
<?php require 'Template/footer.php';?>
