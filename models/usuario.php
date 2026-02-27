<?php
require_once "app/config/conexao.php";

function listarUsuarios() {
    $con = conectar();
    $sql = "SELECT * FROM usuario";
    $result = mysqli_query($con, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function inserirUsuario($nome, $email, $imagem) {
    $con = conectar();
    $sql = "INSERT INTO usuario (nome, email, imagem) 
    VALUES ('$nome', '$email', '$imagem')";

    mysqli_query($con, $sql);
}

function buscarUsuario($id) {
    $con = conectar();
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($con, $sql);

    return mysqli_fetch_assoc($result);
}

function atualizarUsuario($id, $nome, $email, $imagem) {
    $con = conectar();
    $sql = "UPDATE usuario SET nome='$nome', email='$email', imagem='$imagem' WHERE id=$id";
    mysqli_query($con, $sql);
}

function excluirUsuario($id) {
    $con = conectar();
    $sql = "DELETE FROM usuario WHERE id=$id";
    mysqli_query($con, $sql);
}