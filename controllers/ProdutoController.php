<?php
require_once "models/produto.php";

$acao = $_GET['acao'] ?? 'listar_pro';

// Proteção: Somente logados acessam produtos
if (!isset($_SESSION['adm'])) {
    header("Location: index.php");
    exit;
}

if ($acao == 'listar_pro') {
    $produtos = listarProdutos();
    include "views/listar_produtos.php";
}

if ($acao == 'criar_pro') {
    if ($_POST) {
        $nome = $_POST['nome'];
        $desc = $_POST['descricao'];
        $forn = $_POST['fornecedor'];
        $qtd  = $_POST['quantidade'];
        $fab  = $_POST['fabricante'];
        $preco = $_POST['preco'];
        $margem = $_POST['margem'];
        $status = $_POST['status_pro'];
        $imagem = "";

        if ($_FILES['imagem']['name']) {
            $imagem = "img/produtos/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        inserirProduto($nome, $desc, $forn, $qtd, $fab, $preco, $margem, $status, $imagem);
        header("Location: index.php?acao=listar_pro");
    }
    include "views/criar_produto.php";
}

if ($acao == 'editar_pro') {
    $id = $_GET['id'];

    if ($_POST) {
        $nome = $_POST['nome'];
        $desc = $_POST['descricao'];
        $forn = $_POST['fornecedor'];
        $qtd  = $_POST['quantidade'];
        $fab  = $_POST['fabricante'];
        $preco = $_POST['preco'];
        $margem = $_POST['margem'];
        $status = $_POST['status_pro'];
        $imagem = $_POST['imagem_atual'];

        if ($_FILES['imagem']['name']) {
            $imagem = "img/produtos/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        atualizarProduto($id, $nome, $desc, $forn, $qtd, $fab, $preco, $margem, $status, $imagem);

        header("Location: index.php?acao=listar_pro");
    }

    $produto = buscarProduto($id);
    include "views/editar_produto.php";
}

if ($acao == 'excluir_pro') {
    excluirProduto($_GET['id']);
    header("Location: index.php?acao=listar_pro");
}
?>