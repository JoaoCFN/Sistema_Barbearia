<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Não conseguimos deletar seu serviço. Tente novamente mais tarde.'
  }).then(function() {
      history.go(-1);
  });
</script>