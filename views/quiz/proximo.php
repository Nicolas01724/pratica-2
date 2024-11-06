<div class="centralizar">
    <div class="proxima_pergunta">
       <button class="botao_proxima" hx-get="/quiz/gerar?id=1&questas=<?= substr(implode(",",$questas), 1);?>&resposta&escolaridade=1" hx-target="#iniciar_quiz" hx-trigger="click" hx-swap="interHTML">
          <div class="centralizar_elemento">
             <div class="resposta">
                <p>Próxima Pergunta</p>
             </div>
          </div>
       </button>
    </div>
</div>