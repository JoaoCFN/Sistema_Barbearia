<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Você não pode agendar mais de um serviço no mesmo estabelecimento'
    }).then(function() {
        history.go(-1);
    })
</script>