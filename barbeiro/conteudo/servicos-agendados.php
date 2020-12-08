<?php
$conn = mysqli_connect("localhost", "root", "", "dbtcc");
$select = ("SELECT * from agendamento WHERE barbearia='$_SESSION[barbearia_id]'");
$query = $conn->query($select);
$bar = mysqli_fetch_assoc($query);
print_r($bar);
    
?>
<div class="container-fluid pt-5 pb-5">
    <div class="profile-header">
        <h2>
            <fa-icon [icon]="faClock"></fa-icon> Serviços Agendados
        </h2>
    </div>
    <div class="profile-a pt-5" style="display: block; overflow: auto;">
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
               
            </tbody>
            
            
        </table>
    </div>
    
</div>
<script>
window.onload = addAgendamentos()
var agend = document.getElementById('agend')
function addAgendamentos(){
    const agend = document.getElementById('agend')
    console.log(agend.innerHTML)

    agend.innerHTML = `<tr>
                    <td>1</td>
                    <td>Rafael</td>
                    <td>25 R$</td>
                    <td>30 mim</td>
                    <td>Em aberto</td>
                    <td>Ações</td>
                </tr>`
}


</script>