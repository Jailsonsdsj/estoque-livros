<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<!--SELECTS-->
<?php require_once("_include/selects.php");?>
<?php
   

    $info = "SELECT * FROM livros ";
    if (isset($_GET["codigo"])){
        $id_alteracao = $_GET["codigo"];
        $info .= " WHERE idlivros = {$id_alteracao}";
    }else{
        $info .= " WHERE idlivros = 1";
    }
     
   $extracao_dados = mysqli_query($conecta,$info);
    if (!$extracao_dados){
        die("Falha na consulta ao banco de dados");
    }else{
        $dados_livro = mysqli_fetch_assoc($extracao_dados);
    }
  
    //RECEBENDO INFORMAÇÕES
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
        $descricao  = $_POST["descricao-livro"];
        $lId         = $_POST["livroId"];


        $alterar  = "UPDATE livros SET ";
        $alterar .= " titulo        = '{$titulo}',";
        $alterar .= " autor         = '{$autor}',";
        $alterar .= " preco         = '{$preco}',";
        $alterar .= " id_genero        = {$genero},";
        $alterar .= " id_editora       = {$editora},";
        $alterar .= " id_tipo          = {$tipo},";
        $alterar .= " idioma        = '{$idioma}',";
        $alterar .= " isbn          = '{$isbn}',";
        $alterar .= " paginas       = '{$paginas}',";
        $alterar .= " estoque       = {$estoque},";
        $alterar .= " imagem          = '{$capa}',";
        $alterar .= " descricao     = '{$descricao}' ";
        $alterar .= " WHERE ";
        $alterar .= " idlivros = {$lId}";

        $operacao_alterar = mysqli_query($conecta,$alterar);
        if (!$operacao_alterar){
            die("Erro na alteração dos dados");
        }else{
            header("location:livro.php?codigo=$lId");
        }
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
    <title>Configurações | Livraria Estante</title>
    
   
