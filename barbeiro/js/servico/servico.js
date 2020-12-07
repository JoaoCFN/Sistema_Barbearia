function controlarServico(){
    const botoes = document.querySelectorAll(".deletar-servico");
    const listaBotoes = Array.from(botoes);

    listaBotoes.map(botao => {
        controlaBotao(botao);
    })

    function controlaBotao(botao){
        botao.addEventListener("click", function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Excluir serviço',
                text: "Você deseja escluir este serviço do seu estabelecimento?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            }).then((result) =>{
                if (result.isConfirmed) {
                    const link = this.getAttribute("href");
                    window.location.href = link;
                }
            })
        })
    }
}

controlarServico();