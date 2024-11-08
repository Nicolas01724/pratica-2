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

let questaoAtual = 0;

function iniciarJogo(){
//     renderizarBarra(0);
//     temporizador()
}

const pararTempo = () => {
    clearInterval(intervaloTempo)
}

function contarQuestoes(){
    console.log("chamou a função")
    console.log(questaoAtual)
    questaoAtual++
    if(questaoAtual === 10){
        telaZerou()
    }
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

function telaZerou(){
    window.location.href = "/quiz/zerou";
}

async function zerarJogo(){


    const perguntasTotais = 10
    const resultado = Math.floor(respostasCorretas * 100 / perguntasTotais)

    let mensagem = ""

    switch(true){
        case(resultado >= 90):
            mensagem = "Você é um mestre do trânsito!"
            break
        case(resultado >= 70):
            mensagem = "Você sabe muito sobre o trânsito!"
            break
        case(resultado >= 50):
            mensagem = "Você está indo no caminho certo!"
            break
        default:
            mensagem = "Você precisa se aprofundar mais no asssunto!"
    }

    pontuacao = (pontuacao*1000)/30000
    pontuacao = Math.round(pontuacao)

    $textoPergunta.innerHTML = `Você acertou ${respostasCorretas} de ${perguntasTotais} questões!
    <span>Resultado: ${mensagem} </span>
    <span> Pontuação: ${pontuacao} </span>`

    $botaoSair.classList.remove("hide")
    $proximaPergunta.classList.add("hide")
    $containerRespostas.classList.add("hide")
    acabou.classList.remove("hide")
    if(pontuacao >= 500){
        acabou.innerHTML = "Muito bem!"
    } else{
        acabou.innerHTML = "Mais sorte da proxima vez!"
    }

    const formData = new FormData()
    formData.append('pontuacao', pontuacao)

    // const urlParams = new URLSearchParams(window.location.search);
    // const id_usuario = urlParams.get('id');

    const response = await fetch("/zerou", {
        method: 'POST',
        body: formData
    })

}