</head>
<body>
<?php
        if(isset($operacao_alterar)){
        ?>
            <!--SUBSTITUIR O ALERT POR UMA MENSAGEM NO PRÓXIMO FORMULÁRIO-->
           <script>alert("Livro alterado com sucesso!");</script>

        <?php
            }
        ?>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main class= "container-fluid">
        <div id="titulo_configuracoes">
            <h1>Alterar Livro</h1>
        </div>
        
        
        
        <div id="cadastro-livro" class="box-container ">
            
            <form id="fomulario-cadastro-livro" class= "box-content" action="alterar-livro.php" method="post" >
                <div class="mb-3" id="div-titulo-livro">
                    <label for="titulo-livro" class="form-label"><p>Título:</p></label>
                    <input type="text" name="titulo-livro" id="titulo-livro"  class="form-control" value="<?php echo $dados_livro["titulo"];?>" >
                </div>

                <div class="coluna">
                    <div class="mb-3" id="campo1">
                        <label for="autor-livro" class="form-label"><p>Autor:</p></label>
                        <input id="autor-livro" name="autor-livro" class="form-control" type="text" value="<?php echo $dados_livro["autor"];?>">
                    </div>

                    <div class="mb-3" id="campo2">
                        <label for="preco-livro" class="form-label"><p>Preço:</p></label>
                        <input id="preco-livro" name="preco-livro" class="form-control" type="text" value="<?php echo $dados_livro["preco"];?>">
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="genero-livro" class="form-label"><p>Gênero:</p></label>
                    <select name="genero-livro" class="form-select">
                        <?php 
                            while($generos = mysqli_fetch_assoc($lista_genero)){
                                $genero_antigo = $generos["idgenero"];
                                $genero_atual = $dados_livro["id_genero"];
                                if ($genero_atual == $genero_antigo){     
                        ?>
                            <option value="<?php echo $generos["idgenero"];?>">
                                <?php echo $generos["nome"];?>
                            </option>
                        <?php
                            }else{

                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="editora-livro" class="form-label"><p>Editora:</p></label>
                    <select name="editora-livro" class="form-select">
                        <?php 
                            while($editora_livros = mysqli_fetch_assoc($lista_editoras)){
                                $editora_antiga = $editora_livros["ideditora"];
                                $editora_nova = $dados_livro["id_editora"];
                                if($editora_antiga == $editora_nova){

                               
                        ?>
                            <option value="<?php echo $editora_livros["ideditora"];?>">
                                <?php echo $editora_livros["nome"];?>
                            </option>
                        <?php
                                }
                        }
                        ?>
                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="tipo-livro" class="form-label"><p>Tipo:</p></label>
                    <select name="tipo-livro" class="form-select">
                        <?php 
                            while($tipo_livro = mysqli_fetch_assoc($lista_tipo)){
                                $tipo_antigo = $tipo_livro["idtipo"];
                                $tipo_novo = $dados_livro["id_tipo"];
                                if ( $tipo_antigo==$tipo_novo ){
                                    
                        ?>
                            <option value="<?php echo $tipo_livro["idtipo"];?>">
                                <?php echo $tipo_livro["nome"];?>
                            </option>
                        <?php
                            } 
                        }
                        ?>
                    </select>
                </div>
                <!--ADICIONAR COLUNA IDIOMAS NO BANCO DE DADOS POSTERIORMENTE-->            
                <div class="mb-3">
                    <label for="idioma-livro" class="form-label"><p>Idioma:</p></label>
                    <select name="idioma-livro" class="form-select">
                        <option selected value="<?php $dados_livro["idioma"];?>"><?php echo $dados_livro["idioma"];?></option>                 
                    </select>
                </div>
                <div class="coluna">
                    <div class="mb-3" id="campo4"> 
                        <label for="isbn-livro" class="form-label"><p>ISBN:</p></label>
                        <input id="isbn-livro" name="isbn-livro" class="form-control" type="text" value="<?php echo $dados_livro["isbn"];?>">
                    </div>
                    <div class="mb-3" id="campo3">
                        <label for="paginas-livro" class="form-label "><p>Nº de Páginas:</p></label>
                        <input id="paginas-livro" name="paginas-livro" class="form-control" type="text" value="<?php echo $dados_livro["paginas"];?>">
                    </div>

                   
                </div>
                
                
                <div class="coluna">
                    <div class="mb-3" id="campo5">
                        <label for="estoque-livro" class="form-label"><p>Estoque:</p></label>
                        <input id="estoque-livro" name="estoque-livro" class="form-control" type="text" value="<?php echo $dados_livro["estoque"];?>">
                    </div>
                    <!--AJUSTAR O CAMPO DE IMAGEM
                    <div id="campo6" class="mb-3">
                        <label for="formFile" class="form-label" style="margin-bottom: 5px">Capa do Livro:</label>
                        <input id="enviar-capa" name="enviar-capa" class="form-control " type="file" id="formFile">
                    </div>
                    -->

                    <div id="campo6" class="mb-3">
                        <label for="formFile" class="form-label" style="margin-bottom: 5px">URL da Imagem:</label>
                        <input id="enviar-capa" name="enviar-capa" class="form-control " type="text" id="formFile" value="<?php echo $dados_livro["imagem"];?>">
                    </div>
                </div>
               <div class="mb-3">
                    <label for="descricao-livro" class="form-label"><p>Descrição:</p></label>
                    <textarea id="descricao-livro" name="descricao-livro" class="form-control" type="text" maxlength="10000" value="<?php echo $dados_livro["descricao"];?>"> </textarea>
                </div>

                <input type="submit" name="Alterar" value="Alterar" class="btn btn-outline-secondary " id="botao-cadastrar" style="margin-top:20px;" ></input>
                
                <!--CAMPO DE ID OCULTO-->
                <input type="hidden" name="livroId" value="<?php echo $dados_livro["idlivros"]; ?>">
 
            </form>
        </div>
    
      
    </main>
</body>
</html>


<?php
    mysqli_close($conecta);
?>