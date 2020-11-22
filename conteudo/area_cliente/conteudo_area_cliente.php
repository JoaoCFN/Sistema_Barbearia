<section class="gap-to-menu container">
    <div class="area-cliente">
        <!-- Cards Linha 1-->
        <div class="row">
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "dbtcc");
                date_default_timezone_set('America/Sao_Paulo');
                $horarioAtual = date("H:i");

                $queryBarbearias = "CALL PROC_SEL_BARBEARIAS()";
                $resultBarbearias = mysqli_query($conn, $queryBarbearias);

                while ($rowBarbearias = mysqli_fetch_array($resultBarbearias)) {
                    // Campos
                    $idBarbearia = $rowBarbearias[0];
                    $nomeBarbearia = $rowBarbearias[1];
                    $horarioAbertura = $rowBarbearias[2];
                    $horarioFechamento = $rowBarbearias[3];
                    $telefone = $rowBarbearias[4];
                    $cidade = $rowBarbearias[5];                 

                    if ($horarioAtual >= $horarioAbertura && $horarioAtual < $horarioFechamento){
                        $status = "aberto";
                        $statusText = "Aberto";
                    }
                    else{
                        $status = "fechado";
                        $statusText = "Fechado";
                    }

                    $cssStatus = "status-{$status}";  

                    if(strlen($horarioAbertura) == 0 && strlen($horarioFechamento) == 0){
                        $horarioAberturaConv = "Sem horário cadastrado";
                        $horarioFechamentoConv = "";
                    }
                    else{
                        // Pega apenas o primeiro dígito do horário de abertura
                        $horarioAberturaConv = substr($horarioAbertura, 1, 4)." - ";
                        // Pega apenas o primeiro dígito do horário de fechamento
                        $horarioFechamentoConv = substr($horarioFechamento, 0, 5);
                    }

                    echo "
                        <div class='col-md-3 col-sm-12 mb-4'>
                            <div class='card area-cliente-card'>
                                <img 
                                    class='card-img-top' 
                                    src='https://i.ibb.co/6cSfrM6/cliente-sem-ft.png' 
                                    alt='Imagem de capa do card'
                                />
                                <div class='$cssStatus sb-txt-black sb-w-700'>
                                    $statusText
                                </div>
                                <div class='card-body sb-txt-white'>
                                    <h5 class='card-title sb-w-700 sb-txt-secondary'>
                                        $nomeBarbearia
                                    </h5>
                                    <div class='card-text'>
                                        <p>
                                            <i class='fa fa-clock-o'></i>
                                            <span class='ml-1'>
                                                $horarioAberturaConv
                                                $horarioFechamentoConv
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

            <!-- <div class="col-md-3 col-sm-12 mb-4">
                <div class="card area-cliente-card">
                    <img 
                        class="card-img-top" 
                        src="https://i.ibb.co/6cSfrM6/cliente-sem-ft.png" 
                        alt="Imagem de capa do card"
                    />
                    <div class="status-aberto sb-txt-black sb-w-700">
                        Aberto
                    </div>
                    <div class="card-body sb-txt-white">
                        <h5 class="card-title sb-w-700 sb-txt-secondary">
                            Nome da barbearia
                        </h5>
                        <div class="card-text">
                            <p>
                                <i class="fa fa-clock-o"></i>
                                <span class="ml-1">8H - 18H</span>
                            </p>    
                            <p>
                                <i class="fa fa-phone"></i>
                                <span class="ml-1">(75) 98888-7777</span>
                            </p>        
                            <p>
                                <i class="fa fa-map-marker"></i>
                                <span class="ml-1">Feira de Santana - BA</span>
                            </p>            
                        </div>
                        <a href="#" class="btn sb-btn-secondary sb-w-700 sb-full-width">
                            Agendar
                        </a>
                    </div>
                </div>
            </div> -->
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
                                    <input type="text" class="form-control sb-form-input" id="inputNome" placeholder="Digite o nome da barbearia">
                                </div>
                            </div>

                            <!-- Cidade -->
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Cidade
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control sb-form-input">
                                        <option>Selecione a cidade</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Horário -->
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label sb-txt-white">
                                    Horário
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control sb-form-input">
                                        <option>Selecione o horário desejado</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
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
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary sb-w-700" data-dismiss="modal">
                            Fechar
                        </button>
                        <button 
                            type="submit" 
                            class="btn sb-btn-secondary sb-w-700"
                            form="form-pesquisa"
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

