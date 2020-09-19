class Animate {
    startAnimate(element, time = 1){
        element.style.opacity = 1;
        element.style.transform = `translate3d(0, 0, 0)`;
        element.style.transition = `${time}s`;
    }

    setAnimationUp(element, value){
        element.style.opacity = 0;
        element.style.transform = `translate3d(0, -${value}px, 0)`;
    }

    setAnimationDown(element, value){
        element.style.opacity = 0;
        element.style.transform = `translate3d(0, ${value}px, 0)`;
    }

    setAnimationRight(element, value){
        element.style.opacity = 0;
        element.style.transform = `translate3d(-${value}px, 0, 0)`;
    }

    setAnimationLeft(element, value){
        element.style.opacity = 0;
        element.style.transform = `translate3d(${value}px, 0, 0)`;
    }

    setCustomAnimation(element, x, y, z = 0){
        element.style.opacity = 0;
        element.style.transform = `translate3d(${x}px, ${y}px, ${z}px)`;
    }   

    setAnimationWrite(element){
        let arrayText = element.innerHTML.split("");
        element.innerHTML = ``;
        arrayText.forEach((letra, i) => {
            setTimeout(() => element.innerHTML += letra, 75*i);
        })
    }

    setAnimationOpacity(element){
        element.style.opacity = 0;
    }
}

export default Animate;