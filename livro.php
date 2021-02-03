<?php require_once("private/conexao.php"); ?>
<?php
    if (isset($_GET["codigo"])){
        $idlivros = $_GET["codigo"];
    
    }else{
        header("location: index.php");

    }

    $consulta_livros = 'SELECT l.idlivros,l.imagem,l.titulo, l.autor,g.nome as "genero",e.nome as "editora",t.nome as "tipo",l.preco,l.paginas,l.idioma,l.descricao,l.isbn,l.estoque ';
    $consulta_livros .= ' FROM livros l ';
    $consulta_livros .= ' INNER JOIN genero g ON l.id_genero = g.idgenero ';
    $consulta_livros .= ' INNER JOIN editora e ON l.id_editora = e.ideditora ';
    $consulta_livros .= ' INNER JOIN tipo t ON l.id_tipo = t.idtipo ';
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
    <link href="css/mycss/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <div class="box_livro">
        <ul>
            <li><img src="<?php echo $imagem ?>"> </li>
            <li><h2><?php echo $titulo ?></h2></li>
            <li>Autor: <?php echo $autor ?></li>
            <li>Preço: R$<?php echo $preco ?></li>
            <li>Gênero: <?php echo $genero ?></li>
            <li>Editora: <?php echo $editora ?></li>
            <li>Tipo: <?php echo $tipo ?></li>
            <li>ISBN: <?php echo $isbn ?></li>
            <li>Idioma <?php echo $idioma ?></li>
            <li>Quantidade de páginas: <?php echo $paginas ?></li>
            <li>Descrição: <?php echo $descricao ?></li>
        </ul>
    </div>



</body>
</html>