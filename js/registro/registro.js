import Animate from "../Animate.js";

(function registro(){
    // ANIMAÇÕES PÁGINA DE REGISTRO
    const animacao = new Animate();
    const card = document.querySelector(".sb-card");
    const imgRegistro = document.querySelector("#img-registro");
    animacao.setAnimationRight(card, 200);
    animacao.setAnimationOpacity(imgRegistro);

    window.addEventListener("load", () => {
        animacao.startAnimate(card);
        animacao.startAnimate(imgRegistro);
    })

    // VALIDAÇÃO
    // Form
    const formRegistro = document.querySelector("#form_registro");
    // Campos
    const nome = document.getElementById("registro_nome");
    const telefone = document.getElementById("registro_telefone");
    const dataNascimento = document.getElementById("registro_data_nascimento");
    const cpf = document.getElementById("registro_cpf");
    const email = document.getElementById("registro_email");
    const senha = document.getElementById("registro_senha");
    const confirmaSenha = document.getElementById("registro_confirmar_senha");

    /* DEFININDO CONSTANTES REGEX */
    const regexEmail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;
    const regexTelefone = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/;
    const regex_CPF = /(\d{3}\.\d{3}\.)(\d{3}\-\d{2})/;

    const addMsgAlert = (titulo, mensagem_error) => {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: `${titulo}`,
            text: `${mensagem_error}`,
        })

        return false;
    }

    // FAZ A VALIDAÇÃO DO REGISTRO
    const validacaoRegistro = () => {
        if(nome.value.length == 0) return addMsgAlert("Nome inválido", "O campo de nome está vazio");

        /* TESTA TELEFONE É VÁLIDOS CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const telefoneValido = regexTelefone.exec(telefone.value);
        if (!telefoneValido) return addMsgAlert("Telefone inválido", "Verique o campo de telefone e tente novamente");

        if(dataNascimento.value.length == 0) return addMsgAlert("Data de nascimento inválida", "O campo data de nascimento está vazio");

        /* TESTA TELEFONE É VÁLIDOS CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const cpfValido = regex_CPF.exec(cpf.value);
        if (!cpfValido) return addMsgAlert("CPF inválido", "Verique o campo CPF e tente novamente");

        /* TESTA EMAIL É VÁLIDOS CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const emailValido = regexEmail.exec(email.value);
        if (!emailValido) return addMsgAlert("E-mail inválido", "Verique o campo email e tente novamente");

        if(senha.value.length == 0 || senha.value.length < 8) return addMsgAlert("Senha inválida", "O campo de senha está vazio ou não detém o mínimo de 8 caracteres");

        if(confirmaSenha.value.length == 0 || confirmaSenha.value.length < 8) return addMsgAlert("Senha inválida", "O campo de confirmação de senha está vazio ou não detém o mínimo de 8 caracteres");
        
        if(senha.value != confirmaSenha.value) return addMsgAlert("Senhas divergentes", "As senhas não condizem");
    }

    // BARRA O ENVIO CASO AINDA TIVERMOS CAMPOS INVÁLIDOS
    formRegistro.addEventListener("submit", event => {
        if(validacaoRegistro() == false) event.preventDefault();
    })
})();