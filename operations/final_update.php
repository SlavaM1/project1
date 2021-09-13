<?php
require_once '../connection.php'; // подключаем скрипт\

// подключаемся к серверу
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

if (
    isset($_POST['edit_c_name']) && 
    isset($_POST['edit_f_name']) && 
    is_numeric($_POST['edit_f_quantity']) && 
    isset($_POST['edit_f_sale']) && 
    is_numeric($_POST['edit_id'])
) {

    $edit_id = htmlentities(mysqli_real_escape_string($link, $_POST['edit_id']));
    $client_name = htmlentities(mysqli_real_escape_string($link, $_POST['edit_c_name']));
    $furniture_name = htmlentities(mysqli_real_escape_string($link, $_POST['edit_f_name']));
    $furniture_quantity = htmlentities(mysqli_real_escape_string($link, $_POST['edit_f_quantity']));
    $sale_date = htmlentities(mysqli_real_escape_string($link, $_POST['edit_f_sale']));

    $query = "UPDATE proizv SET name='$client_name' WHERE id='$edit_id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    

   $query = "UPDATE country SET country_name='$furniture_name' WHERE id='$edit_id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
   

    $query = "UPDATE desease SET name_d='$furniture_quantity' WHERE id='$edit_id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $query = "UPDATE cuntakt SET contacy='$sale_date' WHERE id='$edit_id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if ($result) {
        echo "<span style='color:blue;'>Данные обновлены</span>";
    }
}

// закрываем подключение
mysqli_close($link);

header("location: ../index.php");
exit;
