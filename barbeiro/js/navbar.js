$(document).ready(function() {
    setarActive($('body').attr('class').split(' ')[0])
})

function setarActive(classe) {
    switch (classe) {
        case 'dashboard':
            $('.nav-Dashboard').attr('class', 'active nav-item nav-Dashboard')
            break
        case 'my-barber':
            $('.nav-my-barber').attr('class', 'active nav-item nav-Casos mr-5')
            break
        case 'relatorio':
            $('.nav-Relatorio').attr('class', 'active nav-item nav-Relatorio nav-li  mr-5')
            break

        default:
            break;
    }
}