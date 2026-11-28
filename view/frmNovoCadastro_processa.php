<?php
require_once("../model/clsCadastro.php");

if (isset($_POST['btnEnviar'])) {
    $cadastro = new clsCadastro();

    $cadastro->setNome($_POST['txtNome']);
    $cadastro->setSenha($_POST['txtSenha']);
    $cadastro->setCidade($_POST['txtCidade']);
    $cadastro->setEndereco($_POST['txtEndereco']);
    $cadastro->setEmail($_POST['txtEmail']);
    $cadastro->setTelefone($_POST['txtTelefone']);
    $cadastro->setFoto($_FILES['txtFoto']);

    if ($cadastro->salvar()) {
        echo "Cadastro realizado com sucesso!";
        echo "<br><a href='frmListaCadastro.php'>Ver cadastros</a>";
    } else {
        echo "Erro ao realizar cadastro!";
    }
}
?>
