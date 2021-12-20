<?php
    $produtoSelect = new Produto;
    $produtosSelect = $produtoSelect->BuscaPorOrdemAlfabetica();
  ?>
    <div class="campo_venda_form">
        <div class="input-field col s6">
            <select id="1" name="select1">
                <option value="" disabled selected>Produto</option>
                <?php foreach($produtosSelect as $product): ?>
                    <option value="<?php echo $product->id?>" preco="<?php echo $product->preco_compra?>"><?php echo $product->nome?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="input-field col s6">
            <label for="">Quantidade</label>
            <input type="number" name="quantidade1" id="quantidade1" value="0">
        </div>
    </div>
<?php 
    for($i = 2; $i < 35; $i++):
?>    

    <div class="campo_venda_form escondido">
        <div class="input-field col s6">
            <select id="<?php echo $i?>" name="select<?php echo $i?>">
                <option value="" disabled selected>Produto</option>
                <?php foreach($produtosSelect as $product): ?>
                    <option value="<?php echo $product->id?>" preco="<?php echo $product->preco_compra?>"><?php echo $product->nome?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="input-field col s6">
            <label for="">Quantidade</label>
            <input type="number" name="quantidade<?php echo $i?>" id="quantidade<?php echo $i?>" value="0">
        </div>
    </div>

<?php
    endfor;

?>