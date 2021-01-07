
let error = document.getElementById('error');
let sucess = document.getElementById('sucess');
let email = document.getElementById('email')
let formulario = document.getElementById('form');
let closer = document.getElementById('close');



 /* VALIDAÇÃO DA PAGINA HOME */

formulario.addEventListener('submit', (e)=>{

    if(email.value == ""){

       e.preventDefault();
       error.style.opacity = '1';
       email.style.border = '2px solid red';

    } else{

        
        sucess.style.opacity = '1';
        error.style.opacity = '0';
        email.style.border = '0';


    }
   
})


closer.addEventListener('click', function(){


    sucess.style.display = 'none';

})

openMenu();

/* EFEITO DO MENU MOBILE */ 

function openMenu(){

    let menuButton = document.querySelector('.logo-mobile');
    let menuShow = document.querySelector('.menu-mobile');

    menuButton.addEventListener('click', function(){

        if(menuShow.classList.contains('hide')){

            menuShow.classList.add('show');
            menuShow.classList.remove('hide');
        } else{

            menuShow.classList.add('hide');
            menuShow.classList.remove('show');
        }


    })

}

/*
let menu = document.querySelector('.menu-mobile');
let logo = document.querySelector('.logo-mobile');

menu.classList.add('hide');

logo.addEventListener('click',()=>{

    menu.classList.remove('hide');
    menu.classList.add('animate__animated', 'animate__lightSpeedInLeft');
});
*/





