<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../css/loginPage.css"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                        <li>
                            <a href="#">
                                Entrar
                            </a>
                        </li>

                        <li>
                            <a href="registerPage.php">
                                Cadastro
                            </a>
                        </li>
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

        <!-- TELA DE LOGIN -->
        <div id="login">
            <h2>ENTRAR</h2>
            
            <form action="../model/clsLogin.php" method="post">
                <!-- CAMPOS DE LOGIN -->
                <div id="campos">
                    <!-- EMAIL -->
                    <div>
                        <label for="login-email" id="email">
                            <i class="fa-solid fa-envelope"></i>
                            <span>E-mail:</span>
                        </label>

                        <input
                            type="email"
                            placeholder="Digite seu e-email"
                            id="login-email"
                            name="txtEmail"
                            required
                        />
                    </div>

                    <!-- SENHA -->
                    <div>
                        <label for="login-password" id="password">
                            <i class="fa-solid fa-lock"></i>
                            <span>Senha:</span>
                        </label>

                        <input
                            type="password"
                            placeholder="Digite sua senha"
                            id="login-password"
                            name="txtPassword"
                            required
                        />
                    </div>
                </div>

                <button type="submit" id="btnAcess">Acessar</button>
            </form>
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
                    <a href="tel:+5535988160020" class="footer-link">
                        <i class="fa-solid fa-phone"></i> (35) 98816-0020
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
                    <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>

            </div>

            <div id="footer-bottom">
               &copy; Lan House Nitro Cyber. Todos os direitos reservados.
            </div>
        </footer>
    </div>
</body>
</html>