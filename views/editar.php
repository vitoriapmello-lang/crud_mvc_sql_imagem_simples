<h2> editar usuario </h2>
<form method="post" enctype="multipart/form-data">
nome: 
 <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required><br><br>
email: 
 <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br><br>
 <?php if ($usuario['imagem']): ?>
    <img src="<?php echo $usuario['imagem']; ?>" width="100"><br><br>
<?php } ?>

nova imagem: 
 <input type="file" name="imagem"><br><br>

 <input type="hidden" name="imagem_atual" value="<?php echo $usuario['imagem']; ?>">

<button type="submit">atualizar</button>
</form>
