<link rel="stylesheet" href="style.css">
<?php
session_start();
include "app/config/conexao.php";
include "models/usuario.php";
include "models/produto.php";
include "controllers/UsuarioController.php";
include "controllers/ProdutoController.php"; 

if (isset($_SESSION['adm'])) {
    ?>
    <nav>
        <img src="<?php echo $_SESSION['adm']; ?>" width="30" style="border-radius: 50%;">
        Olá, <?php echo $_SESSION['nome_adm']; ?> | 
        <a href="index.php?acao=listar" style="color:white">Usuários</a> | 
        <a href="index.php?acao=listar_pro" style="color:white">Produtos</a> | 
        <a href="index.php?acao=logout" style="color:red">Sair</a>
    </nav>
    <?php
}
?>