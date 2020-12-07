<?php 
    include "../config/config.php";
    date_default_timezone_set('America/Sao_Paulo');
    $idBarbearia = $_SESSION["barbearia_id"];
    $diaSemana = date("Y-m-d");
?>

<div class="home-main">
    <div class=" container-fluid">
        <div class="row pt-5 align-items-start">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="bg-white">
                    <div class="col-12 headerIcon pt-3 pb-3">
                            <span><i class="fas fa-clock"></i> Serviços agendados para o dia</span>
                        </div>
                        <div class="col-12 text-right mt-2">
                            <p class="card-category">
                                Total de serviços
                            </p>
                            <p class="card-data">
                                <?php  
                                    $resultTotServicos = $mysqli->query("CALL PROC_TOTAL_SERVICOS_DIA('{$diaSemana}', '{$idBarbearia}')");
                                    $rowTotServicos = $resultTotServicos->fetch_assoc();
                                    echo $rowTotServicos["quantidade"];
                                    $mysqli->next_result();
                                ?>
                            </p>
                        </div>
                        <hr class="hr-card">
                        <div class="col-md-12 cd-footer mb-3 pb-2">
                            <a href="servicos-agendados" class="text-dark mb-3">
                                <i class="fas fa-eye"></i>
                                Visualizar os serviços agendadados
                            </a>
                        </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="bg-white">
                    <div class="col-12 headerIcon pt-3 pb-3">
                        <span><i class="fas fa-money-bill-wave"></i> Lucro diário</span>
                    </div>
                    <div class="col-12 text-right mt-2">
                        <p class="card-category">
                            Lucro total
                        </p>
                        <p class="card-data">
                            <?php     
                                $resultLucroDiario = $mysqli->query("CALL PROC_LUCRO_TOTAL_DIA('{$diaSemana}', '{$idBarbearia}')");
                                
                                if($mysqli->affected_rows > 0){
                                    $rowLucroDiario = $resultLucroDiario->fetch_assoc();
                                    echo "R$ {$rowLucroDiario["lucro_total"]}";
                                }
                                else{
                                    echo "R$ 0,00";
                                }
                                $mysqli->next_result();
                            ?>
                        </p>
                    </div>
                    <hr class="hr-card">
                    <div class="col-md-12 cd-footer mb-3 pb-2">
                        <a href="servicos-agendados" class="text-dark mb-3">
                            <i class="fas fa-eye"></i>
                            Visualizar os serviços agendadados
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="bg-white">
                    <div class="col-12 headerIcon pt-3 pb-3">
                        <i class="fas fa-clock"></i>
                        <span>Serviço mais requisitado do dia</span>
                    </div>
                    <div class="col-12 text-right mt-2">
                        <p class="card-category">
                            Serviço
                        </p>
                        <p class="card-data">
                            <?php     
                                $resultLucroDiario = $mysqli->query("CALL PROC_SERVICO_MAIS_REQUISITADO('{$diaSemana}', '{$idBarbearia}')");
                                if($mysqli->affected_rows > 0){
                                    $rowLucroDiario = $resultLucroDiario->fetch_assoc();
                                    echo $rowLucroDiario["nome"];
                                }
                                else{
                                    echo "Sem dados";
                                }
                                $mysqli->next_result();
                            ?>
                        </p>
                    </div>
                    <hr class="hr-card">
                    <div class="col-md-12 cd-footer mb-3 pb-2">
                        <a href="servicos-agendados" class="text-dark mb-3">
                            <i class="fas fa-eye"></i>
                            Visualizar os serviços agendadados
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 mb-5 pb-5 container-fluid">
            <div class="graph">
                <canvas width="1000px" height="300px" id="chartServicos">
                </canvas>
            </div>
            <div class="graph-body col-12">
                <p class="pt-2 pb-2">
                    <span><i class="fas fa-money-bill-wave"></i> Serviços diarios</span>
                </p>
                <!-- <hr class="hr-dif">
                <p class="mt-1 mb-1">
                    <i class="fas fa-clock"></i> Atualizado a x minutos atras
                </p> -->
            </div>
        </div>


        
        <div class="mt-5 pb-5 container-fluid">
            
            <div class="graph">
                <canvas width="1000px" height="300px"  id="chartLucros">
                </canvas>
            </div>
            <div class="graph-body col-12">
                <p class="pt-2 pb-2">
                    <span><i class="fas fa-money-bill-wave"></i> Lucro mensal</span>
                </p>
                <!-- <hr class="hr-dif">
                <p class="mt-1 mb-1">
                    <i class="fas fa-clock"></i> Atualizado a x minutos atras
                </p> -->
            </div>
        </div>

    </div>
</div>