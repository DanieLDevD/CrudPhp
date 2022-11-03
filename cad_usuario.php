<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
    <body>
        <!-- 
            informações de cadastro 
            Nome completo
            Senha
        -->
        <div class="container">
            <h1>Cadastre-se</h1>
            <form action="processa_usuario.php" method="post">
                <div class="col-4">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="form-control">
                </div>

                <div class="col-4">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control">
                </div><br>

                <button type="submit" name="enviarDados" class="btn btn-primary">Cadastrar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>

            </form>
        </div>
    </body>
</html>
