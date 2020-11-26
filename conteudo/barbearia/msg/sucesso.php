<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    Swal.fire({
        icon: 'success',
        title: 'Parabéns',
        text: 'Serviço marcado com sucesso. Na sessão de agendamento, você pode conferir mais informações.'
    }).then(function() {
        window.location = "area_cliente.php";
    });
</script>