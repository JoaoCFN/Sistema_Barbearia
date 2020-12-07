<div class="row pt-5" style="margin-right: 0px;margin-left: 0px;">
    <!-- Serviços cadastrados -->
    <div class="col-md-6 mt-5">
        <!-- <div class="profile-header">
            <h4 class="ml-3 pt-1"> 
            <i class="fas fa-cut"></i> Serviços Cadastrados
            </h4>
        </div>
        <div class="profile-a ">
            <form class="example-form">
                <div class="profile-a pt-5" style="display: block; overflow: auto;">
                    <table id="tabela_servicos_agendados" class="display">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Tempo</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rafael</td>
                                <td>25 R$</td>
                                <td>30 mim</td>
                                <td>Ações</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>
        </div> -->
    </div>

    <!-- Cadastrar Serviço -->
    <div class="col-md-6 mt-5">
        <div class="profile-header">
            <h5 class="ml-3 pt-1">
            <i class="fas fa-plus"></i> Cadastrar Serviço
            </h5>
        </div>
        <div class="profile-a ">
            <form class="example-form" method="POST" action="conteudo/inserir-servico/inserir-servico.php" style="text-align: left;">
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

