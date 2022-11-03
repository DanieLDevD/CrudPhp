<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
    <!-- CSS only -->
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
    <div class="container"><h1>Bem vindo</h1>
    <form action="processa_login.php" method="post">
        <div class="col-4">
            <label for="nome">Nome Completo</label>
            <input type="nome" name="nome" id="nome" class="form-control">
        </div>
        <div class="col-4">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div><br>
        <button type="submit" name="enviarDados" class="btn btn-primary">Login</button>
        <a href="cad_usuario.php" class="btn btn-warning">Sing in</a>
    </form>
</div>
</body>
</html>