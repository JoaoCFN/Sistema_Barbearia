
<div class="main mt-5 container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="profile-header">
                    <h4 class="ml-4">
                        <i class="fas fa-cut"></i> Perfil da Barbearia
                    </h4>
                </div>
                <div class="profile-a">
                    <form method="POST" action="" class="example-form">
                        <section class="example-section row">
                            <div class="col-md-7 div-sobre">
                                <a type="button">
                                    <h5>Sobre a barbearia
                                        <i class="fas fa-pencil-alt"></i>
                                    </h5>
                                </a>
                                <br>
                                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Ex. Tenho uma bela e requisitada barbearia." [required]="isEdit" rows="6"> <?php
                                echo $_SESSION['sobre_barber'];?> </textarea>
                                <button type="submit" class="btn btn-primary mt-5"> Salvar Alteração</button>
                            </div>
                            <hr>
                            <div class="mt-4 col-md-4 mr-5" style="text-align: center;">
                                <h2>Sua melhor foto
                                    <i class="fas fa-camera"></i>
                                </h2>
                                <div>
                                    <img class="img-thumbnail" width="400" src="assets\images\Cliente-sem-ft.png">
                                </div>
                                <button class="mt-3 mb-5 btn btn-primary" type="submit">
                                    Alterar imagem
                                </button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6  mb-5 ">
            <div class="profile-header">
                <h2>
                    <i class="fas fa-home"></i>DADOS GERAIS
                </h2>
            </div>
            <div class="profile-a">
                <form class="example-form">
                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-4" style="text-align: center;">
                            <label>Nome estabelecimento</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['nome_barbearia']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Usuário</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['nome_dono']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Email</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['email_dono']; ?>">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-4" style="text-align: center;">
                            <label>Estado</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['uf']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Cidade</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['cidade']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>CEP</label>
                            <input name="cep" class="form-control" maxlength="9" disabled placeholder="Ex. 00000-000" #cep value="<?php 
                            echo $_SESSION['cep']; ?>">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-8" style="text-align: center;">
                            <label>Endereço</label>
                            <input type="text" disabled class="form-control" value="<?php 
                            echo $_SESSION['bairro'].', '.$_SESSION['rua']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Número</label>
                            <input id="input" type="number" disabled class="form-control" value="<?php 
                            echo intVal($_SESSION['num_bar']);?>" />
                        </div>
                    </div>

                    <div style="text-align: end;">
                        <button id="editar" onclick="editarInfo();" type="button" class="btn btn-primary" style="width: 33%;">
                            Editar
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-6 mb-5">
            <div class="pr-0 mr-0">
                <div class="profile-header">
                    <h2>
                        <i class="fas fa-cogs"></i> DADOS OPERACIONAIS
                    </h2>
                </div>
                <div class="profile-a">
                    <form class="example-form">
                        <form>
                            <section class="example-section">
                                <a type="button" (click)="isEditing()">Dias de funcionamento:
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <div *ngFor="let item of dias" class="row">
                                    <div class="col-md-2">
                                        <mat-slide-toggle [disabled]="isEdit" [(ngModel)]="item.trabalha" [name]="item.dia" color="primary">{{item.dia}}
                                        </mat-slide-toggle>
                                    </div>
                                    <div class="col-md-3" style="text-align: center;">
                                        <div class="row">
                                            <div class="col-md" style="text-align: right;padding-top: 5px;">
                                                <label *ngIf="item.trabalha">Abre:</label>
                                            </div>
                                            <div class="col-md" style="text-align: left;">
                                                <input *ngIf="item.trabalha" type="time" value="<?php 
                            echo $_SESSION['horario_abertura']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="text-align: center;">
                                        <div class="row">
                                            <div class="col-md" style="text-align: right; padding-top: 5px;">
                                                <label *ngIf="item.trabalha">Fecha:</label>
                                            </div>
                                            <div class="col-md" style="text-align: left;">
                                                <input *ngIf="item.trabalha" type="time" value="<?php 
                            echo $_SESSION['horario_fechamento']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <div style="text-align: end;">
                            <button class="btn btn-primary" style="width: 33%;">
                                Aplicar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const edit = document.getElementById('editar')
    edit.type = "button"
    edit.innerHTML = "Editar"
function editarInfo(){
    var x = document.getElementsByTagName("input")
    
    if(edit.innerHTML == "Editar"){
        for (i = 0; i < x.length; i++) {
        x[i].disabled = false
        }
        edit.innerHTML = "Salvar"
        
    }
    else{
        edit.type = "submit"
        
    }
    
}

function enviarPost(){

}
</script>
<?php

// $conn = mysqli_connect("localhost", "root", "", "dbtcc");
// $update = "UPDATE barbearia SET sobre_barber='Teste sobre da barber', nome_dono='$_SESSION[nome_dono]', nome_barbearia='$_SESSION[nome_barbearia]', email_dono='$_SESSION[email_dono]', cidade='$_SESSION[cidade]', num_bar='$_SESSION[num_bar]', bairro='$_SESSION[bairro]', cep='$_SESSION[cep]', rua='$_SESSION[rua]' WHERE barbearia_id='$_SESSION[barbearia_id]'";
// $result = mysqli_query($conn, $update);
?>

