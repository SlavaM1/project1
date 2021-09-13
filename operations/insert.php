<?php
require_once '../connection.php';

if (
    isset($_POST['client_name']) && isset($_POST['furniture_name'])
    && is_numeric($_POST['furniture_quantity']) && isset($_POST['sale_date'])
) {
    // подключаемся к серверу
    $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
        or die("Ошибка " . mysqli_error($link));
    // экранирования символов для mysql
    $client_name = htmlentities(mysqli_real_escape_string($link, $_POST['client_name']));
    $furniture_name = htmlentities(mysqli_real_escape_string($link, $_POST['furniture_name']));
    $furniture_quantity = htmlentities(mysqli_real_escape_string($link, $_POST['furniture_quantity']));
    $sale_date = htmlentities(mysqli_real_escape_string($link, $_POST['sale_date']));

    $query = "INSERT INTO proizv VALUES(NULL,'$client_name')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $query = "INSERT INTO country VALUES(NULL, '$furniture_name')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $query = "INSERT INTO desease VALUES(NULL, '$furniture_quantity')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $query = "INSERT INTO cuntakt VALUES(NULL, '$sale_date')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result) {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);

    header("location: ../index.php");
    exit;
}
