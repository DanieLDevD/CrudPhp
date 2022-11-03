<?php
require_once 'connectDB.php';
session_start();


if(empty($_SESSION)) {
    //As variaveis sessao nao foram definidas.
    header("Location:index.php?msgErro=Você precisa se autenticar");
    die();
}

/* DEBUG
echo '<pre>';
print_r ($_SESSION);
print_r ($_GET);
echo '</prev>';
die ();
*/

$result = array();

// Verificar se chega pelo GET (id_anuncio)
if (!empty($_GET['id_anuncio'])){
// Usuario logado pode acessar ou alterar as informações do registro (id_anuncio)
//Buscar informações do banco
$sql ="SELECT * FROM anuncio WHERE id = :id";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_GET['id_anuncio']));
if ($stmt->rowCount() == 1){
    //Registro obtido no banco de dados
    $result = $stmt->fetchAll();
    $result = $result[0]; // Informações do registro a ser alteradas

     //DEBUG
    // echo '<pre>';
    // print_r ($result);
    // echo '</pre>';
    //die();
    
}
else {
    // die("Não foi encontrado nenhum registro para id_anuncio=" . $_GET['id_anuncio']);
    header("Location: index_logado.php?msgErro= Acesso Negado!");
    die();
}
} catch (PDOException $e) {
    header("Location: index_logado.php?msgErro= Falha ao obter registro no banco de dados.");
    echo "Falha ao realizar a consulta no banco";
    //die($e->getMessage());
}
// Setar os valores nos campos com base na consulta

}
else {
    header("Location: index_logado.php?msgErro= Acesso Negado!");
    die();
}
    //Redirecionar (permissão)

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
    <body>
        <div class="container">
            <h1>Excluir Cliente</h1>
            <form action="processa_anuncio.php" method="post">
                <input type="hidden" name="id_anuncio" id="id_anuncio" value="<?php echo $result['id'] ?>">
                <div class="col-4">
                <label for="nomecliente">Nome</label>
                <input type="text" name="nomecliente" id="nomecliente" class="form-control" value="<?php echo $result['nomecliente']; ?>"disabled>
                </div>

                <div class="col-4">
                <label for="sobrenomecliente">Sobre Nome</label>
                <input type="text" name="sobrenomecliente" id="sobrenomecliente" class="form-control" value="<?php echo $result['sobrenomecliente']; ?>"disabled>
                </div>

                <div class="col-4">
                <label for="cpf">CPF</label>
                <input type="number" name="cpf" id="cpf" class="form-control" value="<?php echo $result['cpf']; ?>"disabled>
                </div><br>

                <button type="submit" name="enviarDados" class="btn btn-primary" value="DEL">Excluir</button>
                <a href="index_logado.php" class="btn btn-danger">Cancelar</a>

            </form>
        </div>
    </body>
</html>
