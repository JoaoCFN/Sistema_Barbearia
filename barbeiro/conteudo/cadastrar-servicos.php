<div class="row pt-5" style="margin-right: 0px;margin-left: 0px;">
    <!-- Serviços cadastrados -->
    <div class="col-md-6 mt-4 mb-5">
        <div class="profile-header">
            <h4 class="ml-3 pt-1"> 
            <i class="fas fa-cut"></i> Serviços Cadastrados
            </h4>
        </div>
        <div class="profile-a">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço (R$)</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            include "../config/config.php";

                            $servicos = $mysqli->query("CALL PROC_SEL_SERVICOS('{$_SESSION["barbearia_id"]}')");
                            if($servicos->num_rows > 0){
                                while($rowServico =  $servicos->fetch_assoc()){
                                    echo "
                                        <tr>
                                            <th scope='row'>{$rowServico["id_servico"]}</th>
                                            <td>{$rowServico["nome"]}</td>
                                            <td>{$rowServico["preco"]}</td>
                                            <td>
                                                <a 
                                                    href='conteudo/servico/deletar-servico.php?id={$rowServico["id_servico"]}' 
                                                    class='btn btn-danger deletar-servico'
                                                >
                                                    <i class='fa fa-trash'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                            else{
                                echo "
                                    <h5 class='sb-txt-primary sb-w-500 mb-3'>
                                        Não há serviços cadastrados
                                    </h5>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>

    <!-- Cadastrar Serviço -->
    <div class="col-md-6 mt-4 mb-5">
        <div class="profile-header">
            <h4 class="ml-3 pt-1">
            <i class="fas fa-plus"></i> Cadastrar Serviço
            </h4>
        </div>
        <div class="profile-a ">
            <form class="example-form" method="POST" action="conteudo/servico/inserir-servico.php" style="text-align: left;">
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Nome do Serviço:
                        </label>
                        <input 
                            type="text" 
                            class="form-control"
                            name="nome_servico"
                        >
                    </div>

                    <div class="col-md-6">
                        <label>
                            Valor:
                        </label>
                        <input 
                            type="number" 
                            class="form-control"
                            name="valor_servico"
                        >
                    </div>
                </div>
                <button 
                    class="btn btn-primary mt-4"
                    name="adicionar_servico"
                >
                    <i class="fas fa-plus mr-1"></i> 
                    <span>Adicionar Serviço</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/servico/servico.js"></script>
