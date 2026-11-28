
<?php
require_once("../model/clsCadastro.php");

if (isset($_POST['btnEnviar'])) {

    $cadastro = new clsCadastro();

    $cadastro->setNome($_POST['txtNome']);
    $cadastro->setcidade($_POST['txtCidade']);
    $cadastro->setendereco($_POST['txtEndereco']);
    $cadastro->setemail($_POST['txtEmail']);
    $cadastro->settelefone($_POST['txtTelefone']);
    $cadastro->setFoto($_FILES['txtFoto']);

    if ($cadastro->salvar()) {
        echo "Cadastro realizado com sucesso!";
        echo "<br><a href='frmListaCadastro.php'>Ver cadastros</a>";
    } else {
        echo "Erro ao realizar cadastro!";
    }
}
?>
