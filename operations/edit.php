<body align="center" bgcolor="b3b3b3" >

<?php

require_once "../connection.php";

$link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
    or die("Ошибка " . mysqli_error($link));

$testId = htmlentities(mysqli_real_escape_string($link, $_POST['test_id']));

if (isset($_POST['test_id'])) {
    $query = "SELECT proizv.id, proizv.name, country.country_name, desease.name_d, cuntakt.contacy  FROM proizv, country, desease, cuntakt WHERE  country.id = proizv.id AND proizv.id = desease.id AND proizv.id= cuntakt.id AND proizv.id ='$testId'";
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
    
echo "<h2 >Изменить данные в БД</h2>";
echo '<p>Какие данные вы хотите изменить?</p>';
echo '<form method="POST" action="final_update.php"';
echo "<p>Идентификатор:<INPUT type=number name='edit_id' value=" . "'$row[0]'" . "></p>";

echo "<p>Имя производителя: <select name='edit_c_name'>";
$i = 1;
$fur = array("Atom", "Vektor", "Do4alab", "Apple", "Krurkal");
foreach ($fur as $fur) {
    if ($fur == $row[1]) echo "<option selected value=$fur>$fur</option>";
    else echo "<option value=$fur>$fur</option>";
    $i++;
};
echo '</select></p>';


echo "<p>Название страны: <select name='edit_f_name'>";
$i = 1;
$collect = array("Russia", "USA", "Kitai", "Amerika", "UK");
foreach ($collect as $collect) {
    if ($collect == $row[2]) echo "<option selected value=$collect>$collect</option>";
    else echo "<option value=$collect>$collect</option>";
    $i++;
};
echo '</select></p>';
echo "<p>Код болезни:<input type='number' name='edit_f_quantity' value=" . "'$row[3]'" . "></p>";
echo "<p>Контакты:<input type='text' name='edit_f_sale' value=" . "'$row[4]'" . "></p>";

echo "<p><input type='submit' value='Изменить'></p>";
echo "</form>";
}
}

?>
</body>