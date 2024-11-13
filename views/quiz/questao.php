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
                        <p id="pergunta"><?= $pergunta_que_vai_voltar['pergunta'] ?></p>
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
            <button
                class="botao"
                hx-get="/quiz/responder?id=<?= $pergunta_que_vai_voltar['id'] ?>&resposta=<?= $pergunta["id"] ?>&questas=<?= substr(implode(",",$questas), 1);?>"
                hx-trigger="click"
                hx-target="#iniciar_quiz"
                hx-swap="innerHTML"
            >
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

    <script>
        clearInterval(a)
        $containerRespostas = document.querySelector(".respostas")
        $imagem = document.querySelector(".container_imagem")
        iniciarJogo()

        a = setInterval(() => console.log('oi'), 1000)
    </script>
</div>