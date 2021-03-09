<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php require_once("_include/selects.php"); ?>
<?php
   
   
    //COLETANDO INFORMAÇÕES DO FORMULÁRIO
    if (isset($_POST["nome-editora"])){
        $nome_editora     = $_POST["nome-editora"];
        $cnpj_editora      = $_POST["cnpj-editora"];
        
        
        //INSERINDO DADOS NO BD
        $cadastro_editoras =  "INSERT INTO editora (ideditora,nome,cnpj) VALUES (null,'$nome_editora','$cnpj_editora')";

        $operacao_inserir_editora = mysqli_query($conecta,$cadastro_editoras);
        if (!$operacao_inserir_editora){
            die("Falha ao cadastrar editora");
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
    <title>Cadastrar Editora | Livraria Estante</title>
    
   
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "principal container-fluid">
        <div class="titulo-central">
            <h2>Cadastro de Editoras</h2>
           
        </div>
  
        <div class="barra-principal box-container uk-card uk-card-default ">
            <!--IMPORTANTE: FALTA INSERIR O VALIDADOR DE FORMULÁRIOS VIA JAVASCRIPT-->
            <form id="fomulario-cadastro-editora" class= "box-content" action="cadastro-editora.php" method="post" >
            <div class="coluna">
                    <div class="mb-3 campo1" >
                        <label for="nome-editora" class="form-label"><p>Nome da Editora</p></label>
                        <input id="nome-editora" name="nome-editora" class="form-control" type="text" >
                    </div>

                    <div class="mb-3 campo2" >
                        <label for="cnpj-editora" class="form-label"><p>CNPJ</p></label>
                        <input id="cnpj-editora" name="cnpj-editora" class="form-control" type="text">
                    </div>
                    
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