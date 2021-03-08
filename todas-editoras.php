<?php require_once("private/conexao.php"); ?>
<?php require_once("private/seguranca.php"); ?>

<?php 
    setlocale(LC_ALL, 'pt_BR');

    $consulta_lista_editoras = " SELECT * FROM editora " ;
    if (isset($_GET['pesquisa_editora'])){
        $pesquisa = $_GET["pesquisa_editora"];
        $consulta_lista_editoras .= " WHERE nome LIKE '%{$pesquisa}%' ";
    }
    $consulta_lista_editoras .= " ORDER BY nome ASC ";

  
    $extrato_todas_editoras = mysqli_query($conecta, $consulta_lista_editoras);
    if (!$extrato_todas_editoras){
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
    
    <title> Todas as Editoras | Livraria Estante</title>
</head>
<body>
 <!--header-->
 <?php include_once("_include/header.php"); ?>
    <main class="principal container-fluid">
        <div class="titulo-central">
            <h1>Todas as Editoras</h1>
        </div>
        <div id="caixa-lista" class="table-responsive row row-cols-1 row-cols-md-1 mb-1 uk-card uk-card-default">
            <form id="pesquisar-editoras" action="todas-editoras.php" method="get" class="input-group mb-3 barra-pesquisa" >
                <input type="text" class="form-control" name="pesquisa_editora" placeholder="Pesquisar por editora" aria-label="Pesquisar Livros" aria-describedby="button-addon2">
                <button type="input" name="botao" class="btn btn-primary" id="button-addon2" >Pesquisar</button>
            </form>
            <table class="table" id="lista-livros">
                <thead>
                    <tr id="coluna-tabela">
                    <th id="coluna-id" scope="col">ID</th>
                    <th id="coluna-titulo" scope="col">Nome</th>
                    <th id="coluna-autor" scope="col">CNPJ</th>
                    <th id="coluna-alterar" scope="col"></th>
                    <th id="coluna-excluir" scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    while($lista_editoras = mysqli_fetch_assoc($extrato_todas_editoras)){         
                ?>
                    <form action="todos-livros.php" method="post">
                        <tr id="linha-tabela">
                            <th scope="row"><?php echo $lista_editoras["ideditora"]; ?></th>
                            <td id="linha-titulo">
                                    <?php echo $lista_editoras["nome"]; ?>
                                </td>
                            <td id="linha-autor">
                                    <?php echo $lista_editoras["cnpj"]; ?>
                                </td>
                            
                            <td><a href="#" uk-toggle>Excluir</a> </td>
                        </tr>
                       
                    </form>
           
                <?php
                    }
                ?>
                </tbody>
            </table>
        
        </div> 
        
        <!--CONFIRMAÇÃO DA EXCLUSÃO-->
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