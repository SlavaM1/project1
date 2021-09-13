<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if    (isset($_POST['email'])) { $to = $_POST['email']; if ($to == '') {    unset($to);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if (isset($_POST['imar'])) { $imar=$_POST['imar']; if ($imar =='') { unset($imar);} }
 if    (empty($imar) or empty($login) or empty($password) or empty($code) or empty($to)) 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password) or empty($imar) ) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {

            exit    ("Вы ввели не всю информацию, вернитесь назад и заполните все    поля!"); //останавливаем    выполнение сценариев
            }
            if    (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $to)) //проверка    е-mail адреса регулярными выражениями на корректность
            {exit    ("Неверно введен е-mail!");}    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
$imar = stripslashes($imar);
    $imar = htmlspecialchars($imar);

 //удаляем лишние пробелы
    $login = trim($login);
    $to = trim($to);
    $password = trim($password);
 // подключаемся к базе
    include ("./connection.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("РћС€РёР±РєР° " . mysqli_error($link));

 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($link,"SELECT id FROM users WHERE username='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
     $result2    = mysqli_query ($link,"INSERT INTO users (username,password,names,email,date) VALUES('$login','$password','$imar','$to',NOW())");
          //    Проверяем, есть ли ошибки
          if    ($result2=='TRUE')
          {
          $result3    = mysqli_query ($link,"SELECT id FROM users WHERE username='$login'");//извлекаем    идентификатор пользователя. Благодаря ему у нас и будет уникальный код    активации, ведь двух одинаковых идентификаторов быть не может.
          $myrow3    = mysqli_fetch_array($result3);
          $activation    = md5($myrow3['id']).md5($login);//код активации аккаунта. Зашифруем    через функцию md5 идентификатор и логин. 
 $subject    = "Подтверждение регистрации";//тема сообщения
            $message    = '<html>
              <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           </head>
             <body>
            <a> Здравствуйте!</a><br><a> Спасибо за регистрацию на 217.71.139.74</a> <br> <a>Ваш логин:'.$login.' </a><br>
            <a>Перейдите    по ссылке, чтобы активировать ваш    аккаунт:</a> <br> 
             http://217.71.139.74/~user211/coursework/activation.php?login='.$login.'&code='.$activation.' <br><a>  С    уважением,</a><br>
            <a>Администрация   217.71.139.74</a>';//содержание сообщение
            $res=mail($to,    $subject, $message, 'Content-type:text/html;charset=iso-8859-1'."\r\n");//отправляем сообщение
                     
            echo    $res."Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации.    Внимание! Ссылка действительна 1 час. <a href='index.php'>Главная    страница</a><br>"; //говорим о    отправленном письме пользователю
            }    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?> 