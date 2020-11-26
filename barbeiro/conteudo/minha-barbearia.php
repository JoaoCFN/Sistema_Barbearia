<div class="main mt-5 container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-5 mr-5 ml-5">
                <div class="profile-header">
                    <h2>
                    <i class="fas fa-cut"></i> Perfil da Barbearia
                    </h2>
                </div>
                <div class="profile-a">
                    <form class="example-form">
                        <form>
                            <section class="example-section row">
                                <div class="col-md-7">
                                    <a type="button">
                                        <h2>Sobre a barbearia
                                        <i class="fas fa-pencil-alt"></i>
                                        </h2>
                                    </a>
                                    <br>
                                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Ex. Tenho uma bela e requisitada barbearia." [required]="isEdit" rows="6"></textarea>
                                    <button type="button" class="btn btn-primary mt-5"> Salvar Alteração</button>
                                </div>

                                <div class="col-md-4 mr-5" style="text-align: center;">
                                    <h2>Sua melhor foto
                                    <i class="fas fa-camera"></i>
                                    </h2>
                                    <div>
                                        <img class="img-thumbnail" width="400" src="assets\images\Cliente-sem-ft.png">
                                    </div>

                                    <button class="mt-3 mb-5 btn btn-primary" type="button">
                                        Alterar imagem
                                    </button>
                                </div>
                            </section>
                        </form>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ml-5 mr-5  mb-5 ">
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
                            <input type="text" disabled class="form-control" value="Barbearia do seu Zé">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Usuário</label>
                            <input type="text" disabled class="form-control" value="ze_barber">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Email</label>
                            <input type="text" disabled class="form-control" value="ze_barber@gmail.com">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-4" style="text-align: center;">
                            <label>Estado</label>
                            <input type="text" disabled class="form-control" value="BA">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Cidade</label>
                            <input type="text" disabled class="form-control" value="Feira de Santana">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>CEP</label>
                            <input class="form-control" maxlength="9" disabled placeholder="Ex. 00000-000" #cep value="44051-682">
                        </div>
                    </div>

                    <div class="row pt-1 pb-1 mb-2">
                        <div class="col-md-8" style="text-align: center;">
                            <label>Endereço</label>
                            <input type="text" disabled class="form-control" value="George Americo, Rua É">
                        </div>

                        <div class="col-md-4" style="text-align: center;">
                            <label>Número</label>
                            <input type="number" disabled class="form-control" value="1997">
                        </div>
                    </div>

                    <div style="text-align: end;">
                        <button class="btn btn-primary" style="width: 33%;">
                            Editar
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-5 ml-5">
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
                                                <input *ngIf="item.trabalha" type="time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="text-align: center;">
                                        <div class="row">
                                            <div class="col-md" style="text-align: right; padding-top: 5px;">
                                                <label *ngIf="item.trabalha">Fecha:</label>
                                            </div>
                                            <div class="col-md" style="text-align: left;">
                                                <input *ngIf="item.trabalha" type="time">
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