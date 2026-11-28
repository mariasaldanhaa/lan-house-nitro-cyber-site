<?php
    require_once('../model/clsProduct.php');
    require_once('../controller/clsArquivo.php');

    // confere se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: frmNovoProduto.php');
        exit;
    }

    // todos os campos foram enviados
    if (
        empty($_POST['nome']) ||
        empty($_POST['descricao']) ||
        !isset($_POST['preco']) ||
        empty($_POST['categoria']) ||
        !isset($_POST['estoque']) ||
        !isset($_FILES['imagem'])
    ) {
        exit('Preencha todos os campos obrigatórios.');
    }

    // trim - remove os espacos
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = (float) $_POST['preco'];
    $categoria = $_POST['categoria'];
    $estoque = (int) $_POST['estoque'];
    $precoPromocional = $_POST['preco_promocional'] ?? '';

    // validando os preços
    if ($preco <= 0 || $estoque < 0) {
        exit('Informe um preço válido e um estoque igual ou maior que zero.');
    }

    if ($precoPromocional !== '') {
        $precoPromocional = (float) $precoPromocional;

        if ($precoPromocional <= 0 || $precoPromocional >= $preco) {
            exit('O preço promocional deve ser maior que zero e menor que o preço original.');
        }
    } else {
        $precoPromocional = null;
    }

    // confere se a imagem foi enviada corretamente
    if ($_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
        exit('Ocorreu um erro ao enviar a imagem.');
    }

    $informacoesImagem = getimagesize($_FILES['imagem']['tmp_name']);

    if ($informacoesImagem === false) {
        exit('O arquivo enviado não é uma imagem válida.');
    }

    // define o nome e o caminho da imagem
    $extensoesPermitidas = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    $tipoImagem = $informacoesImagem['mime'];

    if (!isset($extensoesPermitidas[$tipoImagem])) {
        exit('Envie uma imagem JPG, PNG ou WEBP.');
    }

    $extensao = $extensoesPermitidas[$tipoImagem];
    $nomeArquivo = uniqid('produto_', true) . '.' . $extensao;

    $diretorioImagem = __DIR__ . '/img';
    $caminhoImagem = 'img/' . $nomeArquivo;

    // salva o arquivo da imagem
    $arquivo = new clsArquivo();
    $arquivo->setArquivo($_FILES['imagem']);
    $arquivo->setDiretorio($diretorioImagem);
    $arquivo->setNomeArquivo($nomeArquivo);

    if (!is_dir($diretorioImagem)) {
        exit('A pasta de imagens não foi encontrada.');
    }

    $arquivo->upload();

    // confere se o arquivo foi salvo
    if (!file_exists($diretorioImagem . '/' . $nomeArquivo)) {
        exit('Não foi possível salvar a imagem.');
    }

    // prepara o produto
    $produto = new clsProduct();

    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setPreco($preco);
    $produto->setPrecoPromocional($precoPromocional);
    $produto->setCategoria($categoria);
    $produto->setEstoque($estoque);

    // salva o produto e o caminho da imagem no banco
    if ($produto->salvar($caminhoImagem)) {
        header('Location: frmNovoProduto.php?cadastro=sucesso');
        exit;
    }

    // se o cadastro falhar, remove a imagem que já foi enviada
    $arquivo->excluir();

    exit('Não foi possível cadastrar o produto. Tente novamente.');
?>