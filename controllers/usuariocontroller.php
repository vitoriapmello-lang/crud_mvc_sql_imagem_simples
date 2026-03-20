<?php
require_once "models/usuario.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

// PROTEÇÃO GLOBAL - copiar em todas as páginas protegidas
if (!isset($_SESSION['adm']) && $acao != 'login') {
    include "views/login.php";
    exit;
}

if ($acao == 'listar') {
    $usuario = listarUsuarios();
    include "views/listar.php";
}

if ($acao == 'criar') {

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $imagem = "";
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $papel = $_POST['papel'];

        if ($_FILES['imagem']['name']) {

            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        inserirUsuario($nome, $email, $imagem, $login, $senha, $papel);

        header("Location: index.php");
    }

    include "views/criar.php";
}

if ($acao == 'editar') {
    $id = $_GET['id'];
    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $papel = $_POST['papel'];
        $imagem = $_POST['imagem_atual'];

        if ($_FILES['imagem']['name']) {
            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        // Chamada atualizada com todos os parâmetros
        atualizarUsuario($id, $nome, $email, $imagem, $login, $senha, $papel);
        header("Location: index.php");
    }
    $usuario = buscarUsuario($id);
    include "views/editar.php";
}
if ($acao == 'excluir') {

    excluirUsuario($_GET['id']);
    header("Location: index.php");
}

if ($acao == 'login') {

    $acao = $_GET['acao'] ?? '';

    if ($acao == 'login') {
        $login = $_POST['login'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $usuario = login_adm($login, $senha);

        if ($usuario) {
            // Salva o caminho da imagem na sessão (como você já fazia)
            $_SESSION['adm'] = $usuario['imagem'];
            
            // ADICIONE ESTA LINHA ABAIXO:
            // Salva o nome que vem do banco de dados na sessão
            $_SESSION['nome_adm'] = $usuario['nome']; 
            
            header("Location: index.php");
            exit;
        } else {
            $erro = "Login ou senha inválidos!";
        }
    }
}

if ($acao == 'logout') {
    $acao = $_GET['acao'] ?? '';
    if ($acao == 'logout') {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}