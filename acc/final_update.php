<?php
require_once '../connection.php'; // подключаем скрипт\

// подключаемся к серверу
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

if (
    isset($_POST['edit_r_name']) && 
    isset($_POST['edit_q_quantity']) && 
    isset($_POST['edit_q_date']) && 
    isset($_POST['edit_q_name']) && 
    is_numeric($_POST['edit_id'])
) {

    $edit_id = htmlentities(mysqli_real_escape_string($link, $_POST['edit_id']));
    $name_user = htmlentities(mysqli_real_escape_string($link, $_POST['edit_q_name']));
    $name_login = htmlentities(mysqli_real_escape_string($link, $_POST['edit_r_name']));
    $name_pass = htmlentities(mysqli_real_escape_string($link, $_POST['edit_q_quantity']));
    $rols_name = htmlentities(mysqli_real_escape_string($link, $_POST['edit_q_date']));

    $query = "UPDATE users SET username='$name_login', password='$name_pass', rols='$rols_name', names='$name_user' WHERE id='$edit_id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    

    if ($result) {
        echo "<span style='color:blue;'>Данные обновлены</span>";
    }
}

// закрываем подключение
mysqli_close($link);

header("location: ../acc1.php");
exit;
