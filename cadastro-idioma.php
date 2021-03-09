<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php require_once("_include/selects.php"); ?>
<?php
   
   
    //COLETANDO INFORMAÇÕES DO FORMULÁRIO
    if (isset($_POST["nome-idioma"])){
        $nome_idioma     = $_POST["nome-idioma"];

        //INSERINDO DADOS NO BD
        $cadastro_idiomas =  "INSERT INTO idiomas (ididioma,idioma) VALUES (null,'$nome_idioma')";

        $operacao_inserir_idioma = mysqli_query($conecta,$cadastro_idiomas);
        if (!$operacao_inserir_idioma){
            die("Falha ao cadastrar idioma");
        }
    }
    

    

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
    <title>Cadastrar Idioma | Livraria Estante</title>
    
   
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "principal container-fluid">
        <div class="titulo-central">
            <h2>Cadastro de Idiomas</h2>
           
        </div>
  
        <div class="barra-principal box-container uk-card uk-card-default ">
            <!--IMPORTANTE: FALTA INSERIR O VALIDADOR DE FORMULÁRIOS VIA JAVASCRIPT-->
            <form id="fomulario-cadastro-idioma" class= "box-content" action="cadastro-idioma.php" method="post" >
                <div class="mb-3">
                    <label for="nome-idioma" class="form-label"><p>Idioma</p></label>
                    <input type="text" name="nome-idioma" id="nome-idioma"  class="form-control">
                </div>
                    
   
                <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary " id="botao-cadastrar" style="margin-top:20px;" ></input>

            </form>
        </div>

    </main>
    <!--footer-->
    <?php include_once("_include/footer.php"); ?>
</body>
</html>


<script src="uikit\js\uikit.min.js"></script>
<script src="uikit\js\uikit.js"></script>
<script src="uikit\js\uikit-icons.js"></script>
<script src="uikit\js\uikit-icons.min.js"></script>

<?php
    mysqli_close($conecta);
?>