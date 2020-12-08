<?php
$id = $_SESSION['barbearia_id'];
$conn = mysqli_connect("localhost", "root", "", "dbtcc");
$select = "SELECT * FROM barbearia WHERE barbearia_id  = $id";
$result = $conn->query($select);
$bar = mysqli_fetch_assoc($result);

?>
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
                    <form method="post" action="./minha-barbearia" class="example-form">
                        <section class="example-section row">
                            <div class="col-md-7 div-sobre">
                                <a type="button">
                                    <h5>Sobre a barbearia
                                        <i class="fas fa-pencil-alt"></i>
                                    </h5>
                                </a>
                                <br>
                                <textarea name="sobreBarber" class="form-control is-invalid" id="validationTextarea" placeholder="Ex. Tenho uma bela e requisitada barbearia." [required]="isEdit" rows="6"> <?php
                                                                                                                                                                                                                echo $bar['sobre_barber']; ?> </textarea>
                                <button name="sobre" type="submit" class="btn btn-primary mt-5"> Salvar Alteração</button>
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
                                <input style="visibility: hidden;" type="text" name="cep" value="<?php echo $bar['cep']; ?>">
                                <input style="visibility: hidden;" type="text" name="id" value="<?php echo $bar['barbearia_id']; ?>">
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
                <form method="post" action="./minha-barbearia" class="example-form">
                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-4" style="text-align: center;">
                            <label>Nome estabelecimento</label>
                            <input name="nome_barbearia" type="text" disabled class="form-control" value="<?php
                                                                                                            echo $bar['nome_barbearia']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Usuário</label>
                            <input name="nome_dono" type="text" disabled class="form-control" value="<?php
                                                                                                        echo $bar['nome_dono']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Email</label>
                            <input name="email_dono" type="text" disabled class="form-control" value="<?php
                                                                                                        echo $bar['email_dono']; ?>">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-4" style="text-align: center;">
                            <label>Estado</label>
                            <input name="uf" type="text" disabled class="form-control" value="<?php
                                                                                                echo $bar['uf']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Cidade</label>
                            <input name="cidade" type="text" disabled class="form-control" value="<?php
                                                                                                    echo $bar['cidade']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>CEP</label>
                            <input name="cep" class="form-control" maxlength="9" disabled placeholder="Ex. 00000-000" #cep value="<?php
                                                                                                                                    echo $bar['cep']; ?>">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-8" style="text-align: center;">
                            <label>Endereço</label>
                            <input name="bairro" type="text" disabled class="form-control" value="<?php
                                                                                                    echo $bar['bairro'] . ', ' . $bar['rua']; ?>">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Número</label>
                            <input name="number" id="input" type="number" disabled class="form-control" value="<?php
                                                                                                                echo intVal($bar['num_bar']); ?>" />
                        </div>
                    </div>
                    <input name="id" style=" visibility: hidden;" type="text" value="<?php echo $bar['barbearia_id'] ?>">

                    <div style="text-align: end;">
                        <button name="salvar" id="editar" onclick="editarInfo();" type="button" class="btn btn-primary" style="width: 33%;">
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
                <form method="post" action="./minha-barbearia" class="example-form">

                        <section class="example-section">
                            <a type="button">Dias de funcionamento:
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <div style="text-align: center;">
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left;">
                                                <h6 class="mt-3">Dias de Semana:</h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label>Abre:</label>
                                                            </div>
                                                            <div class="col-11" style="text-align: left;">
                                                                <input name="horario_abertura" type="time" value="<?php echo $bar['horario_abertura']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label>Fecha:</label>
                                                            </div>
                                                            <div class="col-11" style="text-align: left;">
                                                                <input name="horario_fechamento" style="text-align: left;" type="time" value="<?php echo $bar['horario_fechamento']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="text-align: left;">
                                                <h6 class="mt-3">Finais de Semana :</h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label>Abre:</label>
                                                            </div>
                                                            <div class="col-11" style="text-align: left;">
                                                                <input name="horario_abertura_final_semana" type="time" value="<?php echo $bar['horario_abertura_final_semana']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label>Fecha:</label>
                                                            </div>
                                                            <div class="col-11" style="text-align: left;">
                                                                <input name="horario_fechamento_final_semana" style="text-align: left;" type="time" value="<?php echo $bar['horario_fechamento_final_semana']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div style="text-align: end;">
                            <button value="<?php echo $bar['barbearia_id'] ?>" name="aplicar" class="mt-5 btn btn-primary" style="width: 33%;">
                                Aplicar
                            </button>
                        </div>
                        </section>
                        
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

    function editarInfo() {
        var x = document.getElementsByTagName("input")

        if (edit.innerHTML == "Editar") {
            for (i = 0; i < x.length; i++) {
                x[i].disabled = false
            }
            edit.innerHTML = "Salvar"

        } else {
            edit.setAttribute('type', 'submit')

        }

    }

    function enviarPost() {

    }
</script>
<?php

// $conn = mysqli_connect("localhost", "root", "", "dbtcc");
// $update = "UPDATE barbearia SET sobre_barber='Teste sobre da barber', nome_dono='$bar[nome_dono]', nome_barbearia='$bar[nome_barbearia]', email_dono='$bar[email_dono]', cidade='$bar[cidade]', num_bar='$bar[num_bar]', bairro='$bar[bairro]', cep='$bar[cep]', rua='$bar[rua]' WHERE barbearia_id='$bar[barbearia_id]'";
// $result = mysqli_query($conn, $update);
?>