<?php
    session_start();
    require_once('clsUsuario.php');
    $usuario = (new clsUsuario())->buscarPorEmail($_POST['txtEmail']);

    if ($usuario && password_verify($_POST['txtPassword'], $usuario['senha_cadastro'])) {
        $_SESSION['id'] = $usuario['id_cadastro'];
        $_SESSION['tipo'] = $usuario['tipo'];
        $_SESSION['nome'] = explode(" ", trim($usuario['nome_cadastro']))[0];
        header("Location: ../view/initialPage.php");
    } else {
        header("Location: ../view/loginPage.php?erro=1");
    }
    exit;
?>