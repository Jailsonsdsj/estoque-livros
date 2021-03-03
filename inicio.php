<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>

<?php 
    setlocale(LC_ALL, 'pt_BR');

     $consulta_livros = "SELECT l.idlivros,l.imagem,l.titulo, l.autor,g.nome,e.nome,t.nome,l.preco,l.paginas,i.idioma,l.descricao FROM livros l INNER JOIN genero g ON l.id_genero = g.idgenero 
     INNER JOIN idiomas i ON l.id_idioma = i.ididioma INNER JOIN editora e ON l.id_editora = e.ideditora INNER JOIN tipo t ON l.id_tipo = t.idtipo " ;
  
    //pesquisa por filtro
    if (isset($_GET['pesquisa_livro'])){
        $pequisa_livros = $_GET["pesquisa_livro"];
        $consulta_livros .= " WHERE l.titulo LIKE '%{$pequisa_livros}%' ";
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
    
    <main class= "container-fluid">
        <div id="titulo">
            <h1> Consulta de Livros </h1>
        </div>
        <form action="inicio.php" method="get" class="input-group mb-3" >
            <input type="text" class="form-control" name="pesquisa_livro" placeholder="Pesquisar Livros" aria-label="Pesquisar Livros" aria-describedby="button-addon2">
            <button type="input" name="botao" class="btn btn-outline-secondary" id="button-addon2" >Pesquisar</button>
        </form>
    


        <div id = "todos_livros">
            <h2>Todos os livros</h2>
            <hr>
            <!-- Array para busca dos livros -->
            <?php while ($lista = mysqli_fetch_assoc($todos_livros)){ //atenção ao fechamento da chave ?>

            <!--Organização dos dados em formato de lista-->
            <div class="caixa_grande">
                <div class="caixa_media">
                    <ul>
                        <li class="lista_livro">
                            <img class="imagem_livro rounded mx-auto shadow-sm" src="<?php echo $lista['imagem']?>" >
                        </li>
                       
                        <li>
                            <h5><?php echo $lista['titulo'] ?></h5>
                        </li>
                        <hr id="linha_card">
                        <li> 
                            <b>Autor(a):</b> <?php echo $lista['autor'] ?>
                        </li>
                        <li>
                        <b> Preço:</b> <?php echo $lista['preco'] ?>
                        </li>
                    </ul>
                </div>
                <div class="caixa_pequena">
                    <ul>
                       
                        <li id="li_vermais">
                            <a href="livro.php?codigo=<?php echo $lista['idlivros'];?>">
                                <buttontype="button" id="bt_vermais"class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Ver mais
                                </button>
                            </a>
                        </li>
                    
                    </ul>
                </div>
            </div>
            
            <?php
                }//fechamento da chave
            ?>

        </div>



    </main>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>

<?php
    mysqli_close($conecta);
?>