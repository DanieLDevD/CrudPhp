<?php
require_once 'connectDB.php';
//Ok as informações estao chegando


session_start();

if(empty($_SESSION)) {
    //As variaveis sessao nao foram definidas.
    header("Location:index.php?msgErro=Você precisa se autenticar");
    die();
}


// echo '<pre>';
//  print_r($_POST);
//  echo '<pre>';
// die();

//Definir o DB
//Pegar info do form com o $_POST
//Preparar as informações
//Inserir as info do DB
//Redirecionar Pg inicial "login"

if (!empty ($_POST)) {
    // Os dados estao chegando corretamente
    //Obter informações do POST

    // Verificar se estou tentando INSERIR(CAD) / ALTERAR(ALT) / EXCLUIR (DEL)
    if ($_POST['enviarDados'] == 'CAD') { // CADASTRAR
        try {
            //Preparar informações
            //Montar o SQL (pgsql)
                 $sql = "INSERT INTO anuncio
                        (nomecliente,sobrenomecliente,cpf)
                        VALUES
                        (:nomecliente, :sobrenomecliente, :cpf)";
            
            //Preparar a SQL(pdo)
                $stmt = $pdo->prepare($sql);
        
            //Definir/organizar os dados p/SQL
                $dados = array(
                    ':nomecliente' => $_POST['nomecliente'],
                    ':sobrenomecliente' => $_POST['sobrenomecliente'],
                    ':cpf' => $_POST['cpf']
                );
        // Tentar executar o sql (INSERT)
        // Realizar a inserção das informações no DB (com PHP)
        if ($stmt->execute($dados)){
            header("Location:index_logado.php?msgSucesso=Cadastro realizado com sucesso!");
        } 
        
            } catch (PDOExecption $e) {
                //die($e->getMessage());
              header("Location:index_logado.php?msgErro=Falha ao cadastrar cliente...");  
            }
    }
    elseif ($_POST['enviarDados'] == 'ALT') { // UPDATE
/* Implementação do update */
// Construir SQL p/ update
    try {
               $sql = "UPDATE anuncio SET nomecliente = :nomecliente,
                                    sobrenomecliente = :sobrenomecliente,
                                    cpf = :cpf
                                    WHERE
                                    id = :id_anuncio";
//Definir dados para SQL
$dados = array(
    ':id_anuncio' => $_POST['id_anuncio'],
    ':nomecliente' => $_POST['nomecliente'],
    ':sobrenomecliente' => $_POST['sobrenomecliente'],
    ':cpf' => $_POST['cpf']
);

$stmt = $pdo->prepare($sql);

    if ($stmt->execute($dados)) { //Executar SQL
        header("Location: index_logado.php?msgSucesso=Alteração realizada com sucesso");
    }
    else {
        header("Location: index_logado.php?msgErro= Falha ao alterar Cliente");
    }
} catch (PDOException $e) {
    //die($e->getMessage());
    header("Location: index_logado.php?msgErro= Falha ao alterar Cliente");
        
    }

    }
    elseif ($_POST['enviarDados'] == 'DEL') { //EXCLUIR
/* Implementação do excluir */
// Informações de id e o meu delete com nome DEL estao chegando, verificado no meu debug print_r

        try {
            $sql = "DELETE FROM anuncio WHERE id = :id_anuncio";
            $stmt = $pdo->prepare($sql);
            
            $dados = array('id_anuncio' => $_POST['id_anuncio']);
            if ($stmt->execute($dados)){
                header("Location: index_logado.php?msgSucesso= Cliente Excluido com Sucesso!");
            }
            else {
                header("Location: index_logado.php?msgErro= Falha ao Excluir Cliente");
            }
        } catch (PDOException $e) {
            // die ($e->getMessage());
            header("Location: index_logado.php?msgErro= Falha ao EXCLUIR ");
        }
    }
    else{
        header("Location:index_logado.php?msgErro=Erro de acesso (Operação nao definida).");    
    }

}
else {
    header("Location:index_logado.php?msgErro=Erro ao acessar.");
}
die();

?>