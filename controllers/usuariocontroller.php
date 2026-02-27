<?php
require_once "models/Usuario.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

if ($acao == 'listar') {

    $usuario = listarUsuarios();
    include "views/listar.php";
} 

if ($acao == 'criar') {

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $imagem = "";     

        if ($_FILES['imagem']['name']) {
            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }
        inserirUsuario($nome, $email, $imagem);
        header("Location: index.php");
    } 
    include "views/criar.php";
}

if ($acao == 'editar') {

    $id = $_GET['id'];

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $imagem = $_POST['imagem_atual'];     

        if ($_FILES['imagem']['name']) {
            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }
        atualizarUsuario($id, $nome, $email, $imagem);
        header("Location: index.php");
    }
    $usuario = buscarUsuario($id);
    include "views/editar.php";
}

if ($acao == 'deletar') {

    excluirUsuario($id);
    header("Location: index.php");
}
