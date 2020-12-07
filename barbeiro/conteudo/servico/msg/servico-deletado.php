<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  Swal.fire({
    icon: 'success',
    title: 'Parabéns',
    text: 'Serviço deletado com sucesso'
  }).then(function() {
      window.location = "../../index.php"
  });
</script>