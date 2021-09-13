<?php
require_once '../connection.php'; // подключаем скрипт

if (isset($_POST['id'])) {

    $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
        or die("Ошибка " . mysqli_error($link));
    $id = mysqli_real_escape_string($link, $_POST['id']);

    $query = "DELETE FROM country WHERE id = '$id'";
    $query = "DELETE FROM proizv WHERE id = '$id'";
    $query = "DELETE FROM desease WHERE id = '$id'";
    $query = "DELETE FROM cuntakt WHERE id = '$id'";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);
    // перенаправление на скрипт index.php
    header("location: ../index.php");
    exit;
}
