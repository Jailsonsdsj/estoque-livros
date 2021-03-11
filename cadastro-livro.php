<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php require_once("_include/selects.php"); ?>
<?php
    
    //COLETANDO INFORMAÇÕES DO FORMULÁRIO

    if (isset($_POST["titulo-livro"])){
        $titulo     = $_POST["titulo-livro"];
        $autor      = $_POST["autor-livro"];
        $preco      = $_POST["preco-livro"];
        $genero     = $_POST["genero-livro"];
        $editora    = $_POST["editora-livro"];
        $tipo       = $_POST["tipo-livro"];
        $idioma     = $_POST["idioma-livro"];
        $isbn       = $_POST["isbn-livro"];
        $paginas    = $_POST["paginas-livro"];
        $estoque    = $_POST["estoque-livro"];
        $capa       = $_POST["enviar-capa"];
        if ($capa==""){
            $capa       = "https://i.imgur.com/ql4zWWC.jpg";
        }
        $descricao  = $_POST["descricao-livro"];
        $amazon     = $_POST["link-amazon"];
        
        //INSERINDO DADOS NO BD
        $cadastro_livros =  "INSERT INTO livros (idlivros,titulo,autor,id_genero,id_editora,id_tipo,isbn,preco,estoque,descricao,imagem,id_idioma,paginas,amazon) VALUES (null,'$titulo','$autor',$genero,$editora,$tipo,'$isbn','$preco','$estoque','$descricao','$capa','$idioma','$paginas','$amazon')";

        $operacao_inserir = mysqli_query($conecta,$cadastro_livros);
        if (!$operacao_inserir){
            die("Falha ao cadastrar o livro");
        }else{
            $aviso = true;
           // header('Location: ' . $_SERVER['REQUEST_URI']); 
           echo $capa;
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
    <title>Cadastrar Livros | Livraria Estante</title>
    
   
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "principal container-fluid">
        <div class="titulo-central">
            <h2>Cadastrar Livros</h2>
           
        </div>
  
        <div id="cadastro-livro" class="box-container uk-card uk-card-default ">
            <!--IMPORTANTE: FALTA INSERIR O VALIDADOR DE FORMULÁRIOS VIA JAVASCRIPT-->
            <form id="fomulario-cadastro-livro" class= "box-content" action="cadastro-livro.php" method="post" >
                <div class="mb-3" id="div-titulo-livro">
                    <label for="titulo-livro" class="form-label"><p>Título:</p></label>
                    <input type="text" name="titulo-livro" id="titulo-livro"  class="form-control">
                </div>

                <div class="coluna">
                    <div class="mb-3 campo1">
                        <label for="autor-livro" class="form-label"><p>Autor(a):</p></label>
                        <input id="autor-livro" name="autor-livro" class="form-control" type="text" >
                    </div>

                    <div class="mb-3 campo2">
                        <label for="preco-livro" class="form-label"><p>Preço:</p></label>
                        <input id="preco-livro" name="preco-livro" class="form-control" type="text" placeholder="R$: " aria-label="R$: ">
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="genero-livro" class="form-label"><p>Gênero:</p></label>
                    <select name="genero-livro" class="form-select">
                        <option selected></option>
                        <?php 
                            while($generos = mysqli_fetch_assoc($lista_genero)){
                        ?>
                            <option value="<?php echo $generos["idgenero"];?>">
                                <?php echo $generos["nome"];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="editora-livro" class="form-label"><p>Editora:</p></label>
                    <select name="editora-livro" class="form-select">
                        <option selected></option>
                        <?php 
                            while($editora_livros = mysqli_fetch_assoc($lista_editoras)){
                        ?>
                            <option value="<?php echo $editora_livros["ideditora"];?>">
                                <?php echo $editora_livros["nome"];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="tipo-livro" class="form-label"><p>Tipo:</p></label>
                    <select name="tipo-livro" class="form-select">
                        <option selected></option>
                        <?php 
                            while($tipo_livro = mysqli_fetch_assoc($lista_tipo)){
                        ?>
                            <option value="<?php echo $tipo_livro["idtipo"];?>">
                                <?php echo $tipo_livro["nome"];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idioma-livro" class="form-label"><p>Idioma:</p></label>
                    <select name="idioma-livro" class="form-select">
                        <option selected></option>
                        <?php
                            while($idioma_livro = mysqli_fetch_assoc($lista_idioma)){
                        ?>
                            <option value="<?php echo $idioma_livro["ididioma"];?>">
                                <?php echo $idioma_livro["idioma"];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="coluna">
                    <div class="mb-3" id="campo4"> 
                        <label for="isbn-livro" class="form-label"><p>ISBN:</p></label>
                        <input id="isbn-livro" name="isbn-livro" class="form-control" type="text" placeholder="Ex.: 123456789" aria-label="Ex.: 123456789">
                    </div>
                    <div class="mb-3" id="campo3">
                        <label for="paginas-livro" class="form-label "><p>Nº de Páginas:</p></label>
                        <input id="paginas-livro" name="paginas-livro" class="form-control" type="text">
                    </div>

                   
                </div>
                
                
                <div class="coluna">
                    <div class="mb-3" id="campo5">
                        <label for="estoque-livro" class="form-label"><p>Estoque:</p></label>
                        <input id="estoque-livro" name="estoque-livro" class="form-control" type="text">
                    </div>
                    <!--<div id="campo6" class="mb-3">
                        <label for="formFile" class="form-label" style="margin-bottom: 5px">Capa do Livro:</label>
                        <input id="enviar-capa" name="enviar-capa" class="form-control " type="file" id="formFile">
                    </div>-->

                    <div id="campo6" class="mb-3">
                        <label for="formFile" class="form-label" style="margin-bottom: 5px">URL da Imagem:</label>
                        <input id="enviar-capa" name="enviar-capa" class="form-control " type="text" id="formFile">
                    </div>
                </div>
                <div class="mb-3" id="div-link-amazon">
                    <label for="link-amazon" class="form-label"><p>Link do livro na Amazon:</p></label>
                    <input type="text" name="link-amazon" id="link-amazon"  class="form-control">
                </div>
               <div class="mb-3">
                    <label for="descricao-livro" class="form-label"><p>Descrição:</p></label>
                    <textarea id="descricao-livro" name="descricao-livro" class="form-control" type="text"> </textarea>
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