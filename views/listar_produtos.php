<h2> 𝐋𝐢𝐬𝐭𝐚𝐫 𝐏𝐫𝐨𝐝𝐮𝐭𝐨𝐬 </h2>
<a href="index.php?acao=criar_pro">𝐂𝐚𝐝𝐚𝐬𝐭𝐫𝐚𝐫 𝐍𝐨𝐯𝐨 𝐏𝐫𝐨𝐝𝐮𝐭𝐨</a><br><br>

<table border="1" style="width:100%; border-collapse: collapse;">
    <tr>
        <th>Imagem</th>
        <th>Status</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Quantidade</th>
        <th>Preço Custo</th>
        <th>Margem (%)</th>
        <th>Data Cadastro</th>
        <th>Valor Venda (Calculado)</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($produtos as $p) { ?>
    <tr>
        <td><img src="<?php echo $p['imagem']; ?>" width="50"></td>
        <td><?php echo $p['status_pro']; ?></td>
        <td><?php echo $p['nome']; ?></td>
        <td><?php echo $p['fabricante']; ?></td>
        <td><?php echo $p['quantidade']; ?></td>
        <td>R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
        <td><?php echo $p['margem']; ?>%</td>
        <td><?php echo date('d/m/Y H:i', strtotime($p['data_cadastro'])); ?></td>
        <td><strong>R$ <?php echo number_format($p['valor_venda'], 2, ',', '.'); ?></strong></td>
        <td>
            <a href="index.php?acao=editar_pro&id=<?php echo $p['id']; ?>">Editar</a> |
            <a href="index.php?acao=excluir_pro&id=<?php echo $p['id']; ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>