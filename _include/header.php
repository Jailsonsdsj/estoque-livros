<?php 
     if (isset($_SESSION["usuario_portal"])){
         $nome_usuario = $_SESSION["usuario_portal"];
    }

?>

<header>
    <span>
        <a style="text-decoration:none;" href="inicio.php">
            <img src="img/logo.png" class="img-fluid" alt="Início">
        </a>
    </span>
    
    <aside class="painel_usuario">
        <span id="nome_usuario">
            Bem vindo, <?php echo $nome_usuario ?>!
            <br>
            <a id="meu_perfil" href="#">Meu Perfil</a> | 
            <a id="configuracoes" href="configuracoes.php">Configurações</a>  
        </span> 
        <a href="logout.php"><span id="botao_sair"> Sair  </span></a>        
        </div>
    </aside>
    <span>
        <img src="img/teste.svg"  class="botao-menu-mobile uk-button uk-button-default" >
    </span>
    
        <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
                <span id="nome_usuario">
                    Bem vindo, <?php echo $nome_usuario ?>!
                    <hr>
                <ul class="lista-geral">
                    <li>Meu Perfil</li>
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="logout.php">Sair</a></li>   
                </ul>  
                </span> 
            </ul>
        </div>

    
</header>