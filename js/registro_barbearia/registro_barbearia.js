(function registro_barbearia(){
    // Form
    const formRegistro = document.querySelector("#form_registro");
    // Campos pessoais
    const nome = document.getElementById("registro_nome");
    const cpf = document.getElementById("registro_cpf");
    const email = document.getElementById("registro_email");
    const senha = document.getElementById("registro_senha");
    const confirmaSenha = document.getElementById("registro_confirmar_senha");
    // Campos estabelecimento
    const nomeBarbearia = document.getElementById("registro_nome_barbearia");
    const telefone = document.getElementById("registro_telefone");
    const cep = document.getElementById("registro_cep");
    const cnpj = document.getElementById("registro_cnpj");
    const rua = document.getElementById("registro_rua");
    const numero = document.getElementById("registro_numero");
    const bairro = document.getElementById("registro_bairro");
    const cidade = document.getElementById("registro_cidade");
    const uf = document.getElementById("registro_uf");

    /* DEFININDO CONSTANTES REGEX */
    const regexEmail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;
    const regexTelefone = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/;
    const regex_CPF = /(\d{3}\.\d{3}\.)(\d{3}\-\d{2})/;
    const regex_CEP = /(\d{5}\-\d{3})/;
    const regex_CNPJ = /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/;
    const regex_numero = /\d/;

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

        /* TESTA SE O CPF É VÁLIDO CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const cpfValido = regex_CPF.exec(cpf.value);
        if (!cpfValido) return addMsgAlert("CPF inválido", "Verique o campo CPF e tente novamente");

        /* TESTA EMAIL É VÁLIDOS CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const emailValido = regexEmail.exec(email.value);
        if (!emailValido) return addMsgAlert("E-mail inválido", "Verique o campo email e tente novamente");

        if(senha.value.length == 0 || senha.value.length < 8) return addMsgAlert("Senha inválida", "O campo de senha está vazio ou não detém o mínimo de 8 caracteres");

        if(confirmaSenha.value.length == 0 || confirmaSenha.value.length < 8) return addMsgAlert("Senha inválida", "O campo de confirmação de senha está vazio ou não detém o mínimo de 8 caracteres");
        
        if(senha.value != confirmaSenha.value) return addMsgAlert("Senhas divergentes", "As senhas não condizem");

        if(nomeBarbearia.value.length == 0) return addMsgAlert("Nome da barbearia inválido", "O campo de nome está vazio");

        /* TESTA SE TELEFONE É VÁLIDO CHAMANDO O MÉTODO EXEC DA EXPRESSÃO REGULAR */
        const telefoneValido = regexTelefone.exec(telefone.value);
        if (!telefoneValido) return addMsgAlert("Telefone inválido", "Verique o campo de telefone e tente novamente");

        const cepValido = regex_CEP.exec(cep.value);
        if (!cepValido) return addMsgAlert("CEP inválido", "Verique o campo de CEP e tente novamente");

        const cnpjValido = regex_CNPJ.exec(cnpj.value);
        if (!cnpjValido) return addMsgAlert("CNPJ inválido", "Verique o campo de CNPJ e tente novamente");

        if(rua.value.length == 0) return addMsgAlert("Rua inválida", "O campo de rua está vazio");

        const numeroValido = regex_numero.exec(numero.value);
        if (!numeroValido) return addMsgAlert("Número inválido", "Verique o campo de número e tente novamente");

        if(bairro.value.length == 0) return addMsgAlert("Bairro inválido", "O campo de bairro está vazio");

        if(cidade.value.length == 0) return addMsgAlert("Cidade inválida", "O campo de cidade está vazio");

        if(uf.value.length == 0) return addMsgAlert("Estado inválido", "O campo de estado está vazio");
    }

    cep.addEventListener("change", () => {
        if(cep.value.length == 9){
            buscaCEP(cep.value);
        }
    })

    const buscaCEP = (cep) => {
        const cepConv = String(cep).replace("-", "");
        console.log(cepConv);
        fetch(`https://viacep.com.br/ws/${cepConv}/json`)
        .then(response => response.json())
        .then(data => {
            /* Se rua for undefined, todos os outros serão também. 
            logo o CEP é inválido ou não consta na base de dados do via CEP
            */
            if (data.logradouro != undefined){
                console.log(data);
                rua.value = `${data.logradouro}`;
                bairro.value = `${data.bairro}`;
                cidade.value = `${data.localidade}`;
                uf.value = `${data.uf}`;
            }
        })     
    }

    // BARRA O ENVIO CASO AINDA TIVERMOS CAMPOS INVÁLIDOS
    formRegistro.addEventListener("submit", event => {
        if(validacaoRegistro() == false) event.preventDefault();
    })
})();