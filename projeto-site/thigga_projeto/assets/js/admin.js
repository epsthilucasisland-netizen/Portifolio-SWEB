document.addEventListener("DOMContentLoaded", function () {


    const botoesExcluir = document.querySelectorAll(".btn-excluir");

    botoesExcluir.forEach(function (botao) {

        botao.addEventListener("click", function (evento) {

            const confirmar = confirm(
                "Tem certeza que deseja excluir este registro?\n\n" +
                "Essa ação não poderá ser desfeita."
            );

            if (!confirmar) {
                evento.preventDefault();
            }

        });

    });


    const menuLinks = document.querySelectorAll(".admin-menu a");

    menuLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            menuLinks.forEach(function (item) {
                item.classList.remove("ativo");
            });

            link.classList.add("ativo");

        });

    });



    const mensagens = document.querySelectorAll(
        ".mensagem-sucesso, .mensagem-erro"
    );

    mensagens.forEach(function (mensagem) {

        setTimeout(function () {

            mensagem.style.opacity = "0";

            mensagem.style.transition = "opacity 0.5s";

            setTimeout(function () {
                mensagem.style.display = "none";
            }, 500);

        }, 4000);

    });



    const formularios = document.querySelectorAll(".form-admin");

    formularios.forEach(function (formulario) {

        formulario.addEventListener("submit", function (evento) {

            const camposObrigatorios =
                formulario.querySelectorAll("[required]");

            let formularioValido = true;

            camposObrigatorios.forEach(function (campo) {

                if (campo.value.trim() === "") {

                    formularioValido = false;

                    campo.style.borderColor = "#DE2910";

                } else {

                    campo.style.borderColor = "";

                }

            });

            if (!formularioValido) {

                evento.preventDefault();

                alert(
                    "Preencha todos os campos obrigatórios."
                );

            }

        });

    });


 
    console.log(
        "THIGGA - Painel administrativo carregado."
    );

});