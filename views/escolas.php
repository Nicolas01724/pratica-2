<select>
    <?php foreach($escolas as $escola): ?>
    <option value="<?= $escola["id"] ?>"> <?= $escola["nome"] ?> </option>
    <?php endforeach; ?>
</select>