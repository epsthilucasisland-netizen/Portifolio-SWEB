

document.addEventListener("DOMContentLoaded", function () {

    console.log("THIGGA - Site carregado com sucesso!");

    

    const cards = document.querySelectorAll(".card");

    cards.forEach(function (card) {

        card.addEventListener("mouseenter", function () {
            card.style.cursor = "pointer";
        });

    });


  

    const botoes = document.querySelectorAll(".botao");

    botoes.forEach(function (botao) {

        botao.addEventListener("click", function (evento) {

            const destino = botao.getAttribute("href");

           
            if (!destino || destino === "#") {
                evento.preventDefault();
            }

        });

    });


   

    const elementos = document.querySelectorAll(
        ".card, .produto, .promocao"
    );

    const observador = new IntersectionObserver(
        function (entradas) {

            entradas.forEach(function (entrada) {

                if (entrada.isIntersecting) {

                    entrada.target.classList.add("mostrar");

                }

            });

        },
        {
            threshold: 0.15
        }
    );


    elementos.forEach(function (elemento) {

        elemento.classList.add("animar");

        observador.observe(elemento);

    });


  

    const ano = new Date().getFullYear();

    const rodape = document.querySelector(".rodape");

    if (rodape) {

        const textos = rodape.querySelectorAll("p");

        if (textos.length > 1) {

            textos[textos.length - 1].textContent =
                "© " + ano + " THIGGA. Todos os direitos reservados.";

        }

    }

});