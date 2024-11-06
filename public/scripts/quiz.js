const $botaoIniciarJogo = document.querySelector(".botao_iniciar")
const $containerPerguntas = document.querySelector(".centralizar")
const barra = document.querySelector(".centralizar_barra")
// const $containerRespostas = document.querySelector(".respostas")
const $textoPergunta = document.querySelector("#pergunta")
const $iniciar = document.querySelector(".iniciar")
const $proximaPergunta = document.querySelector(".proxima_pergunta")
const $botaoSair = document.querySelector(".sair")
$containerRespostas = document.querySelector(".respostas")
$imagem = document.querySelector(".container_imagem")

const acabou = document.querySelector(".acabou")

$proximaPergunta.addEventListener("click", proximaPergunta)

let questaoAtual = 0
let respostasCorretas = 0
let intervaloTempo = 0
let pontuacao = 0
let tempoFinal = 0

function iniciarJogo(){
    clearInterval(intervaloTempo)
    renderizarBarra(0);
    if(questaoAtual === 10){
        return zerarJogo()
    }
    // resetarDisplay()
    temporizador()

    // proximaPergunta()
}

const pararTempo = () => {
    clearInterval(intervaloTempo)
}

function proximaPergunta(){
    clearInterval(intervaloTempo)
    renderizarBarra(0);
    if(questaoAtual === 10){
        return zerarJogo()
    }
    // resetarDisplay()
    temporizador()
    return
    const imagem = document.createElement("img")


    if(PERGUNTAS_finais[questaoAtual].link){
        imagem.src = PERGUNTAS_finais[questaoAtual].link
        $imagem.appendChild(imagem)
    }

    $textoPergunta.textContent = PERGUNTAS_finais[questaoAtual].question
    PERGUNTAS_finais[questaoAtual].answers.forEach(answers => {
        const botao = document.createElement("button")
        const centralizaElemento = document.createElement("div")
        const circulo = document.createElement("div")
        const alternativa = document.createElement("p")
        const resposta = document.createElement("div")
        const divImagem = document.createElement("div")

        botao.classList.add("botao")
        centralizaElemento.classList.add("centralizar_elemento")
        circulo.classList.add("circulo")
        alternativa.classList.add("alternativa")
        resposta.classList.add("resposta")
        divImagem.classList.add("container_imagem")
        imagem.classList.add("imagem")

        alternativa.textContent = answers.letter
        resposta.textContent = answers.text

        if(answers.correct){
            botao.dataset.correct = answers.correct
            centralizaElemento.dataset.correct = answers.correct
            circulo.dataset.correct = answers.correct
            alternativa.dataset.correct = answers.correct
            resposta.dataset.correct = answers.correct
        }

        $containerRespostas.appendChild(botao)
        botao.appendChild(centralizaElemento)
        centralizaElemento.appendChild(circulo)
        circulo.appendChild(alternativa)
        centralizaElemento.appendChild(resposta)

        botao.addEventListener("click", selecionarResposta)  
    })
    questaoAtual++ // verificar erro na soma da questaoAtual  
}

function resetarDisplay(){
    while($containerRespostas.firstChild){
        $containerRespostas.removeChild($containerRespostas.firstChild)
        while($imagem.firstChild){
            $imagem.removeChild($imagem.firstChild)
        }
    }
    $proximaPergunta.classList.add("hide")
}

function selecionarResposta(event){
    clearInterval(intervaloTempo)
    // let tempoTotal = 3000 - intervaloTempo
    // pontuacao =+ tempoFinal
    const respostaClicada = event.currentTarget
    const eCorreto = respostaClicada.dataset.correct === "true"
    
    if(eCorreto){
        respostasCorretas++
        respostaClicada.classList.add("botao_correto")
        pontuacao = pontuacao + tempoFinal
        // pontuacao =+ (tempoTotal*100)/3000
    } else{
        respostaClicada.classList.add("botao_incorreto")
        if (pontuacao > 0) {
            pontuacao = pontuacao - 100
        } else {
            pontuacao = 0
        }
    }

    document.querySelectorAll(".botao").forEach(button => {
        button.disabled = true
    })

    $proximaPergunta.classList.remove("hide")
}

function zerarJogo(){
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
            $proximaPergunta.classList.remove("hide")

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