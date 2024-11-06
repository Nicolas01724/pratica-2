
       
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
            
            front.style.backgroundImage = `url('/public/images/Personagens/${personagens}.png')`;
            
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