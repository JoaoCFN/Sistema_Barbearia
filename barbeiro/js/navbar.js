$(document).ready(function() {
    setarActive($('body').attr('class').split(' ')[0])
})

function setarActive(classe) {
    switch (classe) {
        case 'dashboard':
            $('.nav-Dashboard').attr('class', 'active nav-item nav-Dashboard')
            break
        case 'minha-barbearia':
            $('.nav-Minha-Barbearia').attr('class', 'active nav-item nav-Minha-Barbearia')
            break
        case 'servicos-agendados':
            $('.nav-Servicos-agendados').attr('class', 'active nav-item nav-Servicos-agendados')
            break
        case 'cadastrar-servicos':
            $('.nav-Cadastrar-servicos').attr('class', 'active nav-item nav-Cadastrar-servicos')
            break
        default:
            break;
    }
}