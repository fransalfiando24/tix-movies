// Navbar
const menuClick = document.querySelector(".menu input");
const navUl = document.querySelector("nav ul");
 menuClick.addEventListener('click',function () {
     navUl.classList.toggle('slide');
 });


window.addEventListener('scroll', function(){
    const nav = document.querySelector("nav");
    let windowPosition = window.scrollY > 5;
    nav.classList.toggle('scrolling-active', windowPosition);    

    const effect = document.querySelector(".nowPlayingMovies .effect");
    
    if(window.scrollY >= 350) {
        effect.style.opacity = '1';
        effect.style.transform = 'translateY(0px)';
        effect.style.transition = '.7s ease-in-out';
    }
    
    else{
        effect.style.opacity = '0';
        effect.style.transform = 'translateY(20px)';
    }

    const effect2 = document.querySelector(".comingSoonMovies .effect2");
    if(window.scrollY >= 905) {
        effect2.style.opacity = '1';
        effect2.style.transform = 'translateY(0px)';
        effect2.style.transition = '.7s ease-in-out';
    }
    else{
        effect2.style.opacity = '0';
        effect2.style.transform = 'translateY(20px)';
    }
});





// Background Jumbotron
let i = 0;
const jumbotron = document.querySelector('.jumbotron');
const image = ['url("background/1.jpg")','url("background/2.jpg")','url("background/3.jpg")','url("background/4.jpg")'];
    
function changeImage(){
    jumbotron.style.backgroundImage = image[i];
    
    if( i < image.length - 1){
        i++;
    }
    else{
        i=0;
    }

    setTimeout("changeImage()", 4000);
}

window.onload = changeImage;


// // Seat 
// const seatInput = document.querySelector('.ticketing-col input')
// const seat = document.querySelectorAll('.ticketing-row');
// seatInput.addEventListener('click', function(){
//     seat.classList.add('seatacive');
// })




