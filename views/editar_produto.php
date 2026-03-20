<h2> Editar Produto </h2>

<form method="post" enctype="multipart/form-data">

    Nome:
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>

    Descrição:
    <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br><br>

    Fornecedor:
    <input type="text" name="fornecedor" value="<?php echo $produto['fornecedor']; ?>"><br><br>

    Fabricante:
    <input type="text" name="fabricante" value="<?php echo $produto['fabricante']; ?>"><br><br>

    Quantidade:
    <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>"><br><br>

    Preço:
    <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required><br><br>

    Margem:
    <input type="number" step="0.01" name="margem" value="<?php echo $produto['margem']; ?>" required><br><br>

    Status:
    <select name="status_pro">
        <option value="Ativo" <?php if($produto['status_pro']=="Ativo") echo "selected"; ?>>Ativo</option>
        <option value="Inativo" <?php if($produto['status_pro']=="Inativo") echo "selected"; ?>>Inativo</option>
    </select><br><br>

    <?php if ($produto['imagem']) { ?>
        <img src="<?php echo $produto['imagem']; ?>" width="100"><br><br>
    <?php } ?>

    Nova imagem:
    <input type="file" name="imagem"><br><br>

    <input type="hidden" name="imagem_atual" value="<?php echo $produto['imagem']; ?>">

    <button type="submit">Atualizar Produto</button>
</form>