<body>
    <?php 
        include "../../config/config.php";
        session_start();
        $idServico =  $_GET["id"];
        $idBarbearia = $_SESSION["barbearia_id"];

        $resultDelete = $mysqli->query("CALL PROC_DEL_SERVICO('{$idServico}', '{$idBarbearia}')");
        $numRows = $mysqli->affected_rows;

        if($numRows > 0){
            include "msg/servico-deletado.php";
        }
        else{
            include "msg/erro.php";
        }
    ?>
</body>