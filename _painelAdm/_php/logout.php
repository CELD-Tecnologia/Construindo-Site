<?php
    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['idUsuario'] = 0;
    echo '<meta http-equiv="refresh" content="0;url=../../../">';
?>