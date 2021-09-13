<body bgcolor="b3b3b3" >
<?php
require_once '../connection.php'; // подключаем скрипт\

// подключаемся к серверу
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

$name_login = htmlentities(mysqli_real_escape_string($link, $_POST['name_login']));

if (isset($_POST['name_login'])) {
    $query = "SELECT * FROM users WHERE username = '$name_login'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        $rows = mysqli_num_rows($result); // количество полученных строк

        echo "<table><tr><th> Id </th><th> Логин </th><th> Пароль </th><th> Роль </th><th> Имя пользователя </th></tr>";
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0; $j < 5; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";

        // очищаем результат
        mysqli_free_result($result);
    }
}

// закрываем подключение
mysqli_close($link);
echo '<a href="../acc1.php">Назад</a>';

?>
</body>