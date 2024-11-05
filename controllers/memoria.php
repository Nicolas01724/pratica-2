<?php 

require_once( ROOT_PATH . "\controller.php");
require_once( ROOT_PATH . MODEL_PATH . "\Memoria.php");

$memoria = new Memoria();

class Memoria_controller implements Controller {
    public function GET () {
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        .body_jogo_memoria{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            border: none;
            font-family: 'Press Start 2P', cursive;
        }
        .form_div{
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: center; 
        }
        .div_jogo_memoria{
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        .div_jogo_memoria img{
            width: 50%;
        }
        .div_jogo_memoria h1{
            color: #333;
            font-size: 2em;
        }
        .botao_iniciar{
            background-color: #ee665c;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
            font-size: 1.5em;
            max-width: 450px;
            padding: 15px;
            width: 100%;
            font-family: 'Press Start 2P', cursive;
        }
        .botao_voltar_series{
            margin-top: 5px;
            background-color: #023859;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
            font-size: 1.5em;
            max-width: 450px;
            padding: 15px;
            width: 100%;
            font-family: 'Press Start 2P', cursive;
        }

        /*CSS do Jogo*/

        main{
            width: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 25px;
            font-family: 'Press Start 2P', cursive;
        }
        .grid_cartas_memoria{
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
            width: 100%;
            max-width: 800px;
            margin-top: 30px;
        }
        .cartas{
            width: 100%;
            aspect-ratio: 3/4;
            border-radius: 5px;
            position: relative;
            transition: all 400ms ease;
            transform-style: preserve-3d;
        }
        .rosto{
            width: 100%;
            height: 100%;
            position: absolute;
            background-size: cover;
            background-position: center;
            border: 2px solid rgb(0, 0, 0);
            border-radius: 5px;
            transition: all 1000ms ease;
        }

        .frente{
            transform: rotateY(180deg);
            background-color: white;
        }
        .costa{
            background-image: url(../../imagens/PontoInterrogação);
            background-color: white;
            backface-visibility: hidden;
        }
        .revelar_carta{
            transform: rotateY(180deg);
        }
        .carta_preto_branco{
            filter: saturate(0);
            opacity: 0.5 ;
        }
        span{
            color: rgb(255, 252, 252);
        }
        .body_jogo{
            background-color: #023859;
        }
        header{
            background-color: rgb(255,255,255,0.5);
            width: 100%;
            max-width: 800px;
            padding: 30px;
            border-radius: 5px;
        }

        .alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(255, 255, 255); 
            border: 4px solid black;
            color: rgb(0, 0, 0);
            padding: 20px;
            font-size: 25px;
            border-radius: 5px;
            height: 225px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            text-align: center;
            display: flex;
            flex-direction: column;
            font-family: 'Press Start 2P', cursive;
        }

        .cor_do_alert{
            color: black;
        }
        
            #volta_inicio_memoria {
            margin-top: 60px;
            padding: 15px 20px;
            border: none;
            font-size: 14px;
            background-color: rgb(255, 0, 0); 
            color: #ffffff; 
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
        }

