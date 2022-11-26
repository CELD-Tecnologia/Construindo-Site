<?php
if(!isset($_SESSION)) { session_start(); }

$_SESSION['idUsuario'] = 0;

include_once("conexao.php"); 

$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];
	
//$senha = hash('whirlpool', $senha);
$sql = mysqli_query($conn, "select idUsuario from tbusuario where emailUsuario = '" . $emailUsuario . "' and senhaUsuario = '" . $senhaUsuario . "'") or die(mysqli_error());
while($row = mysqli_fetch_array($sql)){
	$_SESSION['idUsuario'] = $row['idUsuario'];
}

//Inserir validação de senha errada em JS
if($_SESSION['idUsuario'] == 0) {
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