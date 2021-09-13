<?php
$title = "Курсач"; //               
require __DIR__ . '/header.php'; //                         s
?>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body bgcolor="b3b3b3" >
<div class="wrapper">
   <section class='bd_forms'>
        <h1 align="center"><font face="Arial"><U>База данных фито</U> </font></h1>

        <h1 align="center" ><font face="Arial">Добавляйте данные в БД</font></h1>
        <form align="center" id="insert_form" onsubmit="return validateInsert()" method="POST" action="./operations/insert.php" id="insert_form">
                 <p>Имя производителя</p>
                 <select name="client_name" id="">
                     <option value="Atom">Atom</option>
                     <option value="Vektor">Vektor</option>
                     <option value="Do4alab">Do4alab</option>
                     <option value="Apple">Apple</option>
                     <option value="Krurkal">Krurkal</option>
                 </select>

                 <p>Наименование страны</p>
                 <select name="furniture_name" id="">
                     <option value="Russia">Russia</option>
                     <option value="USA">USA</option>
                     <option value="Kitai">Kitai</option>
                     <option value="Amerika">Amerika</option>
                     <option value="UK">UK</option>
                 </select>
                 <p>Введите код болезни</p>
                 <input name="furniture_quantity" type="number" placeholder="Введите код болезни" />
                 <p>Контакты</p>
                 <input name="sale_date" type="text" placeholder="введите номер" />
                 <input type="submit" value="Отправить" />
             </form>
        <h2 align="center"><font face="Arial">Изменить данные в БД</font></h2>
        <form align="center" method="POST" action="operations/edit.php">
            <input name="test_id" type="number" placeholder="id" />
            <input type="submit" name="test_sub" value="Показать">
        </form>

        <h2 align="center"><font face="Arial">Удалить данные из БД</font></h2>
        <form align="center" method="POST" action="operations/delete.php">
            <input name="id" type="text" placeholder="id" />
            <input type="submit" value="Удалить" />
        </form>

        <h2 align="center"><font face="Arial">Показать производителя и его данные</font></h2>
        <form align="center" method="POST" action="operations/select.php">
            <input name="select_name" type="text" placeholder="Название производителя" />
            <input type="submit" name="select_submit" value="Показать">
        </form>

        <h2 align="center"><font face="Arial">Полная очистка базы данных</font></h2>
        <form align="center" action="operations/clear.php" method="post">
            <input type="submit" name="clear" value="Очистить БД">
        </form>
    <form action="/acc1.php" method="POST">
   <input value="Админ панель" type="button" onclick="location.href='acc1.php'" />
     </form>

    </section>

    <br>

    <section class="bd">

        <?php
        require_once './connection.php'; // подключаем скрипт\

        // подключаемся к серверу
        $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
            or die("Ошибка " . mysqli_error($link));

        $query = "SELECT proizv.id, proizv.name, country.country_name, desease.name_d, cuntakt.contacy  FROM proizv, country, desease, cuntakt WHERE  country.id = proizv.id AND proizv.id = desease.id AND proizv.id= cuntakt.id ;
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

<script src="script.js"></script>
</body>
</html>
