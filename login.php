<?php require_once("private/conexao.php"); ?>


<?php
    session_start();

    if (isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = " SELECT * FROM usuarios WHERE usuario = '{$usuario}' and senha = '{$senha}' ";
        
        $acesso = mysqli_query($conecta,$login);

        if (!$acesso){
            die ("Falha na consulta ao banco de dados");
        }

        $credenciais = mysqli_fetch_assoc($acesso);

        //VALIDANDO DADOS

        if (empty($credenciais)){
            $mensagem = "Usuário não cadastrado";

        }else{

            $_SESSION["usuario_portal"] = $credenciais["nome"];
            header("location:inicio.php");
        }

    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="uikit\css\uikit.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">

    </head>

    <body>   
        <main>  
            <div id="janela_login">
                <!--necessário usar o moethod post, pois o GET exibe as informações na barra de endereço-->
                <form action="login.php" method="post">
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha" >
                    <input type="submit" value='Login' action="logout.php">
                    <?php
                    if(isset($mensagem)){
                ?>
                    <div class="erro_login">
                        <p> <?php echo $mensagem ?></p>
                    </div>
                <?php 
                    }
                ?>
                </form>

                
            </div>
        </main>
 
    </body>
</html>


<script src="uikit\js\uikit.min.js"></script>
<script src="uikit\js\uikit.js"></script>
<script src="uikit\js\uikit-icons.js"></script>
<script src="uikit\js\uikit-icons.min.js"></script>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>