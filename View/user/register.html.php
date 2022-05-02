<div class="container-form">
    <h1>Inscription</h1>

    <div id="form-register">
        <form action="/index.php?c=user&a=register" onsubmit="return validateForm()" method="post" name="formRegister" id="register">
            <div class="div-lab">
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div class="div-lab">
                <label for="firstname">Prenom :</label>
                <input type="text" name="firstname" id="firstname">
            </div>
            <div class="div-lab">
                <label for="pseudo">pseudo :</label>
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <div class="div-lab">
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="div-lab">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="div-lab">
                <label for="password-repeat">Password repeat :</label>
                <input type="password" name="password-repeat" id="password-repeat">
            </div>
            <div class="div-lab button-inc">
                <input type="submit" value="Créer un compte" name="save" class="save">
            </div>

        </form>
    </div>
</div>
