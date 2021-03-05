<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="uikit\css\uikit.css" rel="stylesheet">
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <link href="css\style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Configurações</title>
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "container-fluid">
        <div id="titulo_configuracoes">
            <h2>Painel de Controle do Administrador</h2>
            <hr>
        </div>

        <div class="container_configuracoes">
            <div class="painel_configuracoes">
                <h4> Configurações dos Livros</h4>
                <ul>
                    <li><a href="#">Alterar Informações</a></li>
                    <li><a href="cadastro-livro.php">Cadastrar Livro</a></li>
                    <li><a href="todos-livros.php">Todos os Livros</a></li>
                </ul>
            </div>
            <div>
                

            </div>
        </div>
    </main>
</body>
</html>


<script src="uikit\js\uikit.min.js"></script>
<script src="uikit\js\uikit.js"></script>
<script src="uikit\js\uikit-icons.js"></script>
<script src="uikit\js\uikit-icons.min.js"></script>

<?php
    mysqli_close($conecta);
?>