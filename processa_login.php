<?php
require_once 'connectDB.php';
// Ok as informações estao chegando

//Verificar se chega dados no POST
if (!empty ($_POST)) {
    //Iniciar Sessao (session_start)
session_start();
    //Montar SQL
    try {
        $sql = "SELECT * FROM usuario WHERE nome = :nome AND senha = :senha";

//Preparar SQL(PDO)
$stmt = $pdo->prepare($sql);
//Definir dados p/SQL
$dados = array (
    ':nome' => $_POST['nome'],
    ':senha' => md5($_POST['senha'])
);
$stmt->execute($dados);

$result = $stmt->fetchAll();
if ($stmt->rowCount() == 1) {
// Autenticação foi realizada com sucesso
//SE houver registro
// Defino variáveis
$result = $result[0];
$_SESSION['nome'] = $result['nome'];
$_SESSIO['senha'] = $result['senha'];
//Redirecionar para pagina logada

header("Location: index_logado.php");

} else{ // O resultado da consulta SQL nao trouxe nenhum registro
    //die('NADA');
//Falha na autenticação
//Destruir sessao
session_destroy();
//Redirecionar a pagina inicial(login)
header("Location: index.php?msgErro=Nome e/ou Senha inválido.");
}
    } catch (PDOExecption $e) {
      die($e->getMessage());  
    }
}
else{
    header("Location:index.php?msgErro=Sem perimissão para acessar.");
}
die();

?>