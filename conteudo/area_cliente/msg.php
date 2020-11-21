<!-- <script>
  Swal.fire({
    icon: 'success',
    title: 'Parabéns',
    text: 'Seu cadastro foi atualizado com sucesso!'
  }).then(function() {
      window.location = "area_cliente.php";
  });
</script> -->

<?php 
    function msg($icon, $title, $text, $location){
    ?>
        <script>
            Swal.fire({
                icon: $icon,
                title: $title,
                text: $text
            }).then(function() {
                    window.location = $location;
            });
        </script>
    <?php
    }
?>