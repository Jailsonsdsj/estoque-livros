<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>

<?php 
    setlocale(LC_ALL, 'pt_BR');

     $consulta_livros = "SELECT l.idlivros,l.imagem,l.titulo, l.autor,g.nome,e.nome,t.nome AS tipo,l.preco,l.paginas,i.idioma,l.descricao FROM livros l INNER JOIN genero g ON l.id_genero = g.idgenero 
     INNER JOIN idiomas i ON l.id_idioma = i.ididioma INNER JOIN editora e ON l.id_editora = e.ideditora INNER JOIN tipo t ON l.id_tipo = t.idtipo " ;
  
    //pesquisa por filtro
    if (isset($_GET['pesquisa_livro'])){
        $pequisa_livros = $_GET["pesquisa_livro"];
        $consulta_livros .= " WHERE l.titulo LIKE '%{$pequisa_livros}%' or l.autor LIKE '%{$pequisa_livros}%' ";
    }
    //fim da peqsuisa por filtro

    
    $todos_livros = mysqli_query($conecta, $consulta_livros);
    if (!$todos_livros){
        die("Falha na consulta ao banco de dados");
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
    

    

    <title>Consulta de Livros</title>
</head>
<body>
    <!--header-->
    <?php include_once("_include/header.php"); ?>
    
    <main  class= "principal container-fluid">
        <div class="banner">
            <!--Aqui entram os banners-->
        </div>
        <form action="inicio.php" method="get" class="barra-pesquisa input-group mb-3" >
            <input type="text" class="form-control" name="pesquisa_livro" placeholder="Pesquisar Livros ou Autores" aria-label="Pesquisar Livros" aria-describedby="button-addon2">
            <button type="input" name="botao" class="btn btn-primary" id="button-addon2" >Pesquisar</button>
        </form>
    
        <div class="titulo-grupo">
                <h2 class="subtitulo">Todos os livros</h2>
                <hr>
        </div>
        <div class="grupo-livros row row-cols-1 row-cols-md-1 mb-1">
            
            <!-- Array para busca dos livros -->
            <?php while ($lista = mysqli_fetch_assoc($todos_livros)){ //atenção ao fechamento da chave ?>
           
                <div class="caixa-livro col uk-card uk-card-default" >
                    <a href="livro.php?codigo=<?php echo $lista['idlivros'];?>">
                        <img class="capa-livro-pequena" src="<?php echo $lista['imagem']?>" >
                    </a>
                    <div class="caixa-informacoes ">
                        <ul class="lista-geral">
                            <li class="li-titulo" >
                                <h5 style="font-size: 17px; margin-top: 10%; "><?php echo $lista['titulo']; ?></h5>
                            </li>
                            <li class="li-autor" style="font-size: 15px;"> 
                                <?php echo $lista['autor']; ?>
                            </li>
                            <li style="font-size: 14px;"id="li-tipo"> 
                                <?php echo $lista['tipo']; ?>
                            </li>
                            <li class="li-preco" style="font-size: 13px;">
                                <b> R$ </b> <?php echo $lista['preco']; ?>
                            </li>                    
                        </ul>
                    </div>
                    
                </div>     
                
            <?php
                }//fechamento da chave
            ?>

        </div>
       
    </main>
    <footer>    
      
    </footer>
    
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