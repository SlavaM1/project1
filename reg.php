<html>
    <head>
    <title>Регистрация</title>
    </head>
    <body bgcolor="b3b3b3">
    <h2>Регистрация</h2>
    <form action="./save_user.php" method="post">
    <p>
    <label>Ваше имя:<br></label>
    <input name="imar" type="text" size="15" maxlength="15">
    </p>



<p>
    <label>Ваш логин *:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
<p>
    <label>Ваш пароль *:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

<p>
            <p>
              <label>Ваш E-mail    *:<br></label>
              <input name="email"    type="text" size="15" maxlength="100">
            </p>
            
    <input type="submit" name="submit" value="Зарегистрироваться">

</p></form>
<a href="login.php" class="btn btn-primary btn-lg btn-block">К странице входа</a>
    </body>
    </html>