<div class="centralizar_barra">
    <div class="container_barra">
        <div class="progresso" max="3000" value="100">
            <div class="barra"></div>
        </div>
    </div>
    <div id="borda_imagem">
        <div>
            <div class="container_texto">
                <div class="caixa_texto">
                    <div class="centraliza_texto"> 
                        <div id="container_pergunta">
                        <p id="pergunta"><?= $pergunta['texto_pergunta'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="caixa_triangulo">
                <div class="triangulo"></div>
            </div>
            <div id="container">
                <div id="container_foca">
                    <img id="foca" src="/public/images/foca.png">
                </div>
                <div class="container_imagem">
                    <img class="imagem" src="">
                </div>
            </div>
        </div>
    </div>
    <div class="respostas">
        <?php foreach ($respostas as $pergunta): ?>
            <button class="botao <?php if ($pergunta["tipo"] === 'errado') { echo 'botao_incorreto'; } elseif ($pergunta["tipo"] === 'correto') { echo 'botao_correto'; } ?>">
                <div class="centralizar_elemento">
                    <div class="circulo">
                        <p class="alternativa"> <?= $pergunta["letra"] ?> </p>
                    </div>
                    <div class="resposta">
                        <p><?= $pergunta["texto_alternativa"] ?></p>
                    </div>
                </div>
            </button>
        <?php endforeach ?>
    </div>
</div>

<script>
    pararTempo()
</script>

<div hx-get="/quiz/botao_proximo?questas=<?= substr(implode(",",$questas), 1);?>" hx-trigger="load" hx-swap="outerHTML"></div>
