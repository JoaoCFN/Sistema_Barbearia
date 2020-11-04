<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>

Swal.fire({
  icon: 'success',
  title: 'Parabéns',
  text: 'Seu cadastro foi realizado com sucesso!'
}).then(function() {
    window.location = "login.php";
});

</script>