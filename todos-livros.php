<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>

<?php 
    setlocale(LC_ALL, 'pt_BR');

    $consulta_lista_livros = " SELECT idlivros, titulo, autor,isbn FROM livros " ;
    if (isset($_GET['pesquisa_livro'])){
        $pesquisa = $_GET["pesquisa_livro"];
        $consulta_lista_livros .= " WHERE titulo LIKE '%{$pesquisa}%' or autor LIKE '%{$pesquisa}%' ";
    }
    $consulta_lista_livros .= " ORDER BY titulo ASC";

    //EXCLUSÃO DO LIVRO
    if (isset($_POST["idlivros"])){
        $l_id = $_POST["idlivros"];

        $exclusao  = "DELETE FROM livros ";
        $exclusao .= " WHERE idlivros = {$t_id}";
        $con_exclusao = mysqli_query($conecta,$exclusao);
        if (!$con_exclusao){
            die("Falha ao excluir o registro");
        }else{
            header("Location:todos-livros.php");
        }
    }
  
    $extrato_todos_livros = mysqli_query($conecta, $consulta_lista_livros);
    if (!$extrato_todos_livros){
        die("Falha na consulta ao banco de dados");
    }
    


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="uikit\css\uikit.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <title> Configurações - Todos os Livros | Livraria Estante</title>
</head>
<body>
 <!--header-->
 <?php include_once("_include/header.php"); ?>
    <main>
        <div class="titulo-central">
            <h1>Configurações - Todos os Livros</h1>
        </div>
        <div id="caixa-lista" class="table-responsive">
            <form id="pesquisar-livros" action="todos-livros.php" method="get" class="input-group mb-3" >
                <input type="text" class="form-control" name="pesquisa_livro" placeholder="Pesquisar Livros ou Autores" aria-label="Pesquisar Livros" aria-describedby="button-addon2">
                <button type="input" name="botao" class="btn btn-outline-secondary" id="button-addon2" >Pesquisar</button>
            </form>
            <table class="table" id="lista-livros">
                <thead>
                    <tr id="coluna-tabela">
                    <th id="coluna-id" scope="col">ID</th>
                    <th id="coluna-titulo" scope="col">Título</th>
                    <th id="coluna-autor" scope="col">Autor</th>
                    <th id="coluna-alterar" scope="col"></th>
                    <th id="coluna-excluir" scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    while($lista_livros = mysqli_fetch_assoc($extrato_todos_livros)){         
                ?>
                    <form action="todos-livros.php" method="post">
                        <tr id="linha-tabela">
                            <th scope="row"><?php echo $lista_livros["idlivros"]; ?></th>
                            <td id="linha-titulo">
                                    <a href="livro.php?codigo=<?php echo $lista_livros['idlivros'];?>">
                                        <?php echo $lista_livros["titulo"]; ?>
                                    </a>
                                </td>
                            <td id="linha-autor">
                                    <a href="livro.php?codigo=<?php echo $lista_livros['idlivros'];?>">
                                        <?php echo $lista_livros["autor"]; ?>
                                    </a>
                                </td>
                            
                            <td><a href="alterar-livro.php?codigo=<?php echo $lista_livros['idlivros'];?>">Alterar</a></td>
                            <td><a href="#confirmacao-exclusao" uk-toggle>Excluir</a> </td>
                        </tr>
                       
                    </form>
           
                <?php
                    }
                ?>
                </tbody>
            </table>
        
        </div> 
        
        <!--CONFIRMAÇÃO DA EXCLUSÃO-->
       
        <div id="confirmacao-exclusao" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h3 class="uk-modal-title">Confirmar exclusão</h3>
                <hr>
                <p>Tem certeza que deseja excluir o seguinte livro:</p>
                <ul>
                    <li><b>ID:</b> <?php echo $teste; ?></li>
                    <li><b>Tílulo:</b> <?php echo $lista_livros['titulo']; ?></li>
                    <li><b>Atuor(a):</b><?php echo $lista_livros['autor']; ?> </li>
                    <li><b>ISBN</b>: <?php echo $lista_livros['isbn']; ?></li>
                </ul>
                    <p class="uk-text-right">
                        <a id="cancelar-exclusao" class="uk-modal-close">Cancelar</button>
                         <button type="submit" name="botao" class="btn btn-outline-secondary" id="button-addon2">Confirmar</button></a>
                    </p>
                            
            </div>
        </div>
    </main>     

    
</body>
</html>

<script src="uikit\js\uikit.min.js"></script>
<script src="uikit\js\uikit.js"></script>
<script src="uikit\js\uikit-icons.js"></script>
<script src="uikit\js\uikit-icons.min.js"></script>

<?php
    mysqli_close($conecta);
?>