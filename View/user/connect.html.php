<div class="container-form">
    <div class="title">
        <h1>CONNEXION</h1>
    </div>


    <div id="form-login">
        <form action="/index.php?c=user&a=connect" method="post" id="login">
            <div class="labConnect">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="labConnect">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="labConnect">
                <input type="submit" value="Se connecter" name="save" class="save">
            </div>
        </form>
    </div>
</div>
