const btnToggle = document.getElementById('toggleBtn');
const menu = document.getElementById('menu');

btnToggle.addEventListener('click', () =>{
    menu.classList.toggle('test');
})



let email = document.getElementById('ID_email');
let password = document.getElementById('ID_password');
let containerMsgEmail = document.getElementById('ID_msgEmail');
let containerMsgpassword = document.getElementById('ID_msgPassword');
let btnSubmit = document.getElementById('ID_submit');

let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

let msgEmail = document.createElement('p');
msgEmail.setAttribute('class', 'email_verify');

let msgPassword = document.createElement('p');
msgPassword.setAttribute('class', 'password_verify');


email.addEventListener('input', checkEmail);

function checkEmail(){

    containerMsgEmail.appendChild(msgEmail);

    if (email.value.match(emailPattern)) {
        msgEmail.textContent = 'Email Valide';
        btnSubmit.disabled = false;
    }else{
        msgEmail.textContent = 'Email Invalide';
        btnSubmit.disabled = true;
    }

}

password.addEventListener('input', checkPassword);

function checkPassword(){

    containerMsgpassword.appendChild(msgPassword);

    if (password.value.length < 7) {
        msgPassword.textContent = "Mot de passe trop court";
    }else{
        msgPassword.textContent = "Mot de passe correct";
    }
}

