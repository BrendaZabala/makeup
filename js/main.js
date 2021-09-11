document.addEventListener('DOMContentLoaded', function () {

    const burgerMenuBtn = document.querySelector("#burger-menu-button");
    const menuItems = document.querySelectorAll(".menu-item");

    burgerMenuBtn.addEventListener("click", function () {
        document.body.classList.toggle("mobile-menu-active");
    });

    menuItems.forEach(function (menuItem) {
        menuItem.addEventListener("click", function () {
            document.body.classList.remove("mobile-menu-active");
        })
    });

    window.onscroll = function(){
        if(document.documentElement.scrollTop > 100){
            document.querySelector('.go-top-container').classList.add('show');
        } else {
            document.querySelector('.go-top-container').classList.remove('show');
        }
    }

    document.querySelector('.go-top-container').addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    const button = document.querySelectorAll(".boton-fav");
    
    button.forEach(btn => {
        btn.addEventListener("click", function () {
        btn.classList.add("boton-fav-modif"); 
    });

        btn.addEventListener("dblclick", function () {
        btn.classList.remove("boton-fav-modif"); 
    });
    });
        
});