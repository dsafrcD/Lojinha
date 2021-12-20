<?php 
function connect() {
    $username = 'root';
    $password = '';
    $pdo = new PDO('mysql:host=localhost;dbname=lojinha;charset=utf8', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
}
?>