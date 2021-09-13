

<div class="wrapper">

    <section  class="bd_forms">
<a style="float:left; margin-left:550px; margin-top:0px;" ><h1>База данных фито</h1></a>

        <h3 style="float:left; margin-left:520px; margin-top:0px;">Показать выборку БД фито</h3>
        <form style="float:left; margin-left:520px; margin-top:0px;" method="POST" action="operations/select.php">
            <input name="select_name" type="text" placeholder="Имя производителя" />
            <input type="submit" name="select_submit" value="Показать">
        </form>
    </section>

    <section class="bd">


        <?php
        require_once './connection.php'; // подключаем скрипт\

        // подключаемся к серверу
        $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
            or die("Ошибка " . mysqli_error($link));

        $query = "SELECT proizv.id, proizv.name, country.country_name, desease.name_d, cuntakt.contacy  FROM proizv, country, desease, cuntakt WHERE  country.id = proizv.id AND proizv.id = desease.id AND proizv.id= cuntakt.id;
        ";

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

        // закрываем подключение
        mysqli_close($link);

        ?>
    </section>
</div>
