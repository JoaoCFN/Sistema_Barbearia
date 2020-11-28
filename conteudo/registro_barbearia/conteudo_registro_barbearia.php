<section class="registro_barbearia sb-bg-black sb-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 align-self-center mt-2 mb-2">
                <div class="card sb-card mb-3">
                    <div class="card-body">
                        <h4 class="sb-txt-white sb-text-md">
                            Registre sua barbearia 
                        </h4>

                        <form class="pt-3" id="form_registro" method="POST" action="">
                            <h6 class="sb-txt-white sb-text-sm pb-2">
                                 Pessoal
                            </h6>

                            <!-- NOME COMPLETO e CPF -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-7">
                                    <!-- NOME -->
                                    <div>
                                        <!-- campo de nome -->
                                        <div class="form-group icone_dentro_input">
                                            <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                            <input 
                                                type="text" 
                                                class="form-control sb-form-input" 
                                                id="registro_nome" 
                                                placeholder="Nome completo"
                                                name="usuario"
                                            >
                                            <ion-icon name="person-outline" id="icone_nome">
                                            </ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <!-- campo de cpf -->
                                    <div class="form-group icone_dentro_input">
                                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                        <input 
                                            type="text" 
                                            class="form-control sb-form-input maskCPF" 
                                            id="registro_cpf" 
                                            placeholder="CPF"
                                            name="cpf"
                                        >
                                        <ion-icon name="card-outline" id="icone_cpf">
                                        </ion-icon>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- EMAIL -->
                            <div>
                                <!-- campo de email -->
                                <div class="form-group icone_dentro_input">
                                    <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                    <input 
                                        onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" 
                                        type="text" 
                                        class="form-control sb-form-input" 
                                        id="registro_email" 
                                        placeholder="E-mail"
                                        name="email"
                                    >
                                    <ion-icon name="mail-outline" id="icone_email">
                                    </ion-icon>
                                </div>
                            </div>
                            
                            <!-- SENHA E CONFIRMAR SENHA -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <!-- campo de senha -->
                                    <div class="form-group icone_dentro_input">
                                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                        <input 
                                            onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                            class="form-control sb-form-input" 
                                            id="registro_senha" 
                                            placeholder="Sua senha"
                                            name="senha"
                                        >
                                        <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <!-- Confirmar de senha -->
                                    <div class="form-group icone_dentro_input">
                                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                        <input 
                                            onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                            class="form-control sb-form-input" 
                                            id="registro_confirmar_senha" 
                                            placeholder="Confirme sua senha"
                                            name="confSenha"
                                        >
                                        <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <h6 class="sb-txt-white sb-text-sm pb-2">
                                 Estabelecimento
                            </h6>
                            <!-- NOME DA BARBEARIA E TELEFONE -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <!-- campo de nome da barbearia -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input" 
                                            id="registro_nome_barbearia" 
                                            placeholder="Nome da barbearia"
                                            name="nameBar"
                                        >
                                        <ion-icon name="home-outline" id="icone_nome_barbearia"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">                                    
                                    <!-- campo de telefone -->
                                    <div class="form-group icone_dentro_input">
                                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                        <input 
                                            type="text" 
                                            class="form-control sb-form-input maskTelefone" 
                                            id="registro_telefone" 
                                            placeholder="Telefone"
                                            name="telBar"
                                        >
                                        <ion-icon name="call-outline" id="icone_telefone">
                                        </ion-icon>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CEP e CNPJ -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <!-- campo de CEP -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input maskCEP" 
                                            id="registro_cep" 
                                            placeholder="CEP"
                                            name="cepBar"
                                        >
                                        <ion-icon name="location-outline" id="icone_cep"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <!-- Confirmar de CNPJ -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input maskCNPJ" 
                                            id="registro_cnpj" 
                                            placeholder="CNPJ"
                                            name="cnpjBar"
                                        >
                                        <ion-icon name="card-outline" id="icone_cnpj"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <!-- RUA, NÚMERO, BAIRRO -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                    <!-- campo de Rua -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input" 
                                            id="registro_rua" 
                                            placeholder="Rua"
                                            name="ruaBar"
                                        >
                                        <ion-icon name="map-outline" id="icone_rua"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <!-- campo de numero -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input" 
                                            id="registro_numero" 
                                            placeholder="Nº"
                                            name="nBar"
                                        >
                                        <ion-icon name="map-outline" id="icone_numero"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <!-- campo de bairro -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input" 
                                            id="registro_bairro" 
                                            placeholder="Bairro"
                                            name="bairroBar"
                                        >
                                        <ion-icon name="map-outline" id="icone_bairro"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <!-- CIDADE E UF -->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-8">
                                    <!-- campo de cidade -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input" 
                                            id="registro_cidade" 
                                            placeholder="Cidade"
                                            name="cidadeBar"
                                        >
                                        <ion-icon name="map-outline" id="icone_cidade"></ion-icon>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <!-- campo de estado -->
                                    <div class="form-group icone_dentro_input">
                                        <input 
                                            class="form-control sb-form-input maskUF" 
                                            id="registro_uf" 
                                            placeholder="UF"
                                            name="ufBar"
                                        >
                                        <ion-icon name="map-outline" id="icone_estado"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <!-- <h6 class="sb-txt-white text-justify pt-2 pb-2">
                                Ao se registrar, você aceita 
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    termos de uso
                                </a> e a 
                                nossa 
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    política de privacidade
                                </a>.
                            </h6> -->

                            <button 
                                type="submit"
                                class="btn fa-btn sb-btn-secondary sb-w-700 sb-full-width mt-2" 
                            >
                                Cadastrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 align-self-center" id="banner-registro-barbearia">
                <img src="./assets/images/back-registro.jpg" alt="registro" id="img-registro">
            </div>
        </div>
    </div>
</section>
<?php
    require_once "./classes/UsuBarbearia.php";
    $usuarioBar = new UsuBarbearia();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $usuarioBar->registrarUsuBarbearia($_POST);
        $_SESSION['sucess'] = 'Sucesso!!';
        //echo $_SESSION['sucess'];
        echo "<script>window.location.replace('./login.php')</script>";
        
        
    }else{
        
    }
?>
