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
    <style>
        a{
            text-decoration:none;
        }
        
    </style>
    <title>Configurações</title>
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "principal container-fluid">
        <div class="titulo-central">
            <h2>Painel de Controle do Administrador</h2>
            <hr>
        </div>

        <div class="container_configuracoes row row-cols-1 row-cols-md-1 mb-1">
            
            <div class="painel_configuracoes col uk-card uk-card-default">
                <h4 class="titulo-painel-configuracoes"> Configurações dos Livros</h4>
                <ul class="lista-geral">
                    <li>Alterar Informações</li>
                    <li><a href="cadastro-livro.php">Cadastrar Livro</a></li>
                    <li>Tipo / Formato</li>
                    <li><a href="todos-livros.php">Todos os Livros</a></li>
                </ul>
            </div>

            <div class="painel_configuracoes col uk-card uk-card-default">
                <h4 class="titulo-painel-configuracoes">Editoras</h4>
                <ul class="lista-geral">
                    <li><a href="cadastro-editora.php">Cadastrar Editora</a></li>
                    <li><a href="todas-editoras.php">Todas as Editoras</a></li>
                </ul>
            </div>

            <div class="painel_configuracoes col uk-card uk-card-default">
                <h4 class="titulo-painel-configuracoes">Gêneros</h4>
                <ul class="lista-geral">
                    <li><a href="cadastro-genero.php">Cadastrar Gênero</a></li>
                    <li><a href="todos-generos.php">Todos os Gêneros</a></li>
                </ul>
            </div>

            <div class="painel_configuracoes col uk-card uk-card-default">
                <h4 class="titulo-painel-configuracoes">Idiomas</h4>
                <ul class="lista-geral">
                    <li><a href="cadastro-idioma.php">Cadastrar Idiomas</a></li>
                    <li><a href="todos-idiomas.php">Todos os Idiomas</a></li>
                </ul>
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