<?php

require 'model.php';

class Produto extends Model{
    protected $table = "produto";

    public function CalculaPorcentagem($preco_venda, $preco_compra){
        return (($preco_venda - $preco_compra) / $preco_compra) * 100;
    }

    public function CadastraProduto($nome, $preco_compra, $preco_venda, $qtd_estoque){
        $porcentagem = $this->CalculaPorcentagem($preco_venda, $preco_compra);
        $sql = "insert into $this->table (nome, preco_compra, preco_venda, porcentagem, qtd_estoque) values (?, ?, ?, ?, ?)";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $nome); 
        $list->bindValue(2, $preco_compra); 
        $list->bindValue(3, $preco_venda); 
        $list->bindValue(4, $porcentagem); 
        $list->bindValue(5, $qtd_estoque);
        
        $list->execute();

        return $list->rowCount();
    }

    public function BuscaPorOrdemAlfabetica(){
        $sql = "select * from $this->table order by nome";
        $list = connect()->prepare($sql);
        $list->execute();

        return $list->fetchAll();
    }

    public function AtualizaEstoque($valor, $id){
        $sql = "update $this->table set qtd_estoque = ? where id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $valor); 
        $list->bindValue(2, $id); 

        $list->execute();

        return $list->rowCount();
    }

    public function AtualizaProduto($nome, $preco_compra, $preco_venda, $qtd_estoque,$id){
        $porcentagem = $this->CalculaPorcentagem($preco_venda, $preco_compra);
        $sql = "update $this->table set nome = ?, preco_compra = ?, preco_venda = ?, qtd_estoque = ?, porcentagem = ? where id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $nome); 
        $list->bindValue(2, $preco_compra); 
        $list->bindValue(3, $preco_venda); 
        $list->bindValue(4, $qtd_estoque);
        $list->bindValue(5, $porcentagem); 
        $list->bindValue(6, $id); 

        $list->execute();

        return $list->rowCount();
    }

    public function BuscaProdutoPorEstoque(){
        $sql = "select * from $this->table order by qtd_estoque asc limit 20";
        $list = connect()->prepare($sql);

        $list->execute();

        return $list->fetchAll();
    }

    public function PegaTotalProdutoBruto(){
        $sql = "select sum(qtd_estoque  * preco_venda) as total from produto";
        $list = connect()->prepare($sql);

        $list->execute();

        return $list->fetchAll();
    }
    public function PegaTotalProdutoLiquido(){
        $sql = "select sum(qtd_estoque  * preco_compra) as total from produto";
        $list = connect()->prepare($sql);

        $list->execute();

        return $list->fetchAll();
    }

    public function BuscaProdutoLike($busca){
        $sql = "select * from $this->table where nome like ? order by nome desc";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $busca);

        $list->execute();

        return $list->fetchAll();
    }
}


class Venda extends Model {
    protected $table = "venda";

    public function CadastraVenda($data_venda, $total_venda, $lucro_liquido, $usuario_id){
        $sql = "insert into $this->table (data, total_venda, lucro_liquido, usuario_id) values (?, ? ,? ,?)";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $data_venda);
        $list->bindValue(2, $total_venda);
        $list->bindValue(3, $lucro_liquido);
        $list->bindValue(4, $usuario_id);

        $list->execute();

        return $list->rowCount();
    }

    public function PegaIdUltimaVenda(){
        $sql = "select MAX(id) as maxId from $this->table";
        $list = connect()->prepare($sql);
        $list->execute();

        return $list->fetch();
    }

    public function PegaVendasDecrescente(){
        $sql = "select * from $this->table order by data desc, id desc";
        $list = connect()->prepare($sql);
        $list->execute();

        return $list->fetchAll();
    }

    public function PegarVendasPorPeriodo($data_inicial, $data_final){
        $sql = "select * from $this->table where data >= ? and data <= ? order by data desc, id desc";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $data_inicial);
        $list->bindValue(2, $data_final);
        $list->execute();

        return $list->fetchAll();
    }

    public function PegaTotalVenda(){
        $sql = "select sum(total_venda) as total_venda, sum(lucro_liquido) as lucro_liquido from $this->table";
        $list = connect()->prepare($sql);
        $list->execute();

        return $list->fetch();
    }

    public function PegaTotalVendaPorPeriodo($data_inicial, $data_final){
        $sql = "select sum(total_venda) as total_venda, sum(lucro_liquido) as lucro_liquido from $this->table where data >= ? and data <= ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $data_inicial);
        $list->bindValue(2, $data_final);
        $list->execute();

        return $list->fetch();
    }
}

class Usuario extends Model {
    protected $table = "usuario";
}

class VendaProdutos{
    protected $table = "venda_produtos";

    public function BuscaTudoAtravesVenda($id){
        $sql = "select * from $this->table where venda_id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();

        return $list->fetchAll();
    }


    public function CadastraVendaProdutos($venda_id, $produto_id, $qtd_produto){
        $sql = "insert into venda_produtos (venda_id, produto_id, qtd_produto) values (?, ? ,?)";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $venda_id);
        $list->bindValue(2, $produto_id);
        $list->bindValue(3, $qtd_produto);

        $list->execute();

        return $list->rowCount();
    }

    public function BuscaPorProduto($id){
        $sql = "select distinct venda_id from $this->table where produto_id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();

        return $list->fetchAll();
    }

    public function BuscaPorVenda($id){
        $sql = "select distinct produto_id, qtd_produto from $this->table where venda_id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();

        return $list->fetchAll();
    }

    public function deleteFromVenda($id){
        $sql = "delete from $this->table where venda_id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();

        return $list->rowCount();
    }

    public function deleteFromProduto($id){
        $sql = "delete from $this->table where produto_id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();

        return $list->rowCount();
    }

    public function BuscaProdutoQuantidadeTotal(){
        $sql = "select produto.nome as nome, sum(qtd_produto) as quantidade from venda_produtos inner join produto on (produto.id = produto_id) group by produto_id order by quantidade desc";
        $list = connect()->prepare($sql);
        $list->execute();

        return $list->fetchAll();
    }

    public function BuscaProdutoQuantidadeTotalPorPeriodo($data_inicial, $data_final){
        $sql = "select produto.nome as nome, sum(qtd_produto) as quantidade from venda_produtos inner join produto on (produto.id = produto_id)inner join venda on (venda_id = venda.id) where data >= ? and data <= ? group by produto_id order by quantidade desc";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $data_inicial);
        $list->bindValue(2, $data_final);
        $list->execute();

        return $list->fetchAll();
    }
}