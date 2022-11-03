<?php
require_once 'connectDB.php';
session_start();

        if(empty($_SESSION)) {
    //As variaveis sessao nao foram definidas.
    header("Location:index.php?msgErro=Você precisa se autenticar");
    die();
        }






$anuncios = array();
$sql = "SELECT * FROM anuncio ORDER BY id ASC";
try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()){
        //Execução da SQL ok!
        $anuncios = $stmt->fetchAll();
            /* Debug
            echo '<pre>';
            print_r($anuncios);
            echo '<pre>';
            die();
            */
    }
    else {
        die("Falha ao executar a SQL");
    }
} catch (PDOException $e) {
    die($e->getMessage());   
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Iniciaal- Ambiente logado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <?php if (!empty($_GET['msgErro'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>

        <?php if (!empty($_GET['msgSucesso'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } ?>
    </div>

    <div class="container">
        <div class="col-md11">
            <h2 class="title">Olá <?php echo $_SESSION['nome'] ?>, Bem Vindo(a)</h2>
        </div>
    </div>

        <div class="container">
            <div class="col-md11">
                <h4 class="title">Clientes Cadastrados</h4>
            </div>
        </div>

    <div class="container">
        <a href="cad_anuncio.php" class="btn btn-primary">Cadastrar Novo Cliente</a>
        <a href="logout.php" class="btn btn-dark">Sair</a>
    </div>
<?php
//Tabela para percorrer o array
    if (!empty($anuncios)) {  ?>
    <!--Será montada a tabela aqui relacionada de clientes-->
    <div class="container">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobre Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuncios as $a) { ?>
                <tr>
                    <th scope="row"><?php echo $a['id']; ?></th>
                    <td><?php echo $a['nomecliente']; ?></td>
                    <td><?php echo $a['sobrenomecliente']; ?></td>
                    <td><?php echo $a['cpf']; ?></td>
                    <td>
                        <a href="alt_anuncio.php?id_anuncio=<?php echo $a['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="del_anuncio.php?id_anuncio=<?php echo $a['id']; ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
   <?php } ?>

</body>
</html>