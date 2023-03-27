<?php
    if(!isset($_SESSION)) { session_start(); }

    if(empty($_SESSION['cd_usuario'])) { 
        echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
    }

    if(empty($_SESSION['usuario_tipo'])) { 
        $_SESSION['usuario_tipo'] = '1';
    }

    include_once("../_php/conexao.php");
?>