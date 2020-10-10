<section class="registro sb-bg-black sb-content">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 align-self-center mt-4 mb-4">
                <div class="card sb-card mb-3">
                    <div class="card-body">
                        <h4 class="sb-txt-white sb-text-md">
                            Crie sua conta 
                        </h4>

                        <form class="pt-3" id="form_registro">
                            <!-- campo de nome -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    type="text" 
                                    class="form-control sb-form-input" 
                                    id="registro_nome" 
                                    placeholder="Seu nome"
                                >
                                <ion-icon name="person-outline" id="icone_nome">
                                </ion-icon>
                            </div>

                            <!-- campo de telefone -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    type="text" 
                                    class="form-control sb-form-input maskTelefone" 
                                    id="registro_telefone" 
                                    placeholder="Telefone"
                                >
                                <ion-icon name="call-outline" id="icone_telefone">
                                </ion-icon>
                            </div>

                            <!-- campo de data nascimento -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    type="text" 
                                    class="form-control sb-form-input maskDataNascimento" 
                                    id="registro_data_nascimento" 
                                    placeholder="Data Nascimento"
                                >
                                <ion-icon name="calendar-outline" id="icone_data_nascimento">
                                </ion-icon>
                            </div>

                            <!-- campo de cpf -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    type="text" 
                                    class="form-control sb-form-input maskCPF" 
                                    id="registro_cpf" 
                                    placeholder="CPF"
                                >
                                <ion-icon name="card-outline" id="icone_cpf">
                                </ion-icon>
                            </div>

                            <!-- campo de email -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" 
                                    type="text" 
                                    class="form-control sb-form-input" 
                                    id="registro_email" 
                                    placeholder="E-mail"
                                >
                                <ion-icon name="mail-outline" id="icone_email">
                                </ion-icon>
                            </div>

                            <!-- campo de senha -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                    class="form-control sb-form-input" 
                                    id="registro_senha" 
                                    placeholder="Sua senha"
                                >
                                <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                            </div>

                            <!-- Confirmar de senha -->
                            <div class="form-group icone_dentro_input">
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                    class="form-control sb-form-input" 
                                    id="registro_confirmar_senha" 
                                    placeholder="Confirme sua senha"
                                >
                                <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                            </div>

                            <h6 class="sb-txt-white text-justify pt-2 pb-2">
                                Ao se registrar, você aceita 
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    termos de uso
                                </a> e a 
                                nossa 
                                <a href="#" class="sb-txt-secondary text-decoration-none">
                                    política de privacidade
                                </a>.
                            </h6>

                            <button 
                                type="submit"
                                class="btn fa-btn sb-btn-secondary sb-w-700 sb-full-width mt-2" 
                            >
                                Cadastrar
                            </button>

                            <div class="sb-grid">
                                <div class="sb-division-line"></div>
                                <h6 class="form-text sb-txt-white pt-3 pb-2">
                                    Ou 
                                </h6>
                                <div class="sb-division-line"></div>
                            </div>

                            <a 
                                href="#"
                                class="btn fa-btn sb-btn-secondary sb-w-700 sb-full-width mt-1" 
                            >
                                <i class="fa fa-google"></i>
                                <span class="ml-1">Google</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 align-self-center" id="banner-registro">
                <img src="./assets/images/back-registro.jpg" alt="registro" id="img-registro">
            </div>
        </div>
    </div>
</section>