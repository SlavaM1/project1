<?php
                require_once './connection.php'; // подключаем скрипт\

        // подключаемся к серверу
        $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
            or die("Ошибка " . mysqli_error($link));


            mysqli_query    ($link,"DELETE FROM users WHERE activation='0' AND UNIX_TIMESTAMP() -    UNIX_TIMESTAMP(date) > 3600");//удаляем пользователей из базы
 if    (isset($_GET['code'])) {$code =$_GET['code']; } //код подтверждения 
            else 
            {    exit("Вы    зашли на страницу без кода подтверждения!");} //если не указали code,    то выдаем ошибку
 if (isset($_GET['login'])) {$login=$_GET['login'];    } //логин,который    нужно активировать
            else 
            {    exit("Вы    зашли на страницу без логина!");} //если не указали логин, то выдаем ошибку
 $result = mysqli_query($link,"SELECT    id    FROM    users WHERE username='$login'"); //извлекаем    идентификатор пользователя с данным логином
            $myrow    = mysqli_fetch_array($result); 
 $activation    = md5($myrow['id']).md5($login);//создаем    такой же код подтверждения
 if ($activation == $code) {//сравниваем полученный из url и сгенерированный код 
                     mysqli_query($link,"UPDATE    users SET activation='1' WHERE username='$login'");//если равны, то активируем пользователя
                     echo "Ваш Е-мейл подтвержден! Теперь вы можете    зайти на сайт под своим логином! <a href='index.php'>Главная    страница</a>";
                     }
            else {echo "Ошибка! Ваш Е-мейл не    подтвержден! <a    href='index.php'>Главная    страница</a>";
            //если    же полученный из url и    сгенерированный код не равны, то выдаем ошибку
            }
            ?>