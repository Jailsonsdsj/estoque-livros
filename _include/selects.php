<?php
  
    //SELECT PARA GÊNERO
    $genero = "SELECT idgenero, nome FROM genero ORDER BY nome ASC";
    $lista_genero = mysqli_query($conecta,$genero);
    if (!$lista_genero){
        die("Falha ao consultar a lista de gêneros");
    }


    //SELECT PARA AS EDITORAS
    $editoras = "SELECT * FROM editora ORDER BY editora.nome ASC";
    $lista_editoras=mysqli_query($conecta,$editoras);
    if (!$lista_editoras){
        die("Falha ao consultar a lista de editoras");
    }

    //SELECT PARA TIPO
    $tipo = "SELECT * FROM tipo";
    $lista_tipo=mysqli_query($conecta,$tipo);
    if (!$lista_tipo){
        die("Falha ao consultar a lista de tipos");
    }

     //SELECT PARA IDIOMAS
     $idioma = "SELECT * FROM idiomas";
     $lista_idioma=mysqli_query($conecta,$idioma);
     if (!$lista_idioma){
         die("Falha ao consultar a lista de idiomas");
     }

?>