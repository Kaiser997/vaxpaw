


document.addEventListener("DOMContentLoaded", function () {
    //se obtiene el boton por su id
    const numero = document.getElementById('numerousuario');
    const validador = document.getElementById('validador');

    // Agregar un listener al botón para manejar el evento de clic
    validador.addEventListener('click', function () {

        const valorinput= numero.value;              
        const numeroconvertido = parseInt(valorinput);
        
        if(numeroconvertido * 4 >= 4 ){
            alert("es mayor a " + numeroconvertido)
        }else{
            alert("es menor a 3")
        }

        document.body.style.fontSize = '20px';
    });

});

