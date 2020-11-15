// Data
$('.datepicker').pickadate({
    formatSubmit: 'yyyy/mm/dd',
    hiddenPrefix: 'prefix__',
    hiddenSuffix: '__suffix',
    klass: {
        navPrev: 'picker__nav--next',
        navNext: 'picker__nav--prev',
    }
})

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
