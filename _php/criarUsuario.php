<?php
if(!isset($_SESSION)) { session_start(); }
include_once("conexao.php"); 

//Validação será feita em JS antes de enviar o método Post
$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email'];
$idProfissao = $_POST['idProfissao'] ?? 1;
$usuario_senha = $_POST['usuario_senha'];

$queryInsercao = "INSERT INTO usuarios (usuario_nome, usuario_email, idProfissao, usuario_senha) 
VALUES ('$usuario_nome','$usuario_email' ,'$idProfissao','$usuario_senha')";

mysqli_query($conn, $queryInsercao);
$_SESSION['cd_usuario'] = mysqli_insert_id($conn);

//inserir as validações:
/**
 * Não ter e-mail repetido
 * Confirmar que cadastro foi efetuado
 * Confirmar que sessão foi aberta corretamente
 * criptografia da senha
 * Verificar também se tem alguma profissão escolhida 
 *          ou se a profissão será no momento da criação do site apenas
 * No momento, estamos trabalhando apenas com a profissão de montador de móveis
 * Verificar também se pegaremos os dados como CPF para poder formalizar o cadastro, no momento o cadastro esta funcionando normalmente
 */

echo '<meta http-equiv="refresh" content="0;url=../_painelAdm">';
?>