<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>


<?php
                
        //DESTROI TODAS AS VARIÁVEIS DE SESSÃO DO PROJETO
        session_destroy();

?>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Você saiu do site, bebê</h1>

    <h3> <a href="login.php">Fazer login novamente </a> <h3>
</body>
</html>