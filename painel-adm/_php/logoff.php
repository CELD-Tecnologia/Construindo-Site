<?php
    if(!isset($_SESSION)) { session_start(); }
	$_SESSION['cd_usuario'] = null;

	if(!empty($_SESSION)) { 
		session_destroy();
	} 

    echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
?>