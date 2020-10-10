import Animate from "../Animate.js";

(function animacao_registro_barbearia(){
    // ANIMAÇÕES PÁGINA DE REGISTRO
    const animacao = new Animate();
    const card = document.querySelector(".sb-card");
    const imgRegistro = document.querySelector("#img-registro");
    animacao.setAnimationDown(imgRegistro, 200);
    animacao.setAnimationOpacity(card);

    window.addEventListener("load", () => {
        animacao.startAnimate(card);
        animacao.startAnimate(imgRegistro);
    })
})();