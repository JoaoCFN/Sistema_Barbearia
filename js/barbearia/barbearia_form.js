// Data
$('.datepicker').pickadate({
  formatSubmit: 'yyyy/mm/dd',
  hiddenPrefix: 'prefix__',
  hiddenSuffix: '__suffix'
})

function ativarBtn(e){
    const btnAttribute = e.getAttribute("data-target-title");
    const btn = document.querySelector(`#${btnAttribute}`);
    // console.log(e.value);
    if(e.value.length > 0){
        btn.removeAttribute("disabled");
    } 
    else{
        btn.setAttribute("disabled", "disabled");
    }
}
