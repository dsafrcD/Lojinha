<?php 
require 'connection.php';
abstract class Model{
    public function all(){
        $sql = "select * from $this->table";
        $list = connect()->prepare($sql);
        $list->execute();
        return $list->fetchAll();
    }
    public function delete($id){
        $sql = "delete from $this->table where id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();
        return $list->rowCount();
    }
    public function find($id) {
        $sql = "select * from $this->table where id = ?";
        $list = connect()->prepare($sql);
        $list->bindValue(1, $id);
        $list->execute();
        return $list->fetch();
    }
}