<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'estoquelivros';
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

    if (mysqli_connect_errno()){
        die("Conexão com o banco falhou".mysqli_conect_errno());
    }

?>