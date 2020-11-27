<section class="gap-to-menu container">
    <div class="area-cliente">
        <!-- Cards Linha 1-->
        <div class="row" id="cards-barbearias">
            <?php 
                include "config/functions.php";
                $conn = mysqli_connect("localhost", "root", "", "dbtcc");
                date_default_timezone_set('America/Sao_Paulo');
                $horarioAtual = date("H:i");

                $queryBarbearias = "CALL PROC_SEL_CARD_BARBEARIAS()";
                $resultBarbearias = mysqli_query($conn, $queryBarbearias);

                while ($rowBarbearias = mysqli_fetch_array($resultBarbearias)) {
                    $statusFuncionamento = getStatus($rowBarbearias[2], $rowBarbearias[3], $rowBarbearias[4], $rowBarbearias[5]);

                    // Campos
                    $idBarbearia = $rowBarbearias[0];
                    $nomeBarbearia = $rowBarbearias[1];
                    $horarioAbertura = $statusFuncionamento[2];
                    $horarioFechamento = $statusFuncionamento[3];
                    $telefone = $rowBarbearias[6];
                    $cidade = $rowBarbearias[7];                 

                    echo "
                        <div class='col-md-3 col-sm-12 mb-4'>
                            <div class='card area-cliente-card'>
                                <img 
                                    class='card-img-top' 
                                    src='https://i.ibb.co/6cSfrM6/cliente-sem-ft.png' 
                                    alt='Imagem de capa do card'
                                />
                                <div class='$statusFuncionamento[0] sb-txt-black sb-w-700'>
                                    $statusFuncionamento[1]
                                </div>
                                <div class='card-body sb-txt-white'>
                                    <h5 class='card-title sb-w-700 sb-txt-secondary'>
                                        $nomeBarbearia
                                    </h5>
                                    <div class='card-text'>
                                        <p>
                                            <i class='fa fa-clock-o'></i>
                                            <span class='ml-1'>
                                                $horarioAbertura
                                                $horarioFechamento
                                            </span>
                                        </p>    
                                        <p>
                                            <i class='fa fa-phone'></i>
                                            <span class='ml-1'>$telefone</span>
                                        </p>        
                                        <p>
                                            <i class='fa fa-map-marker'></i>
                                            <span class='ml-1'>$cidade</span>
                                        </p>            
                                    </div>
                                    <a href='barbearia.php?id=$idBarbearia' class='btn sb-btn-secondary sb-w-700 sb-full-width'>
                                        Agendar
                                    </a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>

        <!-- Modal Pesquisa -->
        <div class="modal fade" id="modal-pesquisa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title sb-txt-secondary sb-w-700">
                            Pesquisar barbearias
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true" class="sb-txt-white">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-pesquisa">
                            <!-- Nome -->
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Nome
                                </label>
                                <div class="col-sm-10">
                                    <input 
                                        type="text" 
                                        class="form-control sb-form-input" 
                                        id="inputNome" 
                                        name="nome-barbearia"
                                        placeholder="Digite o nome da barbearia"
                                    >
                                </div>
                            </div>

                            <!-- Cidade -->
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Cidade
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control sb-form-input" name="cidade-barbearia">
                                        <option>Selecione a cidade</option>
                                        <option>Feira de Santana</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Horário -->
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Horário
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control sb-form-input" name="horario-barbearia">
                                        <option>Selecione o horário desejado</option>
                                        <option>07:00</option>
                                        <option>07:30</option>
                                        <option>08:00</option>
                                        <option>08:30</option>
                                        <option>09:00</option>
                                        <option>09:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Status -->
                            <!-- <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Status
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control sb-form-input" value="Selecione o status">
                                        <option>Selecione o status de funcionamento</option>
                                        <option>Aberto</option>
                                        <option>Fechado</option>
                                    </select>
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-secondary sb-w-700" 
                            data-dismiss="modal"
                        >
                            Fechar
                        </button>
                        <button 
                            type="submit" 
                            class="btn sb-btn-secondary sb-w-700"
                            form="form-pesquisa"
                            name="pesquisar"
                            data-toggle="modal"
                             data-target="#modal-resultado-pesquisa"
                        >
                            Pesquisar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn-pesquisa btn-position-fixed" data-toggle="modal" data-target="#modal-pesquisa">
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</section>

<div class="container">
    <div class="row">
        <?php 
            include "config/config.php";
                        
            if(isset($_GET["pesquisar"])){
                // $conn = mysqli_connect("localhost", "root", "", "dbtcc");

                $nome = mysqli_real_escape_string($mysqli, $_GET["nome-barbearia"]);
                $cidade = mysqli_real_escape_string($mysqli, $_GET["cidade-barbearia"]);
                $horario = mysqli_real_escape_string($mysqli, $_GET["horario-barbearia"]);

                echo "
                    <script>
                        const conteudo = document.querySelector('#cards-barbearias');
                        conteudo.innerHTML = ``;
                    </script>
                ";

                $queryPesquisa = "CALL PROC_PESQUISAR_BARBEARIAS('{$nome}', '{$cidade}', '{$horario}');";
                $resultPesquisa = $mysqli->query($queryPesquisa);
                $rowPesquisa = $resultPesquisa->num_rows;

                if($rowPesquisa > 0){
                    while ($rowPesquisa = $resultPesquisa->fetch_assoc()) {
                        $idBarbearia = $rowPesquisa["barbearia_id"];
                        $nomeBarbearia = $rowPesquisa["nome_barbearia"];
                        $horarioAbertura = $rowPesquisa["horario_abertura"];
                        $horarioFechamento = $rowPesquisa["horario_fechamento"];
                        $horarioAberturaFinalSemana = $rowPesquisa["horario_abertura_final_semana"];
                        $horarioFechamentoFinalSemana = $rowPesquisa["horario_fechamento_final_semana"];
                        $telefone = $rowPesquisa["telefone"];
                        $cidade = $rowPesquisa["cidade"];
    
                        $statusFuncionamento = getStatus($horarioAbertura, $horarioFechamento, $horarioAberturaFinalSemana, $horarioFechamentoFinalSemana);
    
                        echo "
                            <div class='col-md-3 col-sm-12 mb-4'>
                                <div class='card area-cliente-card'>
                                    <img 
                                        class='card-img-top' 
                                        src='https://i.ibb.co/6cSfrM6/cliente-sem-ft.png' 
                                        alt='Imagem de capa do card'
                                    />
                                    <div class='$statusFuncionamento[0] sb-txt-black sb-w-700'>
                                        $statusFuncionamento[1]
                                    </div>
                                    <div class='card-body sb-txt-white'>
                                        <h5 class='card-title sb-w-700 sb-txt-secondary'>
                                            $nomeBarbearia
                                        </h5>
                                        <div class='card-text'>
                                            <p>
                                                <i class='fa fa-clock-o'></i>
                                                <span class='ml-1'>
                                                    $statusFuncionamento[2]
                                                    $statusFuncionamento[3]
                                                </span>
                                            </p>    
                                            <p>
                                                <i class='fa fa-phone'></i>
                                                <span class='ml-1'>$telefone</span>
                                            </p>        
                                            <p>
                                                <i class='fa fa-map-marker'></i>
                                                <span class='ml-1'>$cidade</span>
                                            </p>            
                                        </div>
                                        <a href='barbearia.php?id=$idBarbearia' class='btn sb-btn-secondary sb-w-700 sb-full-width'>
                                            Agendar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
                else{
                    echo "
                        <a href='area_cliente.php' class='sb-txt-white'>
                            <i class='fa fa-arrow-left'></i>
                            <span class='ml-1'>Nenhum resultado encontrado</span>
                        </a>
                    ";
                }
            }
        ?>
    </div>
</div>