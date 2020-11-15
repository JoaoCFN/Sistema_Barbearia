(function barbearia_form(){
    const data = new Date();
    /* 
    O mês do JS é contado de 0-11. Então para a lógica funcionar 
    corretamente buscando limitar o mês anterior, é preciso fazer
    o teste lógico abaixo
    */
    const mesAtual = data.getMonth();
    const mesInvalido = mesAtual == 0 ? 12: mesAtual;

    const diaAtual = data.getDate();

    // Data
    $('.datepicker').pickadate({
        formatSubmit: 'yyyy/mm/dd',
        hiddenPrefix: 'prefix__',
        hiddenSuffix: '__suffix',
        klass: {
            navPrev: 'picker__nav--next',
            navNext: 'picker__nav--prev',
        },
        min: new Date(2020, mesInvalido, diaAtual)
    })
})();

function handleButton(target){
    const btnAttribute = target.getAttribute("data-target-title");
    const btn = document.querySelector(`#${btnAttribute}`);
    
    if(target.value.length > 0){
        btn.removeAttribute("disabled");
    } 
    else{
        btn.setAttribute("disabled", "disabled");
    }
}
