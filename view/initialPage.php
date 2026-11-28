<?php
    session_start();

    require_once('../controller/clsConexao.php');

    $conexao = new clsConexao();
    $mysqli = $conexao->getConexao();

    $sql = "SELECT
                p.id_produto,
                p.nome_produto,
                p.descricao_produto,
                p.preco_produto,
                p.preco_promocional_produto,
                p.categoria_produto,
                p.estoque_produto,
                i.caminho_imagem
            FROM tb_produto p
            LEFT JOIN imagem_produto i
                ON p.id_produto = i.id_produto
            ORDER BY p.id_produto DESC";

    $resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lan House Nitro Cyber</title>
    <link rel="stylesheet" href="../css/initialPage.css"/>
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
                    <a href="#">
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
                                    <?= htmlspecialchars($_SESSION['nome']) ?>
                                </a>
                            <li>
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
                        <a href="#">
                            Início
                        </a>
                    </li>

                    <li>
                        <a href="#products">
                            Produtos
                        </a>
                    </li>

                    <li>
                        <a href="#promotions">
                            Promoções
                        </a>
                    </li>

                    <li>
                        <a href="#footer">
                            Contato
                        </a>
                    </li>

                    <li>
                        |
                    </li>

                    <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'administrador') { ?>
                        <li>
                            <a href="frmListaCadastro.php">
                                Gerenciar usuários
                            </a>
                        </li>

                        <li>
                            <a href="frmListaProduto.php">
                                Gerenciar produtos
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </nav>
        </div>

        <!-- BANNER -->
        <section>
            <div id="banner">
                <img
                    src="../images/banner.png"
                />
            </div>
        </section>

        <!-- PRODUTOS -->
        <section>
            <div id="products">
                <h2>Produtos</h2>

                <!-- PRODUTOS -->
                <div class="list-products">
                    <?php if ($resultado && $resultado->num_rows > 0) { ?>

                        <?php while ($produto = $resultado->fetch_assoc()) { ?>
                            <div class="card-produto">

                                <div class="imagem-produto">
                                    <?php if (!empty($produto['caminho_imagem'])) { ?>
                                        <img
                                            src="<?= htmlspecialchars($produto['caminho_imagem']) ?>"
                                            alt="<?= htmlspecialchars($produto['nome_produto']) ?>"
                                        >
                                    <?php } else { ?>
                                        <div class="sem-imagem">Imagem indisponível</div>
                                    <?php } ?>
                                </div>

                                <div class="info-produto">
                                    <p class="categoria-produto">
                                        <?= htmlspecialchars($produto['categoria_produto']) ?>
                                    </p>

                                    <h3>
                                        <?= htmlspecialchars($produto['nome_produto']) ?>
                                    </h3>

                                    <p class="descricao-produto">
                                        <?= htmlspecialchars($produto['descricao_produto']) ?>
                                    </p>

                                    <div class="precos-produto">
                                        <?php if ($produto['preco_promocional_produto'] !== null) { ?>
                                            <span class="preco-original">
                                                R$ <?= number_format((float) $produto['preco_produto'], 2, ',', '.') ?>
                                            </span>

                                            <span class="preco-promocional">
                                                R$ <?= number_format((float) $produto['preco_promocional_produto'], 2, ',', '.') ?>
                                            </span>
                                        <?php } else { ?>
                                            <span class="preco-normal">
                                                R$ <?= number_format((float) $produto['preco_produto'], 2, ',', '.') ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <p class="nenhum-produto">Nenhum produto cadastrado no momento.</p>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- PROMOÇÕES -->
        <section>
            <div id="promotions">
                <h2>Promoções</h2>
            </div>
        </section>

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