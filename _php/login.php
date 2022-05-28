<?php
if(!isset($_SESSION)) { session_start(); }
include_once("conexao.php"); 

$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];
	
//$senha = hash('whirlpool', $senha);

$sql = mysqli_query($conn, "select idUsuario from tbusuario where emailUsuario = '" . $emailUsuario . "' and senhaUsuario = '" . $senhaUsuario . "'") or die(mysqli_error());
while($row = mysqli_fetch_array($sql)){
	$_SESSION['idUsuario'] = $row['idUsuario'];
}

//Inserir validação de senha errada em JS
echo '<meta http-equiv="refresh" content="0;url=../_painelAdm">';
?>