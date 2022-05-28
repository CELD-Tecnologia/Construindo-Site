<?php

    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 4;
    include("_php/buscar-site.php");
?>