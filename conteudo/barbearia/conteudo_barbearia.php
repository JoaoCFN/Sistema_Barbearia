<section class="gap-to-menu barbearia">
    <picture class="image" alt="Imagem sessao 1">
        <source media="(max-width: 700px)" srcset="assets/images/agende-servico-mobile.jpg">
        <img 
            src="assets/images/agende-servico.jpg" 
            alt="Agende seu serviço"
        />
    </picture>
    
    <div class='container'>
        <?php  
            include "config/functions.php";
            include "config/config.php";
            $idBarbearia = $_GET["id"];
            $abertura = 0;
            $fechamento = 0;

            if(isset($idBarbearia)){
                $conn = mysqli_connect("localhost", "root", "", "dbtcc");

                $queryBarbearia = "CALL PROC_SEL_BARBEARIA($idBarbearia)";
                $resultBarbearia = mysqli_query($conn, $queryBarbearia);
                $rowBarbearia = mysqli_num_rows($resultBarbearia);

                $resultServicos = $mysqli->query("CALL PROC_SEL_SERVICOS($idBarbearia)");
                $rowServicos = $resultServicos->num_rows;
              
                // Montar página da barbearia
                if($rowBarbearia > 0){
                    $dadosBarbearia = mysqli_fetch_array($resultBarbearia);

                    $statusFuncionamento = getStatus($dadosBarbearia["horario_abertura"], $dadosBarbearia["horario_fechamento"], $dadosBarbearia["horario_abertura_final_semana"], $dadosBarbearia["horario_fechamento_final_semana"]);

                    $abertura = $statusFuncionamento[2];
                    $fechamento = $statusFuncionamento[3];
                    // Abertura trecho 
                    echo "
                        <button class='btn-whatsapp btn-position-fixed'>
                            <a href='https://api.whatsapp.com/send?phone=55{$dadosBarbearia["telefone"]}' target='_blank'>
                                <i class='fa fa-whatsapp'></i>
                            </a>
                        </button>
                    
                        <!-- Informações -->
                        <div class='informacoes'>
                            <div class='row'>
                                <div class='col-md-6 col-sm-12 align-self-center sb-mt-5' id='nome-barbearia'>
                                    <h3 class='sb-txt-secondary sb-w-700'>  
                                        {$dadosBarbearia["nome_barbearia"]}
                                    </h3>
                                </div> 
                                <div class='col-md-6 col-sm-12 align-self-center sb-mt-5'>
                                    <div class='$statusFuncionamento[0] sb-txt-black sb-w-700 text-center sb-float-right' id='status'>
                                        $statusFuncionamento[1]
                                    </div>
                                </div> 
                            </div>
                            <div class='row'>
                                <div class='col-md-8 col-sm-12 align-self-center mt-2'>
                                    <p class='sb-w-500 sb-txt-white'>
                                        <i class='fa fa-phone'></i>
                                        <span class='ml-1'>
                                            {$dadosBarbearia["telefone"]}
                                        </span>
                                    </p> 
                                    
                                    <p class='sb-w-500 sb-txt-white'>
                                        <i class='fa fa-map-marker'></i>
                                        <span class='ml-1'>
                                            {$dadosBarbearia["rua"]} | 
                                            Nº {$dadosBarbearia["num_bar"]} | 
                                            {$dadosBarbearia["bairro"]} | 
                                            {$dadosBarbearia["cidade"]}
                                        </span>
                                    </p>   
                                    
                                </div> 
                                <div class='col-md-4 col-sm-12 sb-mt-2'>
                                    <p class='sb-w-500 sb-txt-white sb-float-right'>
                                        <i class='fa fa-clock-o'></i>
                                        <span class='ml-1'>
                                            $statusFuncionamento[2]
                                            $statusFuncionamento[3]
                                        </span>
                                    </p>    
                                </div> 
                            </div>
                        </div>

                        <!-- Agendamento -->
                        <div class='agendamento mt-5'>
                            <!--PEN CONTENT     -->
                            <div class='content'>
                                <!--content inner-->
                                <div class='content__inner'>
                                    <div class='container'>
                                        <div class='container overflow-hidden'>
                                            <!--multisteps-form-->
                                            <div class='multisteps-form mt-1'>
                                                <!--progress bar-->
                                                <div class='row'>
                                                    <div class='col-12 col-lg-8 ml-auto mr-auto mb-4'>
                                                        <div class='multisteps-form__progress'>
                                                            <button class='multisteps-form__progress-btn js-active' type='button' title='User Info' disabled>
                                                                Dia
                                                            </button>
                    
                                                            <button class='multisteps-form__progress-btn' type='button' title='Address' disabled>
                                                                Horário
                                                            </button>
                    
                                                            <button class='multisteps-form__progress-btn' type='button' title='Order Info' disabled>
                                                                Serviço
                                                            </button>
                    
                                                            <button class='multisteps-form__progress-btn' type='button' title='Comments' disabled>
                                                                Confirmação
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <!--form panels-->
                                                <div class='row'>
                                                    <div class='col-12 col-lg-8 m-auto'>
                                                        <form class='multisteps-form__form' method='post' action='agendar_servico.php?id={$idBarbearia}'>
                                                            <!--Dia-->
                                                            <div class='multisteps-form__panel shadow p-4 rounded js-active'>
                                                                <h3 class='multisteps-form__title sb-txt-white sb-w-900'>
                                                                    Escolha o dia desejado
                                                                </h3>
                                                                <div class='multisteps-form__content'>
                                                                    <div class='mt-4'>
                                                                    <input 
                                                                            class='datepicker sb-form-input sb-full-width pl-3'
                                                                            placeholder='Clique para selecionar o dia'
                                                                            id='dia-agendamento'
                                                                            name='dia-agendamento'
                                                                            data-target-title='btn-dia'
                                                                            onChange='handleButton(this);'
                                                                    />
                                                                    </div>
                                                                    <div class='button-row d-flex mt-4'>
                                                                        <button 
                                                                            class='btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto' 
                                                                            type='button' 
                                                                            title='Prev'
                                                                            id='btn-dia'
                                                                            disabled
                                                                        >
                                                                            Próximo
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                    
                                                            <!--Horário-->
                                                            <div class='multisteps-form__panel shadow p-4 rounded'>
                                                                <h3 class='multisteps-form__title sb-txt-white sb-w-900'>
                                                                    Escolha o horário desejado
                                                                </h3>
                                                                <div class='multisteps-form__content'>
                                                                    <div class='mt-4'>
                                                                    <input 
                                                                            class='timepicker sb-form-input sb-full-width pl-3'
                                                                            placeholder='Clique para selecionar o horário'
                                                                            id='horario-agendamento'
                                                                            name='horario-agendamento'
                                                                            data-target-title='btn-horario'
                                                                            onChange='handleButton(this);'
                                                                    />
                                                                    </div>
                                                                    <div class='button-row d-flex mt-4'>
                                                                        <button class='btn sb-btn-secondary-default js-btn-prev sb-w-700' type='button' title='Prev'>
                                                                            Anterior
                                                                        </button>
                                                                        <button 
                                                                            class='btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto' 
                                                                            type='button' 
                                                                            title='Prev'
                                                                            id='btn-horario'
                                                                            disabled
                                                                        >
                                                                            Próximo
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                    
                                                            <!--Serviço-->
                                                            <div class='multisteps-form__panel shadow p-4 rounded' data-animation='scaleIn'>
                                                                <h3 class='multisteps-form__title sb-txt-white sb-w-900'>
                                                                    Informe o serviço desejado
                                                                </h3>
                                                                <div class='multisteps-form__content'>
                                                                    <div class='servicos mt-3'>
                    ";

                    // Serviços
                    if($rowServicos > 0){
                        while($servicos = $resultServicos->fetch_assoc()){
                            echo "
                                <div class='input-container'>
                                    <input 
                                        id='{$servicos["id_servico"]}' 
                                        type='checkbox' 
                                        value='{$servicos["nome"]}'
                                        name='servico-{$servicos["id_servico"]}'
                                        data-target-title='btn-servico'
                                        onChange='handleCheck(this);'
                                    >
                                    <label for='{$servicos["id_servico"]}'>
                                        <span>
                                            {$servicos["nome"]}
                                            <br>
                                            <span>
                                                R$ {$servicos["preco"]}
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            ";
                        }
                    }
                    else{
                        echo "
                            <h5 class='sb-txt-white sb-w-500'>
                                Não há serviços cadastrados pelo estabelecimento                              
                            </h5>
                        ";
                    }
                                 
                    // Fechamento trecho
                    echo " 
                                                                    <div>                                   
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='button-row d-flex mt-4 col-12'>
                                                                        <button class='btn sb-btn-secondary-default js-btn-prev sb-w-700' type='button' title='Prev'>
                                                                            Anterior
                                                                        </button>
                                                                        <button 
                                                                            class='btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto' 
                                                                            type='button' 
                                                                            title='Prev'
                                                                            id='btn-servico'
                                                                            disabled
                                                                        >
                                                                            Próximo
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>                                                 
                                                </div>
                                                <!--Confirmar Serviço-->
                                                <div class='multisteps-form__panel shadow p-4 rounded' data-animation='scaleIn'>
                                                    <h3 class='multisteps-form__title sb-txt-white sb-w-900'>
                                                        Confirmar serviço
                                                    </h3>
                                                    <div class='multisteps-form__content'>
                                                        <div class='mt-3 mb-3' >
                                                            <h5 class='multisteps-form__title sb-txt-white sb-w-500'>
                                                                Nome: {$_SESSION['nome']}
                                                            </h5>
                                                            <div id='confirmar-servico-content'></div>
                                                        </div>
                                                        <div class='button-row d-flex mt-4'>
                                                            <button class='btn sb-btn-secondary-default js-btn-prev sb-w-700' type='button' title='Prev'>
                                                                Anterior
                                                            </button>
                                                            <button class='btn sb-btn-green ml-auto sb-w-700' type='submit' title='Send'>
                                                                Agendar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";                   
                }
                else{
                    echo "
                        <script>
                            window.location.href = 'area_cliente.php'
                        </script>
                    ";    
                }
            }
            else{
                echo "
                    <script>
                        window.location.href = 'area_cliente.php'
                    </script>
                ";
            }
        ?>
    </div>  
</section>

