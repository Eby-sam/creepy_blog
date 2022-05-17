<div class="container-form">
    <h1>Inscription</h1>

    <div id="form-register">
        <form action="/index.php?c=user&a=register" onsubmit="return validateForm()" method="post" name="formRegister" id="register">
            <div class="div-lab">
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div class="div-lab">
                <label for="firstname">Prenom :</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="div-lab">
                <label for="pseudo">pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>
            <div class="div-lab">
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="div-lab">
                <label for="email-repeat">E-mail repeat :</label>
                <input type="email" name="email-repeat" id="email-repeat" required>
            </div>
            <div class="div-lab">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="div-lab">
                <label for="password-repeat">Password repeat :</label>
                <input type="password" name="password-repeat" id="password-repeat" required>
            </div>
            <div class="div-lab button-inc">
                <input type="submit" value="Créer un compte" name="save" class="save">
            </div>

        </form>
    </div>
</div>
