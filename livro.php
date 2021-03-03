<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>
<?php
    if (isset($_GET["codigo"])){
        $idlivros = $_GET["codigo"];
    
    }else{
        header("location: inicio.php");

    }

    $consulta_livros = 'SELECT l.idlivros,l.imagem,l.titulo, l.autor,g.nome as "genero",e.nome as "editora",t.nome as "tipo",l.preco,l.paginas,i.idioma,l.descricao,l.isbn,l.estoque ';
    $consulta_livros .= ' FROM livros l ';
    $consulta_livros .= ' INNER JOIN genero g ON l.id_genero = g.idgenero ';
    $consulta_livros .= ' INNER JOIN editora e ON l.id_editora = e.ideditora ';
    $consulta_livros .= ' INNER JOIN tipo t ON l.id_tipo = t.idtipo ';
    $consulta_livros .= ' INNER JOIN idiomas i ON l.id_tipo = i.ididioma ';
    $consulta_livros .= " WHERE idlivros = {$idlivros}";

    $livros = mysqli_query($conecta, $consulta_livros);

    if (!$livros){
        die("Falha na consulta ao banco de dados");
    }else{
        $livros_detalhe = mysqli_fetch_assoc($livros);

        $idlivros = $livros_detalhe['idlivros'];
        $titulo = $livros_detalhe['titulo'];
        $autor = $livros_detalhe['autor'];
        $genero = $livros_detalhe['genero'];
        $editora = $livros_detalhe['editora'];
        $tipo = $livros_detalhe['tipo'];
        $isbn = $livros_detalhe['isbn'];
        $preco = $livros_detalhe['preco'];
        $estoque = $livros_detalhe['estoque'];
        $descricao = $livros_detalhe['descricao'];
        $imagem = $livros_detalhe['imagem'];
        $idioma = $livros_detalhe['idioma'];
        $paginas = $livros_detalhe['paginas'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <title><?php echo $titulo ?> | Livraria Estante</title>
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>

    <main id="main-livro" class="container-fluid">
    
        <div class="caixa-detalhe row row-cols-1 row-cols-md-3 mb-3">
        
            <div class=" container_imagem col">
            <div id="alteracao-livro" class="btn-primary"><p>
                <a href="alterar-livro.php?codigo=<?php echo $idlivros ?>">Alterar Informações</a> |
                <a href="#">Excluir Livro</a> 
            
                </div>
                <img class="img-fluid " src="<?php echo $imagem ?>">
                </p></div>
        
            <div class="container_detalhes col">
            
                <div id="blocoA"> 
                    <ul>
                        <li><h2><?php echo $titulo ?></h2></li>
                        <hr style="width:93%">
                        <li>Autor(a): <?php echo $autor ?> </li>
                        <li>R$ <?php echo $preco ?> </li>
                        
                    </ul>
                </div>
                <div id="blocoB">
                    <ul>
                        <li>Gênero: <?php echo $genero ?></li>
                        <li>Editora: <?php echo $editora ?> </li>
                        <li>Tipo: <?php echo $tipo ?> </li>
                        <li>ISBN: <?php echo $isbn ?> </li>
                        <li>Idioma: <?php echo $idioma ?> </li>
                        <li>Quantidade de páginas: <?php echo $paginas ?> </li> 
                        <!--ADM-->
                        <li hidden>Estoque: <?php echo $estoque ?> </li>
                        <li><input id= "botao-carrinho" type="button" class="btn btn-primary " value="Adicionar ao carrinho"></button></li>
                    </ul>
                </div>  
            </div>
           
            <div class="container_descricao col border border-1 overflow-auto">
                <p><?php echo $descricao ?></p>
               
            </div>             
        </div>  
        
    </main>
    <footer>
       
    </footer>


</body>
</html>