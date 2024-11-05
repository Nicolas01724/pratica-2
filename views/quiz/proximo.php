<div class="centralizar">
    <div class="proxima_pergunta">
       <button class="botao_proxima" hx-get="/quiz/questao?id=<?= $proxima_questa ?>" hx-target="#iniciar_quiz" hx-trigger="click" hx-swap="interHTML">
          <div class="centralizar_elemento">
             <div class="resposta">
                <p>Próxima Pergunta</p>
             </div>
          </div>
       </button>
    </div>
</div>