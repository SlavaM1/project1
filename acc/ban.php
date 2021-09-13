<?php
require_once '../connection.php'; // подключаем скрипт

if (isset($_POST['id']) && isset($_POST['ban_0'])) {

    $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
        or die("Ошибка " . mysqli_error($link));
    $id = mysqli_real_escape_string($link, $_POST['id']);
   $ban_0 = mysqli_real_escape_string($link, $_POST['ban_0']);


    $query = "UPDATE users SET ban='$ban_0' WHERE id = '$id'";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);
    // перенаправление на скрипт index.php
    header("location: ../acc1.php");
    exit;
}
