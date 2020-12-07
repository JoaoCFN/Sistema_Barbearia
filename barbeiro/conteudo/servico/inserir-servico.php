<body>
    <?php 
        include "../../config/config.php";
        session_start();

        if(isset($_POST["adicionar_servico"])){
            $nomeServico = mysqli_real_escape_string($mysqli, $_POST["nome_servico"]);
            $valorServico = mysqli_real_escape_string($mysqli, $_POST["valor_servico"]); 
            $idBarbearia = $_SESSION["barbearia_id"];
            
            if(strlen($nomeServico) == 0 || strlen($valorServico) == 0){
                include "msg/campo-vazio.php";
            }
            else{
                $resultServicoExiste = $mysqli->query("select * from servico where nome = '{$nomeServico}'");
                $numRowsServicoExiste = $resultServicoExiste->num_rows;
                
                if($numRowsServicoExiste > 0){
                    include "msg/servico-ja-cadastrado.php";
                }
                else{
                    $resultInserirServico = $mysqli->query("CALL PROC_INS_SERVICO('{$nomeServico}', '{$valorServico}', '{$idBarbearia}')");
                    include "msg/servico-cadastrado.php";
                }
            }
        }
    ?>
</body>

