<nav class="sb-navbar navbar navbar-expand-lg sb-bg-black fixed-top">
    <div class="container">
        <a class="navbar-brand" href="area_cliente.php">
            <img 
                src="assets/images/logo-invertida.png" 
                alt="logo"
                class="logo"
            />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <i class="fa fa-times icon-close"></i>
            <i class="fa fa-bars icon-open"></i>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto sb-w-700">
                <li class="nav-item align-self-center">                   
                    <a 
                        class="nav-link" 
                        data-toggle="modal"
                        data-target="#modal-agendamentos"
                        href="#"
                    >
                        AGENDAMENTOS
                    </a>
                </li>
                <li class="nav-item align-self-center">                   
                    <a 
                        class="nav-link" 
                        data-toggle="modal"
                        data-target="#modal-perfil"
                        href="#"
                    >
                        PERFIL
                    </a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link sb-btn-outline-secondary sb-w-700 pr-3 pl-3" href="logout.php">
                        SAIR 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Agendamentos -->
<div class="modal fade" id="modal-agendamentos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title sb-txt-secondary sb-w-700">
                    Agendamentos
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true" class="sb-txt-white">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                    $conn2 = mysqli_connect("localhost", "root", "", "dbtcc");

                    $queryAgendamento = "CALL PROC_AGENDAMENTOS_USUARIO('{$_SESSION["user_id"]}');";
                    $resultAgendamento = mysqli_query($conn2, $queryAgendamento);
                    $rowAgendamento = mysqli_num_rows($resultAgendamento);

                    if($rowAgendamento > 0){
                        while($dadosAgendamento = mysqli_fetch_array($resultAgendamento)){
                            if(strlen($dadosAgendamento["nome_barbearia"]) > 0){
                                $dataFormat = date("d/m/Y", strtotime($dadosAgendamento["data_agendamento"]));
                                $horarioFormat = substr($dadosAgendamento["horario_agendamento"], 0, 5);

                                echo "
                                    <div class='row'>
                                        <div class='col-sm-12 mt-1 mb-1'>
                                            <div class='card shadow-sm sb-bg-black'>
                                                <div class='card-body'>
                                                    <h5 class='sb-txt-secondary sb-w-700 mb-2'>
                                                        {$dadosAgendamento["nome_barbearia"]}
                                                    </h5>
                                                    <h6 class='sb-txt-white sb-w-500'>
                                                        <i class='fa fa-calendar'></i>
                                                        <span class='ml-1'>
                                                            Data: {$dataFormat}
                                                        </span>
                                                    </h6>
                                                    <h6 class='sb-txt-white sb-w-500'>
                                                        <i class='fa fa-clock-o'></i>
                                                        <span class='ml-1'>
                                                            Horário: {$horarioFormat}
                                                        </span>
                                                    </h6>
                                                    <h6 class='sb-txt-white sb-w-500'>
                                                        <i class='fa fa-cut'></i>
                                                        <span class='ml-1'>
                                                            Serviço: {$dadosAgendamento["nome_servico"]}
                                                        </span>
                                                    </h6>
                                                    <h6 class='sb-txt-white sb-w-500'>
                                                        <i class='fa fa-money'></i>
                                                        <span class='ml-1'>
                                                            Valor: R$ {$dadosAgendamento["valor_total"]}
                                                        </span>
                                                    </h6>
                                                    <h6 class='sb-w-500 sb-txt-white'>
                                                        <i class='fa fa-map-marker'></i>
                                                        <span class='ml-1'>
                                                            Endereço:
                                                            {$dadosAgendamento["rua"]} | 
                                                            Nº {$dadosAgendamento["num_bar"]} | 
                                                            {$dadosAgendamento["bairro"]}
                                                        </span>
                                                    </h6>
                                                    <h6 class='sb-txt-white sb-w-500'>
                                                        <i class='fa fa-phone'></i>
                                                        <span class='ml-1'>Telefone: 
                                                            {$dadosAgendamento["telefone"]}
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                ";  
                            }
                            else{
                                echo "
                                   <h5 class='sb-txt-white sb-w-500'>
                                        Não há agendamentos feitos
                                    </h5>
                                ";
                            }
                        }
                    }
                    else{
                        echo "
                           <h5 class='sb-txt-white sb-w-500'>
                                Não há agendamentos feitos
                            </h5>
                        ";
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary sb-w-700" data-dismiss="modal">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Model Perfil -->
<div class="modal fade" id="modal-perfil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title sb-txt-secondary sb-w-700">
                    Perfil
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true" class="sb-txt-white">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-perfil" method="POST" action="conteudo/area_cliente/att_perfil.php">
                    <?php 
                        $conn1 = mysqli_connect("localhost", "root", "", "dbtcc");

                        $queryUsuarioLogado = "CALL PROC_SEL_USUARIO({$_SESSION['user_id']})";

                        $resultUsuarioLogado = mysqli_query($conn1, $queryUsuarioLogado);

                        $dadosUsuarioLogado = mysqli_fetch_assoc($resultUsuarioLogado);

                        echo "
                            <!-- Nome -->
                            <div class='form-group row'>
                                <label for='inputPassword' class='col-sm-4 col-form-label sb-txt-white'>
                                    Nome:
                                </label>
                                <div class='col-sm-8'>
                                    <input 
                                        type='text' 
                                        class='form-control-plaintext sb-form-input pl-2' 
                                        value='{$dadosUsuarioLogado['nome']}'
                                        name='nome'
                                        id='input-nome'
                                        readonly 
                                    >
                                </div>
                            </div>

                            <!-- Telefone -->
                            <div class='form-group row'>
                                <label for='inputPassword' class='col-sm-4 col-form-label sb-txt-white'>
                                    Telefone:
                                </label>
                                <div class='col-sm-8'>
                                    <input 
                                        type='text' 
                                        class='form-control-plaintext sb-form-input pl-2 maskTelefone' 
                                        value='{$dadosUsuarioLogado['telefone']}'
                                        name='telefone'
                                        id='input-telefone'
                                        readonly 
                                    >
                                </div>
                            </div>

                            <!-- Data de Nascimento -->
                            <div class='form-group row'>
                                <label for='inputPassword' class='col-sm-5 col-form-label sb-txt-white'>
                                    Data de Nascimento:
                                </label>
                                <div class='col-sm-7'>
                                    <input 
                                        type='date' 
                                        class='form-control-plaintext sb-form-input pl-2' 
                                        value='{$dadosUsuarioLogado['data_de_nascimento']}'
                                        name='data-nascimento'
                                        id='input-data-nascimento'
                                        readonly 
                                    >
                                </div>
                            </div>
                        ";
                    ?>

                    <div class="btn-salvar">
                        <button 
                            class="btn sb-btn-secondary sb-w-700"
                            id="salvar"
                        >
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary sb-w-700" data-dismiss="modal">
                    Fechar
                </button>
                <button 
                    class="btn sb-btn-secondary sb-w-700"
                    id="editar"
                >
                    Editar
                </button>
            </div>
        </div>
    </div>
</div>

