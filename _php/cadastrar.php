<?php
    $resposta = array();
    if(!isset($_SESSION)) { session_start(); }

    $_SESSION['cd_usuario'] = 0;

    include_once("conexao.php");

    $usuario_nome = $_POST['nome'];
    $usuario_email = $_POST['login'];
	$usuario_senha = $_POST['senha'];

    if($usuario_nome == '' || $usuario_email == '' || (strlen($usuario_senha) < 6)) {
        $resposta = array(
            'resposta' => 'erro',
            'mensagem' => 'Informe todos os campos corretamente.'
        );
    } else {
        $cd_usuario = 0;
        $sql = mysqli_query($conn, "SELECT cd_usuario FROM usuarios WHERE usuario_email = '" . $usuario_email . "'") or die();
        while($row = mysqli_fetch_assoc($sql)){
            $cd_usuario = $row['cd_usuario'];
        }

        if($cd_usuario > 0) {
            $resposta = array(
                'resposta' => 'erro',
                'mensagem' => 'E-mail já cadastrado.'
            );
        } else {
            $usuario_senha = hash('whirlpool', $usuario_senha);
            $queryInsercao = "INSERT INTO usuarios (usuario_nome, usuario_email, usuario_senha) VALUES ('$usuario_nome', '$usuario_email', '$usuario_senha')";
            mysqli_query($conn, $queryInsercao);
            $_SESSION['cd_usuario'] = mysqli_insert_id($conn);
            $_SESSION['usuario_nome'] = $usuario_nome;
            $_SESSION['usuario_email'] = $usuario_email;
            $resposta = array(
                'resposta' => 'sucesso'
            );

        }
    }
    echo json_encode($resposta);
?>