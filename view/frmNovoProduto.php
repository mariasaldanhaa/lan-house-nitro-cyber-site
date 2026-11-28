<?php
    session_start();

    if (!isset($_SESSION['tipo']) || !in_array($_SESSION['tipo'], ['administrador', 'funcionario'])) {
        header("Location: initialPage.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
    <link rel="stylesheet" href="../css/productPage.css"/>
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
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

    <div class="pagina-admin">
        <div class="container">
            <h1>Cadastrar Produto</h1>

            <!-- FORMULÁRIO -->
            <form
                action="frmNovoProduto_processa.php"
                method="POST"
                enctype="multipart/form-data"
            >   
                <!-- NOME DO PRODUTO -->
                <label for="nome">Nome do produto:</label>
                <input 
                    type="text"
                    id="nome"
                    name="nome"
                    required
                />

                <!-- DESCRICAO -->
                <label for="descricao">Descrição:</label>
                <textarea
                    id="descricao"
                    name="descricao"
                    required
                ></textarea>

                <!-- PRECO -->
                <label for="preco">Preço:</label>
                <input
                    type="number"
                    id="preco"
                    name="preco"
                    min="0"
                    step="0.01"
                    required
                />

                <!-- PREÇO PROMOCIONAL -->
                <label for="preco_promocional">Preço promocional (opcional):</label>
                <input
                    type="number"
                    id="preco_promocional"
                    name="preco_promocional"
                    min="0"
                    step="0.01"
                />
                <!-- CATEGORIA -->
                <label for="categoria">Categoria:</label>
                <select 
                    name="categoria" 
                    id="categoria" 
                    required
                >
                    <option value="" selected>Selecione uma categoria</option>
                    <option value="Periféricos">Periféricos</option>
                    <option value="Áudio">Áudio</option>
                    <option value="Controles e games">Controles e games</option>
                    <option value="Celular">Celular</option>
                    <option value="Cabos e adaptadores">Cabos e adaptadores</option>
                    <option value="Energia">Energia</option>
                    <option value="Armazenamento">Armazenamento</option>
                    <option value="Informática">Informática</option>
                    <option value="Outros">Outros</option>
                </select>

                <!-- ESTOQUE -->
                <label for="estoque">Estoque:</label>
                <input
                    type="number"
                    id="estoque"
                    name="estoque"
                    min="0"
                    required
                >

                <!-- IMAGEM -->
                <label for="imagem">Imagem do produto:</label>
                <input
                    type="file"
                    id="imagem"
                    name="imagem"
                    accept="image/*"
                    required
                >

                <button type="submit">Cadastrar produto</button>
            </form>
        </div>
    </div>
</body>
</html>