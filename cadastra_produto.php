<?php
    require 'config.php';
    require 'controllers/cadastra_produtoController.php';

    require 'Template/header.php';
?>

<div class="contorno container">
    <div class="row">
        <div class="col s12">
            <h5 class="center">Informe os Dados</h5>
        </div>
        <form action="" method="post">
            <div class="input-field col s12 m6">
                <input id="nome" type="text" name="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="qtd_estoque" type="text" name="qtd_estoque">
                <label for="qtd_estoque">Quantidade no Estoque</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="preco_compra" type="text" name="preco_compra">
                <label for="preco_compra">Preço de Compra</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="preco_venda" type="text" name="preco_venda">
                <label for="preco_venda">Preço de venda</label>
            </div>
            <div class="input-field col s12">
                <button type="submit" name="cadastrar_produto" class="btn blue darken-4">Cadastrar</button>
            </div>
            <?php if(!empty($mensagens)): ?>
                <div class="col s12">
                    <?php 
                        foreach ($mensagens as $mensagem){
                            echo $mensagem;
                        }
                    ?>
                </div>
            <?php endif;?>    
        </form>
    </div>
</div>
<?php require 'Template/footer.php';?>