<?php require_once("private/conexao.php"); ?>

<?php 
$consulta_livros = 'SELECT l.imagem,l.titulo, l.autor,g.nome,e.nome,t.nome,l.preco,l.paginas,l.idioma,l.descricao FROM livros l INNER JOIN genero g ON l.id_genero = g.idgenero INNER JOIN editora e ON l.id_editora = e.ideditora INNER JOIN tipo t ON l.id_tipo = t.idtipo;' ;

$todos_livros = mysqli_query($conecta, $consulta_livros);

if (!$todos_livros){
    die("Falha na consulta ao banco de dados");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <link href="css/mycss/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <title>Consulta de Livros</title>
</head>
<body>
    <header>
       <h1> Consulta de Livros </h1>

    </header>
    <main>
        <div id = "todos_livros">
            <h2>Todos os livros</h2>
            <!-- Array para busca dos livros -->
            <?php while ($lista = mysqli_fetch_assoc($todos_livros)){ //atenção ao fechamento da chave ?>

            <!--Organização dos dados em formato de lista-->
            <div class="caixa">
                <ul>
                    <li >
                        <img class="imagem" src="<?php echo $lista['imagem']?>" >
                    </li>
                    <li>
                        <h4><?php echo $lista['titulo'] ?></h4>
                    </li>
                    <li> 
                        Autor(a): <?php echo $lista['autor'] ?>
                    </li>
                    <li>
                        Preço: <?php echo $lista['preco'] ?>
                    </li>
                </ul>
            </div>
            <?php
            }
            ?>

        </div>



    </main>
</body>
<script src="js/bootstrap.min.js"></script>
</html>

<?php
    mysqli_close($conecta);
?>