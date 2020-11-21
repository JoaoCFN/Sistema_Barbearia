(function area_cliente(){
    // Form
    const formPerfil = document.querySelector("#form-perfil");

    // Btns
    const btnSalvar = document.querySelector("#modal-perfil #salvar");
    const btnEditar = document.querySelector("#modal-perfil #editar");

    // Campos
    const campoNome = document.querySelector("#modal-perfil #input-nome");
    const campoTelefone = document.querySelector("#modal-perfil #input-telefone");
    const campoDataNascimento = document.querySelector("#modal-perfil #input-data-nascimento");
    
    // estado inicial
    btnSalvar.classList.add("sb-d-none");
    
    btnEditar.addEventListener("click", () => {
        btnSalvar.classList.remove("sb-d-none");

        campoNome.removeAttribute("readonly");
        campoNome.classList.add("sb-cursor-text");

        campoTelefone.removeAttribute("readonly");
        campoTelefone.classList.add("sb-cursor-text");

        campoDataNascimento.removeAttribute("readonly");
        campoDataNascimento.classList.add("sb-cursor-text");
    });

    btnSalvar.addEventListener("click", (e) => {
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
          
        swalWithBootstrapButtons.fire({
            title: 'Confirmar edição?',
            text: "Você deseja salvar as alterações realizadas",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, salvar tudo!',
            cancelButtonText: 'Não, cancele!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                formPerfil.submit();  
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Edição cancelada com sucesso',
                    'error'
                )
            }
        })
    })
})();


// function SwalAlert(icon, title, text, location){
//     // Swal.fire({
//     //     icon: 'error',
//     //     title: 'Oops...',
//     //     text: 'Houve um problema na atualização do seu cadastro, tente novamente mais tarde'
//     // }).then(function() {
//     //       window.location = "area_cliente.php";
//     // });

//     Swal.fire({
//         icon: icon,
//         title: title,
//         text: text
//     }).then(function() {
//           window.location = location;
//     });
// }