        #recarregar{
            margin-top: 32px;
            padding: 15px 20px;
            font-size: 14px;
            border: none;
            background-color: #023859; 
            color: #ffffff; 
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
        }
        
        .como_jogar_memoria{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
            color: black;
            font-size: 29px;
            font-family: 'Press Start 2P', cursive;
            margin-left: 240px;
        }

        #volta_inicio_memoria:hover {
            background-color: #8a8383;
            color: black;
        }
        #recarregar:hover {
            background-color: #8a8383;
            color: black;
        }

        .fecharAlert{
            margin-top: 60px;
            padding: 15px 20px;
            border: none;
            font-size: 14px;
            background-color: rgb(255, 0, 0); 
            color: #ffffff; 
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
        }
        .fecharAlert:hover{
            background-color: #8a8383;
            color: black;
        }

        @media only screen and (max-width: 600px){
            .fecharAlert{
                margin-top: 40px;
                padding: 15px 20px;
                border: none;
                font-size: 14px;
                background-color: rgb(255, 0, 0); 
                color: #ffffff; 
                border-radius: 8px;
                cursor: pointer;
                font-family: 'Press Start 2P', cursive;
            }
            .fecharAlert:hover{
                background-color: #8a8383;
                color: black;
            }
            .como_jogar_memoria{
                width: 50px;
                height: 50px;
                margin-top: 7px;
                border-radius: 50%;
                background-color: white;
                color: black;
                font-size: 29px;
                font-family: 'Press Start 2P', cursive;
                margin-left: 165px;
            }
            .alert {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgb(255, 255, 255); 
                border: 4px solid black;
                color: rgb(0, 0, 0);
                width: 350px;
                font-size: 19px;
                border-radius: 5px;
                height: 225px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                text-align: center;
                display: flex;
                flex-direction: column;
                font-family: 'Press Start 2P', cursive;
            }
            #volta_inicio_memoria {
                margin-top: 50px;
                padding: 15px 20px;
                border: none;
                font-size: 14px;
                background-color: rgb(255, 0, 0); 
                color: #ffffff; 
                border-radius: 8px;
                cursor: pointer;
                font-family: 'Press Start 2P', cursive;
            }
            
            #recarregar{
                margin-top: 12px;
                padding: 15px 20px;
                font-size: 14px;
                border: none;
                background-color: #023859; 
                color: #ffffff; 
                border-radius: 8px;
                cursor: pointer;
                font-family: 'Press Start 2P', cursive;
            }
            .grid_cartas_memoria{
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 10px;
                width: 100%;
                max-width: 800px;
                margin-top: 30px;
            }
            .cartas{
                width: 100%;
                aspect-ratio: 3/4;
                border-radius: 5px;
                position: relative;
                transition: all 400ms ease;
                transform-style: preserve-3d;
            }
            header{
                background-color: rgb(255,255,255,0.5);
                width: 100%;
                max-width: 365px;
                padding: 30px;
                border-radius: 5px;
            }
            main{
                width: 100%;
                min-height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: px;
                font-family: 'Press Start 2P', cursive;
            }
            span{
                font-size: 20px;
                color: rgb(255, 252, 252);
            }
        }
    </style>
    
    <title>Jogo da Memoria</title>
