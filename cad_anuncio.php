<?php
session_start();

if(empty($_SESSION)) {
    //As variaveis sessao nao foram definidas.
    header("Location:index.php?msgErro=Você precisa se autenticar");
    die();
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre Novo Cliente</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
    <body>
        <!-- 
            informações de cadastro 
            Nome 
            Sobre Nome
            CPF
        -->
        <div class="container">
            <h1>Cadastre Novo Cliente</h1>
            <form action="processa_anuncio.php" method="post">
                <div class="col-4">
                <label for="nomecliente">Nome</label>
                <input type="text" name="nomecliente" id="nomecliente" class="form-control">
                </div>

                <div class="col-4">
                <label for="sobrenomecliente">Sobre Nome</label>
                <input type="text" name="sobrenomecliente" id="sobrenomecliente" class="form-control">
                </div>

                <div class="col-4">
                <label for="cpf">CPF</label>
                <input type="number" name="cpf" id="cpf" class="form-control">
                </div><br>

                <button type="submit" name="enviarDados" class="btn btn-primary" value="CAD">Cadastrar</button>
                <a href="index_logado.php" class="btn btn-danger">Cancelar</a>

            </form>
        </div>
    </body>
</html>
