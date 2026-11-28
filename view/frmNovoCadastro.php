
<html>
    <head>
        <title>Novo Cadastro</title>
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
                                <h2>NOVO CADASTRO</h2>

                                <form action="frmNovoCadastro_processa.php"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    Nome:<br>
                                    <input type="text" name="txtNome" required>
                                    <br><br>

                                    Cidade:<br>
                                    <input type="text" name="txtCidade" required>
                                    <br><br>

                                    Endereço:<br>
                                    <input type="text" name="txtEndereco" required>
                                    <br><br>

                                    E-mail:<br>
                                    <input type="email" name="txtEmail" required>
                                    <br><br>

                                    Telefone:<br>
                                    <input type="text" name="txtTelefone" required>
                                    <br><br>

                                    Foto:<br>
                                    <input type="file" name="txtFoto" accept="image/*" required>
                                    <br><br>

                                    <input type="submit" name="btnEnviar" value="Cadastrar">

                                </form>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
