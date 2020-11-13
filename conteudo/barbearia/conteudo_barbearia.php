<section class="gap-to-menu barbearia">
    <picture class="image" alt="Imagem sessao 1">
        <source media="(max-width: 700px)" srcset="assets/images/agende-servico-mobile.jpg">
        <img 
            src="assets/images/agende-servico.jpg" 
            alt="Agende seu serviço"
        />
    </picture>
    
    <div class="container">
        <button class="btn-whatsapp btn-position-fixed">
            <a href="https://api.whatsapp.com/send?phone=5575988383174" target="_blank">
                <i class="fa fa-whatsapp"></i>
            </a>
        </button>

        <!-- Informações -->
        <div class="informacoes">
            <div class="row">
                <div class="col-md-6 col-sm-12 align-self-center sb-mt-5" id="nome-barbearia">
                    <h3 class="sb-txt-secondary sb-w-700">  
                        Nome da Barbearia
                    </h3>
                </div> 
                <div class="col-md-6 col-sm-12 align-self-center sb-mt-5">
                    <div class="status-fechado sb-txt-black sb-w-700 text-center sb-float-right" id="status">
                        Fechado
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12 align-self-center mt-2">
                    <p class="sb-w-500 sb-txt-white">
                        <i class="fa fa-phone"></i>
                        <span class="ml-1">(75) 98888-7777</span>
                    </p>  

                    <p class="sb-w-500 sb-txt-white">
                        <i class="fa fa-map-marker"></i>
                        <span class="ml-1">
                            Rua exemplo | Nº 127 | George Américo | Feira de Santana
                        </span>
                    </p>   
                    
                </div> 
                <div class="col-md-4 col-sm-12 sb-mt-2">
                    <p class="sb-w-500 sb-txt-white sb-float-right">
                        <i class="fa fa-clock-o"></i>
                        <span class="ml-1">8H - 18H</span>
                    </p>    
                </div> 
            </div>
        </div>


        <div class="agendamento mt-5">
            <!--PEN CONTENT     -->
            <div class="content">
                <!--content inner-->
                <div class="content__inner">
                    <div class="container">
                        <div class="container overflow-hidden">
                            <!--multisteps-form-->
                            <div class="multisteps-form mt-1">
                                <!--progress bar-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                        <div class="multisteps-form__progress">
                                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info" disabled>
                                                Dia
                                            </button>

                                            <button class="multisteps-form__progress-btn" type="button" title="Address" disabled>
                                                Horário
                                            </button>

                                            <button class="multisteps-form__progress-btn" type="button" title="Order Info" disabled>
                                                Serviço
                                            </button>

                                            <button class="multisteps-form__progress-btn" type="button" title="Comments" disabled>
                                                Confirmação
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!--form panels-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 m-auto">
                                        <form class="multisteps-form__form">
                                            <!--Dia-->
                                            <div class="multisteps-form__panel shadow p-4 rounded js-active" data-animation="scaleIn">
                                                <h3 class="multisteps-form__title sb-txt-white sb-w-900">
                                                    Escolha o dia desejado
                                                </h3>
                                                <div class="multisteps-form__content">
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="First Name"/>
                                                        </div>
                                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="Last Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="Login"/>
                                                        </div>
                                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control" type="email" placeholder="Email"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control" type="password" placeholder="Password"/>
                                                        </div>
                                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control" type="password" placeholder="Repeat Password"/>
                                                        </div>
                                                    </div>
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto" type="button" title="Prev">
                                                            Próximo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Horário-->
                                            <div class="multisteps-form__panel shadow p-4 rounded" data-animation="scaleIn">
                                                <h3 class="multisteps-form__title sb-txt-white sb-w-900">
                                                    Escolha o horário desejado
                                                </h3>
                                                <div class="multisteps-form__content">
                                                    <div class="form-row mt-4">
                                                        <div class="col">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="Address 1"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="Address 2"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="City"/>
                                                        </div>
                                                        <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                        <select class="multisteps-form__select form-control">
                                                            <option selected="selected">State...</option>
                                                            <option>...</option>
                                                        </select>
                                                        </div>
                                                        <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control" type="text" placeholder="Zip"/>
                                                        </div>
                                                    </div>
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn sb-btn-secondary-default js-btn-prev sb-w-700" type="button" title="Prev">
                                                            Anterior
                                                        </button>
                                                        <button class="btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto" type="button" title="Prev">
                                                            Próximo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Serviço-->
                                            <div class="multisteps-form__panel shadow p-4 rounded" data-animation="scaleIn">
                                                <h3 class="multisteps-form__title sb-txt-white sb-w-900">
                                                    Informe o serviço desejado
                                                </h3>
                                                <div class="multisteps-form__content">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 mt-4">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">
                                                                <h5 class="card-title">Item Title</h5>
                                                                <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mt-4">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">
                                                                <h5 class="card-title">Item Title</h5>
                                                                <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="button-row d-flex mt-4 col-12">

                                                            <button class="btn sb-btn-secondary-default js-btn-prev sb-w-700" type="button" title="Prev">
                                                                Anterior
                                                            </button>
                                                            <button class="btn sb-btn-secondary-default js-btn-next sb-w-700 ml-auto" type="button" title="Prev">
                                                                Próximo
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--single form panel-->
                                            <div class="multisteps-form__panel shadow p-4 rounded" data-animation="scaleIn">
                                                <h3 class="multisteps-form__title sb-txt-white sb-w-900">
                                                    Confirmar serviço
                                                </h3>
                                                <div class="multisteps-form__content">
                                                    <div class="mt-3 mb-3">
                                                        <h5 class="multisteps-form__title sb-txt-white sb-w-500">
                                                            Nome: Teste
                                                        </h5>
                                                        <h5 class="multisteps-form__title sb-txt-white sb-w-500">
                                                            Data: 01/01/2021
                                                        </h5>
                                                        <h5 class="multisteps-form__title sb-txt-white sb-w-500">
                                                            Horário: 09H30
                                                        </h5>
                                                        <h5 class="multisteps-form__title sb-txt-white sb-w-500">
                                                            Serviço: Corte de Cabelo
                                                        </h5>
                                                    </div>
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn sb-btn-secondary-default js-btn-prev sb-w-700" type="button" title="Prev">
                                                            Anterior
                                                        </button>
                                                        <button class="btn sb-btn-green ml-auto sb-w-700" type="button" title="Send">
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
            </div>
        </div>
</section>

