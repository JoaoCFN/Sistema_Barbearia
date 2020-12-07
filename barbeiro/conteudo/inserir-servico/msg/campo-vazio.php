<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Preencha todos os campos'
  }).then(function() {
      history.go(-1);
  });
</script>