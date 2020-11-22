<!-- <script>
  Swal.fire({
    icon: 'success',
    title: 'Parabéns',
    text: 'Seu cadastro foi atualizado com sucesso!'
  }).then(function() {
      window.location = "area_cliente.php";
  });
</script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php 
    function msg($icon, $title, $text, $location){
        echo "
            <script>
                Swal.fire({
                    icon: $icon,
                    title: $title,
                    text: $text
                }).then(function() {
                        window.location = '$location';
                });
            </script>
        ";
    }
?>