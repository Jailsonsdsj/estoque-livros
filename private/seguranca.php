<?php

    session_start();

    if (!isset($_SESSION['usuario_portal'])){
        header("Location:login.php");
    }


?>







