<?php
$conn = mysqli_connect("localhost", "root", "", "dbtcc");
$select = ("SELECT * from agendamento WHERE barbearia='$_SESSION[barbearia_id]'");
$query = $conn->query($select);
<<<<<<< HEAD
=======
$bar = mysqli_fetch_assoc($query);
print_r($bar);
    
>>>>>>> parent of d932fa1... Revert "."
?>
<div class="container-fluid pt-5 pb-5">
    <div class="profile-header">
        <h2>
            <fa-icon [icon]="faClock"></fa-icon> Serviços Agendados
        </h2>
    </div>
    <div class="profile-a pt-5" style="display: block; overflow: auto;">
<<<<<<< HEAD
        <table style="text-align: center;" id="tabela_servicos_agendados" class="display">
            <div>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Data criação</th>
                        <th>Data agendamento</th>
                        <th>Horario agendamento</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
            </div>
            <tbody id="agend">
                <?php
                while ($dados = mysqli_fetch_assoc($query)) {
                //print_r($dados);
                    echo ('<br>');
                    $usu = $dados['usuario'];
                    $user = "SELECT nome FROM user where user_id = '$usu'";
                    $usu_query = $conn->query($user);
                    $usuario = mysqli_fetch_assoc($usu_query);
                    #print_r($usuario)
                ?>
                    <tr>
                        <td><?php echo $dados['id_agendamento'] ?></td>
                        <td><?php echo date('Y/m/d', strtotime($dados['data_criacao'])) ?></td>
                        <td><?php echo date('Y/m/d', strtotime($dados['data_agendamento'])) ?></td>
                        <td><?php echo $dados['horario_agendamento'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $dados['valor_total'] ?>R$</td>
                        <?php if (strtolower($dados['status']) == 'p') {
                        ?>
                            <td>Pendente</td>
                            <td><button data-toggle="modal" data-target="#modal<?php echo $dados['id_agendamento'] ?>" class="btn btn-success">
                                    <i class="fas fa-check"></i></button></td>
                        <?php
                        } elseif (strtolower($dados['status']) == 'f') {
                        ?>
                            <td>Finalizado</td>
                            <td>#</td>
                        <?php
                        } else {
                            echo ('<td>Cancelado</td>');
                        } ?>
                    </tr>

                <?php

                }
                ?>
=======
        <table id="tabela_servicos_agendados" class="display">
        <div>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Data criação</th>
                    <th>Data agendamento</th>
                    <th>Horario agendamento</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Tempo</th>
                    <th>Status</th>
                    <th>#</th>
                </tr>
            </thead>
            </div>
            <tbody id="agend">
                <?php 
$dados = mysqli_fetch_all($query);

                ?>
               
>>>>>>> parent of d932fa1... Revert "."
            </tbody>
        </table>
    </div>
</div>

<?php
$select = ("SELECT id_agendamento from agendamento WHERE barbearia='$_SESSION[barbearia_id]'");
$query = $conn->query($select);
while ($dados = mysqli_fetch_assoc($query)) {
?>
    <div class="modal fade" id="modal<?php echo $dados['id_agendamento'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deseja finalizar o serviço?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form method="post" action="./servicos-agendados">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button name="gg" value="<?php echo $dados['id_agendamento'] ?>" type="submit" class="btn btn-success">Finalizar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php
    #print_r($dados);
    #echo ('<br>');
}
?>