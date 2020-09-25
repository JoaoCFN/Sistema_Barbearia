import Animate from "../Animate.js";

(function login(){

    const animacao = new Animate();
    const card = document.querySelector(".sb-card");
    const imgLogin = document.querySelector("#img-login");
    animacao.setAnimationUp(card, 20);
    animacao.setAnimationOpacity(imgLogin);

    window.addEventListener("load", () => {
        animacao.startAnimate(card);
        animacao.startAnimate(imgLogin);
    })

    // VALIDAÇÃO
    // Form
    const formLogin = document.querySelector("#form_login");
    // Campos
    const email = document.getElementById("login_email");
    const senha = document.getElementById("login_senha");

    /* DEFININDO CONSTANTES REGEX */
    const regexEmail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;

    const addMsgAlert = (titulo, mensagem_error) => {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: `${titulo}`,
            text: `${mensagem_error}`,
        })

        return false;
    }
    // FAZ A VALIDAÇÃO DO LOGIN
        /* TESTA EMAIL É VÁLIDOS CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const validacaoLogin = () => {
            const emailValido = regexEmail.exec(email.value);
            if (!emailValido) return addMsgAlert("E-mail inválido", "Verique o campo email e tente novamente");

            if(senha.value.length == 0 || senha.value.length < 8) return addMsgAlert("Senha inválida", "O campo de senha está vazio ou não detém o mínimo de 8 caracteres");
        }


    // BARRA O ENVIO CASO AINDA TIVERMOS CAMPOS INVÁLIDOS
    formLogin.addEventListener("submit", event => {
        if(validacaoLogin() == false) event.preventDefault();
    })



})();