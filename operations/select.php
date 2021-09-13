<body bgcolor="b3b3b3" >
<?php
require_once '../connection.php'; // подключаем скрипт\

// подключаемся к серверу
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

$select_name = htmlentities(mysqli_real_escape_string($link, $_POST['select_name']));

if (isset($_POST['select_name'])) {
    $query = "SELECT proizv.id, proizv.name, country.country_name, desease.name_d, cuntakt.contacy  FROM proizv, country, desease, cuntakt WHERE  country.id = proizv.id AND proizv.id = desease.id AND proizv.id= cuntakt.id AND proizv.name = '$select_name'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        $rows = mysqli_num_rows($result); // количество полученных строк

        echo "<table><tr><th> Id </th><th> Имя производителя </th><th> Страна </th><th> Код болезни </th><th> Контакты </th></tr>";
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
echo '<a href="../index.php">Назад</a>';

?>
</body>