</head>
<body class="body_jogo">

    <main>
        <header>  
                <span>Tempo: <span class="tempo">0 min e 00s</span>
                <button class="como_jogar_memoria" onclick="comoJogar()">?</button>
        </header>
        <div class="grid_cartas_memoria">
        
        </div>
    </main>

    <script>
                
        const grid = document.querySelector('.grid_cartas_memoria');
        const cronometo = document.querySelector('.tempo');

        let primeira_carta = '';
        let segunda_carta = '';

        ChecarFimJogo = async () => {
            const cartaDesabilitadas = document.querySelectorAll('.carta_preto_branco');

            if(cartaDesabilitadas.length === 20){
                clearInterval(timer);
                
                showAlert(`Parabéns! Você completou o jogo em: ${cronometo.innerHTML} segundos.`);

                const formData = new FormData()
                formData.append('tempo', segundos)
                const response = await fetch("/jogodamemoria", {
                    method: 'POST',
                    body: formData
                })

                console.log(await response.text())
            }
        };

        function comoJogar() {
            const alertBox = document.createElement('div');
            alertBox.className = 'alert';
            alertBox.innerHTML = `
            <p>Como jogar?</p>
            <a>Ache todas as cartas e finalize o jogo no tempo mais curto possível.</a>
            <button class="fecharAlert">Fechar</button>`

            document.body.appendChild(alertBox);
            alertBox.classList.add('visible');

            const closeButton = alertBox.querySelector('.fecharAlert');
            closeButton.addEventListener('click', () =>{
                alertBox.classList.remove('visible');
                setTimeout(() =>{
                    document.body.removeChild(alertBox);
                }, 300);
            });
        }

        function showAlert(message) {
            const alertBox = document.createElement('div');
            alertBox.className = 'alert';
            alertBox.innerHTML = `
                <span class="cor_do_alert">${message}</span>
                <button id="volta_inicio_memoria" onclick="voltarInicio()">Voltar ao Início</button>
                <button id="recarregar" onclick="recarregar()">Reiniciar o Jogo</button>`;
            

            document.body.appendChild(alertBox);
            alertBox.classList.add('visible');
        }


        function recarregar() {
            location.reload();
        }

        function voltarInicio() {
            window.location.href = 'jogo_iniciar_memoria.html';
        }

        const verificarCartas = () => {
            const primeiro_personagem = primeira_carta.getAttribute('nome_personagem');
            const segundo_personagem = segunda_carta.getAttribute('nome_personagem');

            if(primeiro_personagem === segundo_personagem) {
                primeira_carta.firstChild.classList.add('carta_preto_branco');
                segunda_carta.firstChild.classList.add('carta_preto_branco');

                primeira_carta = '';
                segunda_carta = '';

                ChecarFimJogo();
            } else {

            setTimeout(() => {
                primeira_carta.classList.remove('revelar_carta');
                segunda_carta.classList.remove('revelar_carta');

                primeira_carta = '';
                segunda_carta = '';
            }, 500);

            }
        }



        const revelar_carta = ({target}) => {

            if(target.parentNode.className.includes('revelar_carta')){
                return;
            }

            if(primeira_carta === ''){
                target.parentNode.classList.add('revelar_carta');
                primeira_carta = target.parentNode;
            } else if (segunda_carta === ''){
                target.parentNode.classList.add('revelar_carta');
                segunda_carta = target.parentNode;

                verificarCartas();
            }

        }

        const personagens = [
            'Arara',
            'Capivara',
            'Coelho',
            'Dogao',
            'Foca',
            'Gato',
            'Onça',
            'Raposa',
            'Sagui',
            'Tartaruga',
        ];

        const createElement = (tag, className)  => {
            const element = document.createElement(tag);
            element.className = className;

            return element;
        }

        const createCard = (personagens) => {
            const card = createElement('div', 'cartas')
            const front = createElement('div', 'rosto frente');
            const back = createElement('div', 'rosto costa');
            
            front.style.backgroundImage = `url('http://127.0.0.1:5500/codigo-novo/Eptran-DS-24-M2-main/imagens/Personagens/${personagens}.png')`;

            card.appendChild(front);
            card.appendChild(back);

            card.addEventListener('click', revelar_carta);
            card.setAttribute('nome_personagem', personagens);

            return card;
        }

        const loadGame = () => {
            
            const duplicarPersonagens = [... personagens, ...personagens];

            const embaralhar = duplicarPersonagens.sort( () => Math.random() - 0.5);

            embaralhar.forEach((personagens) => {

                const card = createCard(personagens);
                grid.appendChild(card);

            });
        }

        let segundos = 0;
        const timerElement = document.querySelector('.tempo');

        const timer = setInterval(() => {
            segundos++;

            const minutos = Math.floor(segundos/60);
            const segundosRestantes = segundos % 60;

            timerElement.innerHTML = `${minutos} min e ${segundosRestantes}s`;

        }, 1000);

        window.onload = () => {
            loadGame();
        }

    </script>
</body>
</html>
        <?php
    }
    public function PUT () {}
    public function POST () {

        global $memoria;
        $time = $_POST['tempo'];

        $hour = 00;
        $minute = 00;
        $second = $time;
        while ($second >= 60) {
            $second -= 60;
            $minute += 1;
        }

        $memoria->insertTime($hour, $minute, $second);

    }
    public function DELETE () {}
}