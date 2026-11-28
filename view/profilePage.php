<?php
    session_start();
    require_once("../model/clsUsuario.php");

    if (!isset($_SESSION['id'])) {
        header("Location: loginPage.php");
        exit;
    }

    $usuario = (new clsUsuario())->buscarPorId($_SESSION['id']);

    if (!$usuario) {
        header("Location: initialPage.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/profilePage.css"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="cointainer">
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
                            <a href="#">
                                Entrar
                            </a>
                        </li>

                        <li>
                            <a href="frmNovoCadastro.php">
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
                </ul>
            </nav>
        </div>

        <!-- INFORMAÇÕES DO USUÁRIO -->
        <div id="profile">
            <h2>Meu perfil</h2>

            <div id="informations">
                <img
                    src="<?= htmlspecialchars('img/' . $usuario['foto_cadastro'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="Foto de perfil"
                    class="foto-perfil"
                />

                <div class="list-info">
                    <!-- NOME -->
                    <p>
                        <span class="rotulo"><i class="fa-solid fa-user"></i>Nome: </span>
                        <?= htmlspecialchars($usuario['nome_cadastro']) ?>
                    </p>

                    <!-- E-MAIL -->
                    <p>
                        <span class="rotulo"><i class="fa-solid fa-envelope"></i>E-mail: </span>
                        <?= htmlspecialchars($usuario['email_cadastro']) ?>
                    </p>

                    <!-- CIDADE -->
                    <p>
                        <span class="rotulo"><i class="fa-solid fa-city"></i>Cidade: </span>
                        <?= htmlspecialchars($usuario['cidade_cadastro']) ?>
                    </p>

                    <!-- ENDERECO -->
                    <p>
                        <span class="rotulo"><i class="fa-solid fa-location-dot"></i>Endereço: </span>
                        <?= htmlspecialchars($usuario['endereco_cadastro']) ?>
                    </p>

                    <!-- TELEFONE -->
                    <p>
                        <span class="rotulo"><i class="fa-solid fa-phone"></i>Telefone: </span>
                        <?= htmlspecialchars($usuario['telefone_cadastro']) ?>
                    </p>
                </div>
            </div>

            <!-- BOTOES -->
            <div class="buttons">
                <!-- BOTAO PARA EDITAR PERFIL -->
                <a href="editarPerfil.php" class=" btn-perfil btn-editar">
                    <i class="bi bi-pencil-square"></i>
                    Editar perfil
                </a>
                
                <!-- BOTAO PARA EXCLUIR CONTA -->
                <form 
                    action="../model/excluirPerfil.php" 
                    method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');"
                >
                    <button type="submit" class="btn-perfil btn-excluir">
                        <i class="bi bi-trash"></i>
                        Excluir perfil
                    </button>
                </form>
            </div>
        </div>

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
</body>
</html>