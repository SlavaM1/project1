<?php

require_once '../connection.php'; // подключаем скрипт

if (isset($_POST['clear'])) {

    $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
        or die("Ошибка " . mysqli_error($link));

    $query = "TRUNCATE TABLE country";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $query = "TRUNCATE TABLE proizv";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $query = "TRUNCATE TABLE desease";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $query = "TRUNCATE TABLE cuntakt";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);
    // перенаправление на скрипт index.php
    header("location: ../index.php");
exit;
}
