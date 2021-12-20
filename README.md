<h2>Lojinha</h2><br>
Sistema Simples de controle pra uma lojinha roupas, acessórios e outros, feito em PHP e MYSQL, sem framework e nos padrões MVC.<hr>

<hr>
Descompacte o zip em uma pasta chamada lojinha, na raiz do seu servidor.
<hr>
crie um banco de dados no Mysql com o nome de lojinha.<br>
Importe o lojinha.sql pra dentro do banco recencriado.<br>

Atualize os dados no script para que o php possa fazer a conexão correta com o banco de dados.<br><br>

pasta models > connection.php

``` 
    $username = 'root';
    $password = 'senha';
    $pdo = new PDO('mysql:host=localhost;dbname=lojinha;charset=utf8', $username, $password);

``` 
<hr>
rode o sistema e http://127.0.0./lojinha.
<hr>
Pronto agora so sair vendendo sem sua lojinha e controlando tudo pelo sistema.
