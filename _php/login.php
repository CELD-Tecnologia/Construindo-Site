<?php
if(!isset($_SESSION)) { session_start(); }

$_SESSION['cd_usuario'] = 0;

include_once("conexao.php"); 

$usuario_email = $_POST['usuario_email'];
$usuario_senha = $_POST['usuario_senha'];
	
//$senha = hash('whirlpool', $senha);
$sql = mysqli_query($conn, "select cd_usuario from usuarios where usuario_email = '" . $usuario_email . "' and usuario_senha = '" . $usuario_senha . "'") or die(mysqli_error());
while($row = mysqli_fetch_array($sql)){
	$_SESSION['cd_usuario'] = $row['cd_usuario'];
}

//Inserir validação de senha errada em JS
if($_SESSION['cd_usuario'] == 0) {
//senha inválida
echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
} else {
	echo '<meta http-equiv="refresh" content="0;url=../_painelAdm">';
}

/*
	Pendências:
	1 -> Fazer o login via ajax
	2 -> criptografar as senhas
	3 -> Somente logins de email celdtecnologia poderão ser adminsitradores
	4 -> Os administradores poderam ver todos os sites e teram alguns acessos a mais também
*/

?>