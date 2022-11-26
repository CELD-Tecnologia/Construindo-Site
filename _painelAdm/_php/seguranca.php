<?
    if(!isset($_SESSION)) { session_start(); }

	if($_SESSION['idUsuario'] == 0) { 
        echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
    } else {
        echo $_SESSION['idUsuario'];
    }
?>