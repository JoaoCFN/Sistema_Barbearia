<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Houve um problema na atualização do seu cadastro, tente novamente mais tarde'
  }).then(function() {
      window.location = "area_cliente.php";
  });
</script>