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
                        <p id="pergunta"><?= $pergunta['pergunta'] ?></p>
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
        <?php foreach ($respostas as $resposta): ?>
            <button class="botao <?php if ($resposta["tipo"] === 'errado') { echo 'botao_incorreto'; } elseif ($resposta["tipo"] === 'correto') { echo 'botao_correto'; } ?>">
                <div class="centralizar_elemento">
                    <div class="circulo">
                        <p class="alternativa"> <?= $resposta["letra"] ?> </p>
                    </div>
                    <div class="resposta">
                        <p><?= $resposta["texto_alternativa"] ?></p>
                    </div>
                </div>
            </button>
        <?php endforeach ?>
    </div>
</div>

<div hx-get="/quiz/botao_proximo" hx-trigger="load" hx-swap="outerHTML"></div>
