<?php
if(!isset($_SESSION)) {
    session_start();
}

$_SESSION = array();

include_once("conexao.php");

//Validação será feita em JS antes de enviar o método Post
$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email'];
$idProfissao = $_POST['idProfissao'] ?? null;
$usuario_senha = $_POST['usuario_senha'];

$usuario_senha = hash('whirlpool', $usuario_senha);
$queryInsercao = "INSERT INTO usuarios (usuario_nome, usuario_email, idProfissao, usuario_senha) 
VALUES ('$usuario_nome','$usuario_email' ,'$idProfissao','$usuario_senha')";

mysqli_query($conn, $queryInsercao);
$_SESSION['cd_usuario'] = mysqli_insert_id($conn);

if(empty($_SESSION['cd_usuario'])) {
    //erro no cadastro
    echo '<meta http-equiv="refresh" content="0;url=../painel-adm/logoff.php">';
}

$_SESSION['usuario_nome'] = $usuario_nome;
$_SESSION['usuario_email'] = $usuario_email;
$_SESSION['usuario_tipo'] = '1';

//inserir as validações:
/**
 * Não ter e-mail repetido
 * Confirmar que cadastro foi efetuado
 * Confirmar que sessão foi aberta corretamente
 * Verificar também se tem alguma profissão escolhida
 *          ou se a profissão será no momento da criação do site apenas
 * No momento, estamos trabalhando apenas com a profissão de montador de móveis
 * Verificar também se pegaremos os dados como CPF para poder formalizar o cadastro, no momento o cadastro esta funcionando normalmente
 */

echo '<meta http-equiv="refresh" content="0;url=../painel-adm">';
?>