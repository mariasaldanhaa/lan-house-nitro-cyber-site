<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuários</title>
    <link rel="stylesheet" href="../css/registerPage.css"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
</head>
    <body>
        <div class="container">
            <!-- HEADER -->
            <header>
                <div id="header">
                    <nav>
                        <a href="../view/initialPage.php">
                            <img
                                src="../images/favicon.svg"
                                alt="Logo Lan House Nitro Cyber"
                                title="Clique para voltar no início"
                            />
                        </a>

                        <ul class="nav-user">
                            <?php if (isset($_SESSION['id'])) { ?>
                                <li>
                                    <a href="profilePage.php">
                                        <?php
                                            echo htmlspecialchars($_SESSION['nome']);
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="../model/clsLogout.php">
                                        Sair
                                    </a>
                                </li>
                            <?php } else { ?>
                            <li>
                                <a href="loginPage.php">
                                    Entrar
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Cadastro
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </header>
            
            <!-- NAVBAR -->
            <div id="navbar">
                <nav>
                    <ul class="nav-links">
                        <li>
                            <a href="initialPage.php">
                                Início
                            </a>
                        </li>

                        <li>
                            <a href="initialPage.php#products">
                                Produtos
                            </a>
                        </li>

                        <li>
                            <a href="initialPage.php#promotions">
                                Promoções
                            </a>
                        </li>

                        <li>
                            <a href="initialPage.php#footer">
                                Contato
                            </a>
                        </li>
                        
                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'administrador') { ?>
                            <li>
                                <a href="frmListaCadastro.php">
                                    Lista de usuários
                                </a>
                            </li>

                            <li>
                                <a href="frmListaFuncionario.php">
                                    Lista de funcionários
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </nav>
            </div>

            <!-- TABELA DE CADASTRO -->
            <table class="cadastro-card">
                <tr class="cadastro-cabecalho">
                    <td colspan="2">
                        <h1 class="cadastro-titulo">Crie sua conta!</h1>
                    </td>
                </tr>

                <tr class="cadastro-intro">
                    <td class="cadastro-subtitulo" colspan="2">
                        Seja bem vindo(a)!
                    </td>
                </tr>

                <tr class="cadastro-conteudo">
                    <td colspan="2">
                        <table class="cadastro-layout">
                            <tr>
                                <td class="cadastro-formulario">
                                    <h2>NOVO CADASTRO</h2>

                                    <form  
                                        class="form-cadastro"
                                        action="frmNovoCadastro_processa.php"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="campos-cadastro">
                                            <div class="campo-cadastro">
                                                <label for="txtNome">Nome:</label>
                                                <input type="text" name="txtNome" required>
                                            </div>

                                            <div class="campo-cadastro">
                                                <label for="txtSenha">Senha:</label>
                                                <input type="password" name="txtSenha" minlength="6" required>
                                            </div>

                                            <div class="campo-cadastro">
                                                <label for="txtCidade">Cidade:</label>
                                                <input type="text" name="txtCidade" required>
                                            </div>

                                            <div class="campo-cadastro">
                                                <label for="txtEndereco">Endereço:</label>
                                                <input type="text" name="txtEndereco" required>
                                            </div>

                                            <div class="campo-cadastro">
                                                <label for="txtEmail">E-mail:</label>
                                                <input type="email" name="txtEmail" required>
                                            </div>

                                            <div class="campo-cadastro">
                                                <label for="txtTelefone">Telefone:</label>
                                                <input type="text" name="txtTelefone" required>
                                            </div>
                                            
                                            <div class="campo-cadastro">
                                                <label for="txtFoto">Foto:</label>
                                                <input type="file" id="txtCaminhoImagem" name="txtFoto" accept="image/*" required>
                                            </div>

                                            <div>
                                                <img 
                                                    id="previsaoImagem"
                                                />
                                            </div>

                                            <button type="button" id="btnUpload">APLICAR RECORTE</button>

                                            <input type="submit" name="btnEnviar" value="Cadastrar">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <?php
                            if (isset($_SESSION['mensagemCadastro'])) {
                                echo "<p>" . $_SESSION['mensagemCadastro'] . "</p>";

                                unset($_SESSION['mensagemCadastro']);
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <!-- FOOTER -->
            <footer>
                <div id="footer">
                    <div class="footer-col">
                        <img
                            src="../images/logo_lan_house.png"
                            alt="Logo da Lan House Nitro Cyber"
                        />
                        <p class="footer-slogan">Tecnologia e diversão em um só lugar!</p>

                        <h3>Contato</h3>
                        <a href="https://wa.me/5535992160020" target="_blank" class="footer-link">
                            <i class="fa-solid fa-phone"></i> (35) 99216-0020
                        </a>
                        <a href="mailto:atendimentonitrocb2@gmail.com" class="footer-link">
                            <i class="fa-solid fa-envelope"></i> atendimentonitrocb2@gmail.com
                        </a>
                    </div>

                    <div class="footer-col">
                        <h3>Formas de pagamento</h3>
                        <ul class="payment">
                            <li><i class="fa-brands fa-pix"></i> Pix</li>
                            <li><i class="fa-solid fa-credit-card"></i> Cartão</li>
                            <li><i class="fa-solid fa-money-bill-wave"></i> Dinheiro</li>
                        </ul>

                        <h3>Nos siga no Instagram!</h3>
                        <a href="https://instagram.com/lanhousecybercb" target="_blank" class="footer-link">
                            <i class="fa-brands fa-instagram"></i> @lanhousecybercb
                        </a>
                    </div>

                    <div class="footer-col">
                        <h3>Onde estamos</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.446689605749!2d-45.2751498!3d-20.8943409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b53e4c6d5de3db%3A0x3ef8f937fea446a7!2sLan%20House%20Nitro%20Cyber%20Internet%20%26%20Games!5e0!3m2!1sen!2sbr!4v1795323982798!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>

                </div>

                <div id="footer-bottom">
                &copy; Lan House Nitro Cyber. Todos os direitos reservados.
                </div>
            </footer>
        </div>
        
        <!-- RECORTAR FOTO -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        <script src="../js/cropper.js"></script>
    </body>
</html>
