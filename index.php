<body bgcolor="b3b3b3">
<?php
$title = "Главная страница"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
session_start();
?>

<?php
// require __DIR__ . '/user.php';
?>

<?php

// include_once './login.php';
if (isset($_SESSION['username']) && isset($_SESSION['rols']) == 'admin' ) {
    require __DIR__ . '/secret_page.php';
    echo '<div class="reg_btn">
    <form style="float:left; margin-left:520px; margin-top:0px;" action="logout.php">
<a>Вы вошли как:<B>Админ.</B><br> Вам доступны все функции.</a><br>

    
        <button >Выйти из аккаунта</button>
    </form>
</div>';
} elseif (isset($_SESSION['username']) && isset($_SESSION['ban']) == 'ban' ) { 
    echo '<div class="reg_btn">
    <form style="float:left; margin-left:520px; margin-top:0px;" action="logout.php">
      <a>Вы забанены:<B>.</B><br> Вам недоступны никакие функции.</a><br>
        <button >Выйти из аккаунта</button>
    </form>
</div>';
} elseif (isset($_SESSION['username']) ) {
  require __DIR__ . '/user1.php';
    echo '<div class="reg_btn">
    <form style="float:left; margin-left:520px; margin-top:0px;" action="logout.php">
      <a>Вы вошли как:<B> Пользователь.</B><br> Вам доступно: изменение и выборка.</a><br>
        <button >Выйти из аккаунта</button>
    </form>
</div>';


}

else {
    require __DIR__ . '/user.php';
    echo '<div class="reg_btn">
    <form style="float:left; margin-left:520px; margin-top:0px;" action="login.php">
     <a>Здравствуйте, <B> уважаемый Гость.</B><br> Вам доступно: выборка БД. Чтобы получить больше функций: зарегистрируйтесь или войдите.</a><br>
        <button>войти</button>
    </form>
</div>';
}

?>

<!-- <div class="reg_btn">
    <form action="login.php">
      <h1 align="center" >  <button>Login</button></h1>
    </form>
    <form action="logout.php">
        <button>Logout</button>
    </form>
</div> -->


<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
</body>