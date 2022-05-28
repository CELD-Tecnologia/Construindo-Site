<?php
if(!isset($_SESSION)) { session_start(); }
include_once("conexao.php"); 

//Validação será feita em JS antes de enviar o método Post
$nmUsuario = $_POST['nmUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$idProfissao = $_POST['idProfissao'];
$senhaUsuario = $_POST['senhaUsuario'];

$queryInsercao = "INSERT INTO tbusuario (nmUsuario, emailUsuario, idProfissao, senhaUsuario) 
VALUES ('$nmUsuario','$emailUsuario' ,'$idProfissao','$senhaUsuario')";

mysqli_query($conn, $queryInsercao);
$_SESSION['idUsuario'] = mysqli_insert_id($conn);

//inserir as validações:
/**
 * Não ter e-mail repetido
 * Confirmar que cadastro foi efetuado
 * Confirmar que sessão foi aberta corretamente
 * criptografia da senha
 */

echo '<meta http-equiv="refresh" content="0;url=../_painelAdm">';
?>