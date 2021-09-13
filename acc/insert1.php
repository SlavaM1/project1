<?php
require_once '../connection.php';

if (
    isset($_POST['name_user']) && isset($_POST['name_login'])
    && isset($_POST['name_pass']) && isset($_POST['rols_name'])
) {
    // подключаемся к серверу
    $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
        or die("Ошибка " . mysqli_error($link));
    // экранирования символов для mysql
    $name_user = htmlentities(mysqli_real_escape_string($link, $_POST['name_user']));
    $name_login = htmlentities(mysqli_real_escape_string($link, $_POST['name_login']));
    $name_pass = htmlentities(mysqli_real_escape_string($link, $_POST['name_pass']));
    $rols_name = htmlentities(mysqli_real_escape_string($link, $_POST['rols_name']));

    $query = "INSERT INTO users VALUES(NULL,'$name_login','$name_pass','$rols_name','$name_user','0')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result) {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);

    header("location: ../acc1.php");
    exit;
}
