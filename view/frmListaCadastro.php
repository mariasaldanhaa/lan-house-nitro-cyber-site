
<?php
require_once("../model/clsCadastro.php");
require_once("../controller/clsControlesHTML.php");
?>

<html>
    <head>
        <title>Lista de Cadastros</title>
        <style>
            table {
                width:100%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            table#t01 tr:nth-child(even) {
                background-color: #eee;
            }
            table#t01 tr:nth-child(odd) {
                background-color:#fff;
            }
            table#t01 th {
                background-color: black;
                color: white;
            }
        </style>
    </head>

    <body>
        <table>
            <tr style="height:50px">
                <td colspan="2">
                    <h1>Cadastros</h1>
                </td>
            </tr>

            <tr style="height:50px">
                <td colspan="2">
                    Seja bem vindo(a)!
                </td>
            </tr>

            <tr style="height:400px">
                <td colspan="2">
                    <table style="height:400px;">
                        <tr>
                            <td style="width:150px; vertical-align:top;">
                                <b>>> CADASTRO</b><br>
                                <a href="frmListaCadastro.php">
                                    Lista de Cadastros
                                </a>
                                <br>
                                <a href="frmNovoCadastro.php">
                                    Novo Cadastro
                                </a>
                            </td>

                            <td style="vertical-align:top; text-align:left;">
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
