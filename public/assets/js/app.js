setTimeout(() => {
    document.querySelectorAll('.alert').forEach(error => error.remove());
}, 6000);

CKEDITOR.replace( 'content' );

let firstname = document.getElementById("firstname");
let lastname = document.getElementById("lastname");
let pseudo = document.getElementById("pseudo");
let champ = document.getElementsByTagName("input")
let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{5,255})");
let email = document.getElementById("email");
let emailR = document.getElementById('email-repeat');
// input validation and verification
function inputValidate(champ, min, max, message) {
    champ.addEventListener('input', function () {
        if (champ.value.length < min || champ.value.length > max) {
            champ.style.border = '2rem solid red';
            champ.oninvalid = champ.setCustomValidity(message);
        }
        else {
            champ.style.border = '2rem solid green';
            champ.oninput = input.setCustomValidity("");
        }
    })
}
inputValidate(pseudo, 2, 25, 'Votre pseudo doit être entre 2 et 25 caractères.');
inputValidate(firstname, 2, 25, 'Votre prénom doit être entre 2 et 25 caractères.');
inputValidate(lastname, 2, 25, 'Votre nom doit être entre 2 et 25 caractères.');
inputValidate(email, 5, 150, 'Votre adresse email doit être entre 5 et 150 caractères.');

function validateForm() {
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

//check password and password-repeat is equal
function passwordVerify() {
    if (pass.value !== passR.value) {
        passR.style.border = '2PX solid red';
        passR.setCustomValidity('Les mots de passes ne correspondent pas');
    }
    else {
        passR.style.border = '2PX solid GREEN';
        passR.setCustomValidity('');

        //  testing the conformity of the password
        if (!strongRegex.test(passR.value)) {
            passR.style.border = '2rem solid red';
            passR.oninvalid = passR.setCustomValidity(
                'Le mot de passe doit être entre 5 et 255 caractères et comprendre une majuscule, un chiffre et un caractère spécial.'
            );
        }
        else {
            passR.style.border = '0.4rem solid green';
            passR.oninput = passR.setCustomValidity("");
        }
    }
}



// button mail
email.addEventListener('change',mailVerify);
emailR.addEventListener('keyup',mailVerify);

// button password
pass.addEventListener('change',passwordVerify);
passR.addEventListener('keyup',passwordVerify);
