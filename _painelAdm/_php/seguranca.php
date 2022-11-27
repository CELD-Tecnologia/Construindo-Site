<?
    if(!isset($_SESSION)) { session_start(); }

	if($_SESSION['cd_usuario'] == 0) { 
        echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
    } else {
        echo $_SESSION['cd_usuario'];
    }
?>