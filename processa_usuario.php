<?php
require_once 'connectDB.php';
//Ok as informações estao chegando
// echo '<pre>';
// print_r($_POST);
// echo '<pre>';


//Definir o DB
//Pegar info do form com o $_POST
//Preparar as informações
//Inserir as info do DB
//Redirecionar Pg inicial "login"

if (!empty ($_POST)) {
    // Os dados estao chegando corretamente
    //Obter informações do POST
    try {
    //Preparar informações
    //Montar o SQL (pgsql)
         $sql = "INSERT INTO usuario
                (nome,senha)
                VALUES
                (:nome, :senha)";
    
    //Preparar a SQL(pdo)
        $stmt = $pdo->prepare($sql);

    //Definir/organizar os dados p/SQL
        $dados = array(
            ':nome' => $_POST['nome'],
            ':senha' => md5($_POST['senha'])
        );
// Tentar executar o sql (INSERT)
// Realizar a inserção das informações no DB (com PHP)
if ($stmt->execute($dados)){
    header("Location:index.php?msgSucesso=Cadastro realizado com sucesso!");
} 

    } catch (PDOExecption $e) {
        //die($e->getMessage());
      header("Location:index.php?msgErro=Falha ao cadastrar...");  
    }
}
else {
    header("Location:index.php?msgErro=Erro ao acessar.");
}
die();

?>