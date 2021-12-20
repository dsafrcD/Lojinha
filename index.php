<?php
    require 'config.php';
    require 'controllers/indexController.php';

    require 'Template/header.php';
?>

    <div class="contorno container">
        <div class="row">
            <div class="col s12" style="margin-bottom: 20px;">
                <h4 class="center">Venda</h4 class="center">
                <hr class="hr-custom">
            </div>
            <form action="" method="post" class="venda-form">
                <!-- PHP dos Selects -->
                <?php require 'functions/indexSelect.php'?>

                <div class="col s12">
                    <p class="text-fluid right">Para completar a transação, clique no botão!</p>
                </div>
                <div class="col s5  campo-valor-total" style="margin-left:10px;">
                    <h5>Valor Total: <span class="valor-total"> R$0,00</span> </h5>
                </div>
                <div class="col s6">
                    <button type="submit" class="btn blue darken-3 right" name="cadastra_venda">Efetuar Venda</button>
                </div>
            </form>
        </div>
        <?php
            if(!empty($mensagens)):
        ?>
            <div class="row">
                <?php foreach($mensagens as $mensagem):?>
                    <div class="col s12">
                        <h6 class="green-text text-darken-3"><?php echo $mensagem?></h6>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
            endif;
        ?>
    </div>

    <!-- FOOTER -->
    <?php require 'Template/footer.php';?>
