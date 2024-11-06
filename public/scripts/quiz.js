const $botaoIniciarJogo = document.querySelector(".botao_iniciar")
const $containerPerguntas = document.querySelector(".centralizar")
const barra = document.querySelector(".centralizar_barra")
const $textoPergunta = document.querySelector("#pergunta")
const $iniciar = document.querySelector(".iniciar")
const $proximaPergunta = document.querySelector(".proxima_pergunta")
const $botaoSair = document.querySelector(".sair")
let $containerRespostas = document.querySelector(".respostas")
let $imagem = document.querySelector(".container_imagem")
let a
const acabou = document.querySelector(".acabou")

$proximaPergunta.addEventListener("click", proximaPergunta)


function iniciarJogo(){
//     renderizarBarra(0);
//     temporizador()
}

const pararTempo = () => {
    clearInterval(intervaloTempo)
}

/**
 * 
 * @param {number} value Valor da barra em porcentagem 
 */
function renderizarBarra(value) {
    const progressBarElement = document.querySelector(".barra")
    
    progressBarElement.style.width = `${100 - (value * 100)}%`
}

function temporizador(){
    const tempoInicial = 3000
    let contagem = 0
    const barElement = document.querySelector(".progresso")
    const progressBarElement = document.querySelector(".barra")

    barElement.max = tempoInicial
    barElement.middle = 1500
    barElement.min = 0
    
    intervaloTempo = setInterval(() => {
        tempoFinal = tempoInicial - contagem
        const porcentagem = contagem === 0 ? 0 : (contagem/tempoInicial)
        renderizarBarra(porcentagem)
        contagem++


        progressBarElement.style.background = `rgb(${255 * porcentagem}, ${-255 * porcentagem + 255}, 50)`

        if(tempoFinal === 0) {
            clearInterval(intervaloTempo)

            document.querySelectorAll(".botao").forEach(botao => {
                botao.disabled = true
                if(botao.dataset.correct === "true"){
                    botao.classList.add("botao_demorou")
                }
            })
            clearInterval(intervaloTempo)  
        }
    }, 10)
}