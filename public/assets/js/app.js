setTimeout(() => {
    document.querySelectorAll('.alert').forEach(error => error.remove());
}, 5000);

CKEDITOR.replace( 'content' );

function validateForm()
{
    let email = document.getElementById("email");
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let pseudo = document.getElementById("pseudo");
    let password = document.getElementById("password");
    let formRegister = document.getElementById('register');
    if (document.formRegister.lastname.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre nom");
        return false;
    }
    if (document.formRegister.firstname.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre prénom");
        return false;
    }

    if (document.formRegister.email.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre mail");
        return false;
    }

    if (document.formRegister.pseudo.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre pseudo");
        return false;
    }

    if (document.formRegister.password.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre mot de passe");
        return false;
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

pass.addEventListener('change',passwordVerify);
passR.addEventListener('keyup',passwordVerify);


