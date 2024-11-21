<form method="POST">
    <input type="number" name="id_cliente" placeholder="ID do Cliente" required>
    <textarea name="descricao" placeholder="Descrição da Solicitação" required></textarea>
    <select name="urgencia">
        <option value="baixa">Baixa</option>
        <option value="média">Média</option>
        <option value="alta">Alta</option>
    </select>
    <button type="submit">Criar Solicitação</button>
</form>
