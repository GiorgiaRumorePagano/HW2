const hamburger = document.getElementById("ham");
const x = document.getElementById("x");
hamburger.addEventListener('click', OpenMobileMenu);
const mobile_menu = document.getElementById("mobile_menu");

function OpenMobileMenu() {
        mobile_menu.classList.remove('hidden')
        aperto = true;
        document.body.classList.add('no-scroll');
        x.addEventListener('click', CloseMobileMenu);
    }


function CloseMobileMenu(){
    mobile_menu.classList.add('hidden');
document.body.classList.remove('no-scroll');
    
}