<style>
table {
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 5px;
}
</style>
    <h2> 𝐋𝐢𝐬𝐭𝐚𝐫 𝐔𝐬𝐮𝐚́𝐫𝐢𝐨𝐬 </h2>
<a href="index.php?acao=criar">𝐂𝐚𝐝𝐚𝐬𝐭𝐫𝐚𝐫 𝐍𝐨𝐯𝐨 𝐔𝐬𝐮𝐚́𝐫𝐢𝐨</a><br><br>
<table border="01">

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>email</th>
        <th>imagem</th>
        <th>ações</th
    </tr>
    <?php foreach ($usuario as $u) { ?>
    <tr>
        <td><?php echo $u['id']; ?></td>
        <td><?php echo $u['nome']; ?></td>
        <td><?php echo $u['email']; ?></td>
        <td>
            <?php if ($u['imagem']) { ?>
                <img src="<?php echo $u['imagem']; ?>" width="80">
            <?php } ?>
        </td>
        <td>
            <a href="index.php?acao=editar&id=<?php echo $u['id']; ?>">editar</a>
            <a href="index.php?acao=excluir&id=<?php echo $u['id']; ?>">excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>
    
