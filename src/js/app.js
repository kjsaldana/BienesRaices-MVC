document.addEventListener('DOMContentLoaded', function() {
    mostrarBarra()
    modoOscuro()
    modoContacto()
})

function mostrarBarra() {
const barra = document.querySelector('.icono-menu');
const navegacion = document.querySelector('.navegacion');

barra.addEventListener('click', function () {
    navegacion.classList.toggle('on');
})
}
// function modoOscuro() {
//     const boton = document.querySelector('.botonDM');
//     const body = document.querySelector('body');

//     // Verificar si el usuario ya guardó una preferencia en localStorage
//     const preferenciaGuardada = localStorage.getItem('modoOscuro');

//     if (preferenciaGuardada === 'activado') {
//         body.classList.add('dark-mode');
//     } else if (preferenciaGuardada === 'desactivado') {
//         body.classList.remove('dark-mode');
//     } else {
//         // Si no hay preferencia, seguir la configuración del sistema
//         const darkmode = window.matchMedia('(prefers-color-scheme: dark)');
//         if (darkmode.matches) {
//             body.classList.add('dark-mode');
//         }
//     }

//     // Evento para cambiar el modo manualmente
//     boton.addEventListener('click', (e) => {
//         e.preventDefault();
//         body.classList.toggle('dark-mode');

//         // Guardar la preferencia del usuario en localStorage
//         if (body.classList.contains('dark-mode')) {
//             localStorage.setItem('modoOscuro', 'activado');
//         } else {
//             localStorage.setItem('modoOscuro', 'desactivado');
//         }
//     });
// }

// function modoOscuro() {
//     const boton = document.querySelector('.botonDM')
//     const body = document.querySelector('body')

//     if (localStorage.getItem('modoOscuro') === 'activado') {
//         body.classList.add('dark-mode');
//     }

//     boton.addEventListener('click', e=>{
//         e.preventDefault()
//         body.classList.toggle('dark-mode')

//         if (body.classList.contains('dark-mode')) {
//             localStorage.setItem('modoOscuro', 'activado');
//         } else {
//             localStorage.setItem('modoOscuro', 'desactivado');
//         }
//     })
// }

// Primer modo-------------------
// function modoOscuro() {
//     const boton = document.querySelector('.botonDM')
//     const body = document.querySelector('body')

//     boton.addEventListener('click', e=>{
//         e.preventDefault()
//         body.classList.toggle('dark-mode')
//     })

//     const darkmode = window.matchMedia('(prefers-color-scheme: dark)')
//     console.log(darkmode);

//     if (darkmode.matches === true) {
//         body.classList.add('dark-mode')
//     }else {
//         body.classList.remove('dark-mode')
//     }
// }

function modoOscuro() {
    const boton = document.querySelector('.botonDM')
    const body = document.querySelector('body')

    if (localStorage.getItem('modoOscuro') === 'activado') {
        body.classList.add('dark-mode');
    }

    boton.addEventListener('click', e=>{
        e.preventDefault()
        body.classList.toggle('dark-mode')

                if (body.classList.contains('dark-mode')) {
            localStorage.setItem('modoOscuro', 'activado')
        } else {
            localStorage.setItem('modoOscuro', 'desactivado')
        }
    })
}

function modoContacto(){
    const inputMovil = document.querySelectorAll('[name="contacto[contacto]"]')
    const contactoMovil = document.querySelector('.contacto-movil')
    const contactoEmail = document.querySelector('.contacto-email')

    inputMovil.forEach(input => {input.addEventListener('click', e => {
        if (e.target.id === 'email-radio') {
            contactoEmail.classList.remove('oculto')
            contactoMovil.classList.add('oculto')
        }else {
            contactoMovil.classList.remove('oculto')
            contactoEmail.classList.add('oculto')
        }
    })});
}

window.onload = () => {
    const aviso = document.querySelectorAll('.aviso')
    setTimeout(() => {
        aviso.forEach(aviso => aviso.style.display = 'none')    
    }, 3000);
}