<?php
require_once "app/config/conexao.php";

function listarProdutos() {
    $con = conectar();
    $sql = "SELECT *, (preco + (preco * margem / 100)) AS valor_venda FROM produto";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function inserirProduto($nome, $desc, $forn, $qtd, $fab, $preco, $margem, $status, $imagem) {
    $con = conectar();
    $sql = "INSERT INTO produto 
    (nome, descricao, fornecedor, quantidade, fabricante, preco, margem, status_pro, imagem, data_cadastro) 
        VALUES ('$nome', '$desc', '$forn', '$qtd', '$fab', '$preco', '$margem', '$status', '$imagem', NOW())";
    mysqli_query($con, $sql);
}

function buscarProduto($id) {
    $con = conectar();
    $sql = "SELECT * FROM produto WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resultado);
}

function atualizarProduto($id, $nome, $desc, $forn, $qtd, $fab, $preco, $margem, $status, $imagem) {
    $con = conectar();
    $sql = "UPDATE produto SET 
            nome='$nome',
            descricao='$desc',
            fornecedor='$forn',
            quantidade='$qtd',
            fabricante='$fab',
            preco='$preco',
            margem='$margem',
            status_pro='$status',
            imagem='$imagem'
            WHERE id=$id";
    mysqli_query($con, $sql);
}

function excluirProduto($id) {
    $con = conectar();
    $sql = "DELETE FROM produto WHERE id=$id";
    mysqli_query($con, $sql);
}
?>