<div>
  <form method="POST" action="/admin">
    <Select name="metodo_um">
      <option value="genero">genero</option>
      <option value="escola">escola</option>
    </Select>
    <Select>
      <option value="nah">Nenhum</option>
    </Select>


    <button type="submit">Enviar dados</button>
  </form>

  <button hx-get="/gerar-grafico.php" hx-trigger="click" hx-target="#aoba" hx-swap="innerHTML">Criar grafico</button>
</div>

<div id="aoba"></div>