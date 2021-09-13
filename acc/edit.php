<body align="center" bgcolor="b3b3b3" >

<?php

require_once "../connection.php";

$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

$testId = htmlentities(mysqli_real_escape_string($link, $_POST['test_id']));

if (isset($_POST['test_id'])) {
    $query = "SELECT * FROM users WHERE id ='$testId'";
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
    
echo "<h2 >Редактировать аккаунт</h2>";
echo '<p>Какие данные вы хотите редактировать?</p>';
echo '<form method="POST" action="final_update.php"';
echo "<p>Идентификатор:<INPUT type=number name='edit_id' value=" . "'$row[0]'" . "></p>";

echo "<p>Логин:<input type='text' name='edit_r_name' value=" . "'$row[1]'" . "></p>";
echo "<p>Пароль:<input type='text' name='edit_q_quantity' value=" . "'$row[2]'" . "></p>";

echo "<p>Роль: <select name='edit_q_date'>";
$i = 1;
$collect = array("admin", "user");
foreach ($collect as $collect) {
    if ($collect == $row[3]) echo "<option selected value=$collect>$collect</option>";
    else echo "<option value=$collect>$collect</option>";
    $i++;
};
echo '</select></p>';
echo "<p>Имя пользователя:<input type='text' name='edit_q_name' value=" . "'$row[4]'" . "></p>";

echo "<p><input type='submit' value='Изменить'></p>";
echo "</form>";
}
}

?>
</body>