setTimeout(() => {
    document.querySelectorAll('.alert').forEach(error => error.remove());
}, 10000);

CKEDITOR.replace( 'content' );

let firstname = document.getElementById("firstname");
let lastname = document.getElementById("lastname");
let pseudo = document.getElementById("pseudo");
let password = document.getElementById("password");
let formRegister = document.getElementById('register');
function validateForm()
{



    if (email.value !== "")
    {
        return true;
    }
    else {
        email.innerHTML = "Entrez votre mail"
        return false;
    }

    if (firstname.value !== "")
    {
        return true;
    }
    else {
        firstname.innerHTML = "Entrez votre prénom"
        return false;
    }

    if (lastname.value !== "")
    {
        return true;
    }
    else {
        lastname.innerHTML = "Entrez votre nom de famille"
        return false;
    }

    if (pseudo.value !== "")
    {
        return true;
    }
    else {
        pseudo.innerHTML = "Entrez un pseudonyme"
        return false;
    }

    if (password.value !== "")
    {
        return true;
    }
    else {
        password.innerHTML = "Entrez un mot de passe"
        return false;
    }
}

// check email
let email = document.getElementById("email");
let emailR = document.getElementById('email-repeat');

function mailVerify () {
    if(email.value !== emailR.value) {
        emailR.setCustomValidity('Les emails ne correspondent pas');
    }

    else {
        emailR.setCustomValidity('');
    }
}

// check password
let pass = document.getElementById('password');
let passR = document.getElementById('password-repeat');

function passwordVerify() {
    if (pass.value !== passR.value) {
        passR.setCustomValidity('Les mots de passes ne correspondent pas');
    }

    else {
        passR.setCustomValidity('');
    }
}
// button mail
email.addEventListener('change',passwordVerify);
emailR.addEventListener('keyup',passwordVerify);

// button password
pass.addEventListener('change',passwordVerify);
passR.addEventListener('keyup',passwordVerify);


