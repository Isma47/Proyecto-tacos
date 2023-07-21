//variables

//modal y menu hamburguesa
const modal = document.querySelector('.modal-menu');
const cerrarModal = document.querySelector('.cerrar-modal');
const iconHamburguesa = document.querySelector('.header-hamburguesa');

/*//formularios
const formulario = document.querySelector('.formulario');
const inputs = document.querySelectorAll('input:not([type="submit"])');
const selectOption = document.querySelectorAll('#select');

*/
//eventos

//evt del menu ha,burguesa y modal
iconHamburguesa.addEventListener('click', mostrarModal);
cerrarModal.addEventListener('click', quitarModal);
/*
//evt de formulario
formulario.addEventListener('submit', comprobarForm);

///CLASS
class UI {
    mensajeFormulario(mensaje, tipo) {
        const errores = document.querySelector('#errores')
        if(tipo === 'error') {
            const error = document.createElement('P');
            error.textContent = mensaje;

            errores.appendChild(error);

            setTimeout(() => {
               error.remove(); 
            }, 4000);
        }
    }
}

const ui = new UI();
*/
//funciones

///MENU HAMBURGUESA CON MODAL
function mostrarModal() {
    modal.classList.toggle('mostrar-modal');
}
function quitarModal() {
    modal.classList.toggle('mostrar-modal');
}



//VALIDACION DE FORMULARIO PRINCIPAL
/*
function comprobarForm(e) {
    
    borraHTML();

    inputs.forEach(input => {
        if (input.value === '') {
            const inputError = input.name;
           ui.mensajeFormulario(`Debes de poner ${inputError}`, 'error');
        }
    })

    selectOption.forEach(option => {
        if(option.value === ''){
            ui.mensajeFormulario(`Debes de poner una ${option.name}`, 'error')
        }
    })
}


//limpiar html
const errores = document.querySelector('#errores')

function borraHTML(){
    while (errores.hasChildNodes()) {
        errores.removeChild(errores.firstChild);
    }    
}

*/