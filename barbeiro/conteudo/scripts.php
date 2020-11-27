<?php
$base_url = "barbeiro/"
?>

<script src="js/all.js"> </script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="js/bootstrap/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap/popper.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/navbar.js"> </script>
<script src="js/Chart.min.js"> </script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<script src="js/datatables.min.js"> </script>

<script>
    $(document).ready(function() {
        $('#tabela_servicos_agendados').DataTable({
            responsive: true,
            "bJQueryUI": true,
            "oLanguage": {
                "sProcessing": "Processando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Não foram encontrados resultados",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            }
        });
    });
</script>