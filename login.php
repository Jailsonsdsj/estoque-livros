<?php require_once("private/conexao.php"); ?>


<?php
    session_start();

    if (isset($_POST["email"])){
        $usuario = $_POST["email"];
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
    <link href="uikit\css\uikit.css" rel="stylesheet">
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <link href="css\style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Login | Livraria Estante</title>
    
   
</head>

<body>  
    <header>
        <span>
            <a style="text-decoration:none;" href="inicio.php">
                <img src="img/logo.png" class="img-fluid" alt="Início">
            </a>
        </span>
    
    </header>
    
        <main class="tela-login">  
            <div >
               
                <form action="login.php" method="post">
                    <h2 class="titulo-central">Login</h2>

                    <div class="mb-3" >
                        <input type="text" name="email" id="login-email"  class="form-control" placeholder="E-mail">
                     </div>

                     <div class="mb-3">
                        <input type="password" name="senha" id="login-senha"  class="form-control" placeholder="Senha">
                     </div>

                    
                    <input type="submit" value='Entrar' action="logout.php" class="btn btn-primary">
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