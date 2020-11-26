<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a routerLinkActive="active" class="navbar-brand mr-5 pr-5" routerLink="dashboard"> <img src="../barbeiro/assets/images/logo-invertida.png" width="100px" alt="logo" class="logo" /></a>
    <button aria-controls="dropdown-basic" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="mx-auto collapse navbar-collapse" id="navbarText">
        <ul id="navbar-collapse" class="navbar-nav mr-auto">
            <li class="nav-Dashboard nav-item itemNav">
                <a routerLink="dashboard" class="nav-link">
                <i class="fas fa-eye"></i> Visão Geral
                </a>
            </li>
            <li routerLinkActive="active" class="nav-item">
                <a routerLink="/minha-barbearia" class="nav-link itemNav">
                <i class="fas fa-cut"></i> Minha barbearia
                </a>
            </li>
            <li routerLinkActive="active" class="nav-item">
                <a routerLink="/servicos-agendados" class="nav-link itemNav" href="#">
                <i class="fas fa-clock"></i> Serviços Agendados
                </a>
            </li>
            <li routerLinkActive="active" class="nav-item">
                <a routerLink="/cadastrar-servicos" class="nav-link itemNav" href="#">
                <i class="fas fa-plus"></i> Cadastrar Serviços
                </a>
            </li>
        </ul>


        <span class="navbar-text">
      <a class="nav-link itemNav" href="#" style="font-size: 16pt;">
      <i class="fas fa-sign-out-alt"></i>
      </a>
    </span>
    </div>

</nav>
