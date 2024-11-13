<!DOCTYPE html>
<html lang="PT-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link rel="stylesheet" href="/public/styles/global.css">
   <link rel="stylesheet" href="/public/styles/quiz.css">
   <link rel="stylesheet" href="/public/styles/navbar.css">
   <script src="/public/scripts/quiz.js" async></script>

   <script src="https://unpkg.com/htmx.org@2.0.3" integrity="sha384-0895/pl2MU10Hqc6jd4RvrthNlDiE9U1tWmX7WRESftEDRosgxNsQG/Ze9YMRzHq" crossorigin="anonymous"></script>

   <title>Quiz - Séries Finais</title>
</head>
<body>
   <header class="cabecalho" id="cabecalho">
      <nav class="nav container">
         <a href="#" class="nav__logo">Logo</a>

         <div class="nav__menu" id="nav-menu">
            <ul class="nav__lista">
               <li class="nav__item">
                  <a href="#" class="nav__link">Página Inicial</a>
               </li>

               <li class="nav__item">
                  <a href="#" class="nav__link">Séries Iniciais</a>
               </li>

               <li class="nav__item">
                  <a href="#" class="nav__link">Séries Finais</a>
               </li>

               <li class="nav__item">
                  <a href="#" class="nav__link">Ensino Médio</a>
               </li>

               <li class="nav__item">
                  <a href="#" class="nav__link">Entre em Contato</a>
               </li>
            </ul>

            <div class="nav__fechar" id="nav-close">
               <i class="ri-close-line"></i>
            </div>
         </div>

         <div class="nav__acoes">
            <i class="ri-search-line nav__buscar" id="search-btn"></i>
            <i class="ri-user-line nav__login" id="login-btn"></i>

            <div class="nav__toggle" id="nav-toggle">
               <i class="ri-menu-line"></i>
            </div>
         </div>
      </nav>
      <div class="buscar" id="search">
         <form action class="buscar__formulario">
            <i class="ri-search-line buscar__icone"></i>
            <input type="search" placeholder="O que você está procurando?" class="buscar__input">
         </form>

         <i class="ri-close-line buscar__fechar" id="search-close"></i>
      </div>

      <div class="login" id="login">
         <form action class="login__formulario">
            <h2 class="login__titulo">Entrar</h2>

            <div class="login__grupo">
               <div>
                  <label for="email" class="login__label">Email</label>
                  <input type="email" placeholder="Digite seu email" id="email" class="login__input">
               </div>

               <div>
                  <label for="senha" class="login__label">Senha</label>
                  <input type="password" placeholder="Digite sua senha" id="senha" class="login__input">
               </div>
            </div>

            <div>
               <p class="login__registro">
                  Ainda não possui conta? <a href="#">Registre-se</a>
               </p>

               <a href="#" class="login__esqueci">
                  Esqueceu a senha
               </a>

               <button type="submit" class="login__botao">Entrar</button>
            </div>
         </form>
         <i class="ri-close-line login__fechar" id="login-close"></i>
      </div>
   </header>

   <div class="centralizar" id="iniciar_quiz">
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
        <?php foreach ($respostas as $resposta): ?>
            <button class="botao">
                <div class="centralizar_elemento">
                    <div class="circulo" style="color: black;"><?= $resposta["letra"] ?>
                    </div>
                    <div class="resposta">
                        <p><?= $resposta["texto_alternativa"] ?></p>
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
   </div>

   <div class="centralizar">
      <div class="proxima_pergunta hide">
         <button class="botao_proxima">
            <div class="centralizar_elemento">
               <div class="resposta">
                  <p>Próxima Pergunta</p>
               </div>
            </div>
         </button>
      </div>
   </div>

   <div class="centralizar">
      <div class="acabou hide">
         parabéns!
      </div>
   </div>

   <div class="centralizar">
      <div class="sair hide">
         <a class="botao_sair" href="../series_iniciais.html">
            <div class="centralizar_elemento">
               <div class="resposta">
                  <p>Sair do Jogo</p>
               </div>
            </div>
         </a>
      </div>
   </div>
   <script src="../../Script/navbar.js"></script>
</body>
</html>

<script>
   
</script>
