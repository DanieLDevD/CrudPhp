<?php
// endereço
// nome DB
// usuario
// senha

$endereco ='localhost';
$banco = 'registrocliente';
$usuario = 'postgres';
$senha = 'postgres';

try {
// argumentos    
// sgbd:host;port;dbname
// user
// password
// errmode
    $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    //echo "Conectado ao banco !!!!!!";
} catch (PDOExeption $e) {
    echo "falha ao conectar ao banco. <br/>";
    die($e->getMessage());
}



?>