let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#user-btn').onclick = () =>{
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}


window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}