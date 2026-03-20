<h2> Cadastrar Produto </h2>
<form method="post" enctype="multipart/form-data">
    Nome: <input type="text" name="nome" required><br><br>
    Descrição: <textarea name="descricao"></textarea><br><br>
    Fornecedor: <input type="text" name="fornecedor"><br><br>
    Fabricante: <input type="text" name="fabricante"><br><br>
    Quantidade: <input type="number" name="quantidade"><br><br>
    Preço Custo: <input type="number" step="0.01" name="preco" required><br><br>
    Margem de Lucro (%): <input type="number" step="0.01" name="margem" required><br><br>
    
    Status: 
    <select name="status_pro">
        <option value="Ativo">Ativo</option>
        <option value="Inativo">Inativo</option>
    </select><br><br>

    Imagem do Produto: <input type="file" name="imagem"><br><br>
    <button type="submit">Salvar Produto</button>
</form>