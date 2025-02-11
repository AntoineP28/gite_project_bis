const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

function masquerNotification(){
    document.getElementById("zoneDeNotification").innerHTML="";
}

window.setTimeout(masquerNotification, 3000);