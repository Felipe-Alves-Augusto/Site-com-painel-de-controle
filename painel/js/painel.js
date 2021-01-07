
let btn_menu = document.querySelector('.menu-btn');
let sideBar = document.querySelector('.lado');
console.log(sideBar);

btn_menu.addEventListener('click',()=>{

    

    if(sideBar.classList.contains('show')){

        sideBar.classList.add('hide');
        sideBar.classList.remove('show');

    }else{
        sideBar.classList.add('show');
        sideBar.classList.remove('hide');
    }

});


