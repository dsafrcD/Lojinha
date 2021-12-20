<?php
    require 'config.php';
    require 'controllers/estoqueController.php';
    require 'Template/header.php';
?>

<div class="row container">
    <div class="col s12"><br><br>
        <a href="cadastra_produto.php" class="btn blue darken-2 col s12">Novo Produto</a>
    </div>
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
    <div class="co s12">
        <h4 class="light center">Produtos</h4>
    </div>
    <div class="co s12">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço Compra</th>
                    <th>Preço Venda</th>
                    <th>Porcentagem</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $e):?>
                    <tr>
                        <td><?php echo $e->nome;?></td>
                        <td><?php echo $e->qtd_estoque;?></td>
                        <td><?php echo FormatToMoney($e->preco_compra);?></td>
                        <td><?php echo FormatToMoney($e->preco_venda);?></td>
                        <td><?php echo FormatPorcentagem($e->porcentagem);?></td>
                        <td><a href="edita_produto.php?id=<?php echo $e->id;?>" class="btn green darken-2">Editar</a></td>
                        <td><a href="functions/excluir_produto.php?id=<?php echo $e->id;?>" class="btn red darken-2">Excluir</a></td>                        
                    </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
</div>
<!-- FOOTER -->
<?php require 'Template/footer.php';?>