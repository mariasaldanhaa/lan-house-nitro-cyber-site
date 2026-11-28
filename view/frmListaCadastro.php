<?php
    require_once("../model/clsCadastro.php");
    require_once("../controller/clsControlesHTML.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/listPage.css"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
    <body>
        <table class="pagina-cadastro">
            <tr>
                <td colspan="2">
                    <h1>Gerenciamento de usuários</h1>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <p class="subtitulo">Consulte e gerencie os usuários cadastrados no sistema.</p>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table class="tabela-conteudo">
                        <tr>
                            <td class="menu-cadastros">
                                <b>CADASTRO</b><br>
                                <a href="frmListaCadastro.php">
                                    Lista de Cadastros
                                </a>
                                <br>
                                <a href="frmNovoCadastro.php">
                                    Novo Cadastro
                                </a>
                            </td>

                            <td>
                                <h2>LISTA DE CADASTROS</h2>

                                <?php
                                    $cadastro = new clsCadastro();
                                    $tabela = $cadastro->pegaCadastros();

                                    $controles = new clsControlesHTML();

                                    echo $controles->geraGridCadastro($tabela);
                                ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
