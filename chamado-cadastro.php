<form method="POST">
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao">
    <label for="criticidade">Criticidade:</label>
    <SELECT name="criticidade">
        <option value="baixa">baixa</option>
        <option value="media">média</option>
        <option value="alta">alta</option>
    </SELECT>
    <label for="andamento">Andamento:</label>
    <SELECT name="andamento">
        <option value="1">Aberto</option>
        <option value="2">Em andamento</option>
        <option value="3">Resolvido</option>
    </SELECT>
    <label for="colaborador">Responsável:</label>
    <SELECT name="colaborador">
        <?php 
        
        $data = $conn->mostrar_colaboradores();

        print_r($data);

        foreach($data as $user) { ?>
        <option value="<= id ?>"><= $nome ?></option>
        <?php } ?>
    </SELECT>
    <label for="oque">O que você deseja cadastrar?</label>
    
    <button type="submit" id="confirm">Cadastrar</button>
</form>