<?php
require_once "app/config/conexao.php";

function listarUsuarios() {

    $con = conectar();
    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query($con, $sql);

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}


function inserirUsuario($nome, $email, $imagem, $login, $senha, $papel) {
    $con = conectar();
    $sql = "INSERT INTO usuario (nome, email, imagem, login, senha, papel) 
            VALUES ('$nome', '$email', '$imagem', '$login', '$senha', '$papel')";
    mysqli_query($con, $sql);
}

function buscarUsuario($id) {

    $con = conectar();
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($id, $nome, $email, $imagem, $login, $senha, $papel) {
    $con = conectar();
    $sql = "UPDATE usuario 
            SET nome='$nome', email='$email', imagem='$imagem', login='$login', senha='$senha', papel='$papel' 
            WHERE id=$id";
    mysqli_query($con, $sql);
}

function excluirUsuario($id) {
    $con = conectar();
    $sql = "DELETE FROM usuario WHERE id=$id";
    mysqli_query($con, $sql);
}

function login_adm($login, $senha){

    $con = conectar();

    $sql = "SELECT * FROM usuario 
    WHERE login='$login' AND senha='$senha'";

    $resultado = mysqli_query($con, $sql);

    return mysqli_fetch_assoc($resultado);
}