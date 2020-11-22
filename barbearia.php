<?php
  include('verifica_login.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>Agendar Serviço | Home of Barber</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- DATE PICKER -->
    <link rel="stylesheet" href="assets/datepicker/themes/default.css">
    <link rel="stylesheet" href="assets/datepicker/themes/default.date.css">
    <link rel="stylesheet" href="assets/datepicker/themes/default.time.css">
    <link rel="stylesheet" href="assets/datepicker/themes/rtl.css">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div id="root" class="index sb-bg-black">
        <?php require_once "conteudo/area_cliente/menu.php"; ?>

        <?php require_once "conteudo/barbearia/conteudo_barbearia.php"; ?>

        <?php require_once "conteudo/footer.php"; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>
    <!-- JS -->
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/area_cliente/area_cliente.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/mask_forms.js"></script>
    <!-- DATE PICKER -->
    <script src="assets/datepicker/picker.js"></script>
    <script src="assets/datepicker/picker.time.js"></script>
    <script src="assets/datepicker/picker.date.js"></script>
    <script src="assets/datepicker/legacy.js"></script>
    <script src="assets/datepicker/translate/pt_BR.js"></script>

    <script src="js/barbearia/barbearia_form.js"></script>
    <script src="js/barbearia/barbearia_steps.js"></script>

    <script>
      // Horário
      $('.timepicker').pickatime({
          format: 'H:i',
          // Delimitador de horas
          // Modificar quando for implementar o backend
          min: [8,0],
          max: [17,30],
      })
    </script>
  </body>
</html>