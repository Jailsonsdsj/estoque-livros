<?php 
     if (isset($_SESSION["usuario_portal"])){
         $nome_usuario = $_SESSION["usuario_portal"];
    }

?>

<header>
     
    <a style="text-decoration:none" href="inicio.php"><h1 id="logo"> Livraria Estante</h1></a>
    
    
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
    
</header>