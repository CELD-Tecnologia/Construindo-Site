<?php
    if(!isset($_SESSION)) { session_start(); }

    if(empty($_SESSION['cd_usuario'])) { 
        echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
    }

    include_once("../_php/conexao.php");
?>