<header>
     
    <a style="text-decoration:none" href="inicio.php"><h1 id="logo"> Livraria Estante</h1></a>
   
    
    <aside class="painel_usuario">
        <span id="nome_usuario">
            <?php
                if (isset($_SESSION["usuario_portal"])){
                        echo "<p> Bem vindo, ".$_SESSION["usuario_portal"]."!</p>";
                }
            ?>
        </span> 
        <a href="logout.php"><span id="botao_sair"> Sair  </span></a>  
     
    </aside>
</header>