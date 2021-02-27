<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php

    //SELECT PARA GÊNERO
    $genero = "SELECT idgenero, nome FROM genero ORDER BY nome ASC";
    $lista_genero = mysqli_query($conecta,$genero);
    if (!$lista_genero){
        die("Falha ao consultar a lista de gêneros");
    }


    //SELECT PARA AS EDITORAS
    $editoras = "SELECT * FROM editora ORDER BY editora.nome ASC";
    $lista_editoras=mysqli_query($conecta,$editoras);
    if (!$lista_editoras){
        die("Falha ao consultar a lista de editoras");
    }

    //SELECT PARA TIPO
    $tipo = "SELECT * FROM tipo";
    $lista_tipo=mysqli_query($conecta,$tipo);
    if (!$lista_tipo){
        die("Falha ao consultar a lista de tipos");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
            <h1>Cadastrar Livros</h1>
           
        </div>
        <div id="cadastro-livro" class="box-container ">
            <!--IMPORTANTE: FALTA INSERIR O VALIDADOR DE FORMULÁRIOS VIA JAVASCRIPT-->
            <form id="fomulario-cadastro-livro" class= "box-content" action="cadastro-livro.php" method="post" ></form>
                <div class="mb-3" id="div-titulo-livro">
                    <label for="titulo-livro" class="form-label"><p>Título:</p></label>
                    <input id="titulo-livro" class="form-control" type="text" placeholder="Ex.: A Divina Comédia" aria-label="Ex.: A Divina Comédia">
                </div>

                <div class="coluna">
                    <div class="mb-3" id="campo1">
                        <label for="autor-livro" class="form-label"><p>Autor:</p></label>
                        <input id="autor-livro" class="form-control" type="text" placeholder="Ex.: Dante Alighieri " aria-label="Ex.: Dante Alighieri">
                    </div>

                    <div class="mb-3" id="campo2">
                        <label for="preco-livro" class="form-label"><p>Preço:</p></label>
                        <input id="preco-livro" class="form-control" type="text" placeholder="R$: " aria-label="R$: ">
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
                            <option value="<?php echo $editora_livros["ideditoras"];?>">
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
                    <select name="idioma-livo" class="form-select">
                        <option selected></option>
                        <option value="1">Português</option>
                        <option value="2">Inglês</option>
                        <option value="3">Espanhol</option>
                    </select>
                </div>
                <div class="coluna">
                    <div class="mb-3" id="campo4"> 
                        <label for="isbn-livro" class="form-label"><p>ISBN:</p></label>
                        <input id="isbn-livro" class="form-control" type="text" placeholder="Ex.: 123456789" aria-label="Ex.: 123456789">
                    </div>
                    <div class="mb-3" id="campo3">
                        <label for="paginas-livro" class="form-label "><p>Nº de Páginas:</p></label>
                        <input id="paginas-livro" class="form-control" type="text">
                    </div>

                   
                </div>
                
                
                <div class="coluna">
                    <div class="mb-3" id="campo5">
                        <label for="estoque-livro" class="form-label"><p>Estoque:</p></label>
                        <input id="estoque-livro" class="form-control" type="text">
                    </div>
                    <div id="campo6" class="mb-3">
                        <label for="formFile" class="form-label" style="margin-bottom: 5px">Capa do Livro:</label>
                        <input id="enviar-capa" class="form-control " type="file" id="formFile">
                    </div>
                </div>
               <div class="mb-3">
                    <label for="descricao-livro" class="form-label"><p>Descrição:</p></label>
                    <textarea id="descricao-livro" class="form-control" type="text" maxlength="500"> </textarea>
                </div>

                <button type="input" name="cadastrar" class="btn btn-outline-secondary " id="botao-cadastrar" style="margin-top:20px;" >Cadastrar</button>


        </div>
    
      
    </main>
</body>
</html>


<?php
    mysqli_close($conecta);
?>