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


    <title>INSIRA_O_TITULO</title>
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>
    
    <main  class= "principal container-fluid">

       
    



    </main>
    <!--footer-->
    <?php include_once("_include/footer.php"); ?>
    
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="uikit/js/uikit.min.js"></script>
<script src="uikit/js/uikit.js"></script>
<script src="uikit/js/uikit-icons.js"></script>
<script src="uikit/js/uikit-icons.min.js"></script>
</html>


<?php
    mysqli_close($conecta);
?>