<?php
$title = "Курсач"; //               
require __DIR__ . '/header.php'; //                     s
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
        <h1 align="center"><font face="Arial"><U>Панель управления администратора</U> </font></h1>

        <h1 align="center" ><font face="Arial">Добавить нового пользователя</font></h1>
        <form align="center" id="insert_form" onsubmit="return nameInsert()" method="POST" action="./acc/insert1.php" id="insert_form">
                 <p>Имя пользователя</p>
              <input name="name_user" type="text" placeholder="Введите имя пользователя" /> <br>
              <p>Логин</p>
              <input name="name_login" type="text" placeholder="Введите логин" />
             <p>Пароль</p>
              <input name="name_pass" type="text" placeholder="пароль" /><br>
                <p>Выберите роль</p>
                 <select name="rols_name" id="">
                     <option value="admin">Admin</option>
                     <option value="user">User</option>
                                      </select><br>
                  <input type="submit" value="Добавить" />
             </form>
        <h2 align="center"><font face="Arial">Редактировать аккаунт</font></h2>
        <form align="center" method="POST" action="acc/edit.php">
            <input name="test_id" type="number" placeholder="id" />
            <input type="submit" name="test_sub" value="Редактировать">
        </form>

        <h2 align="center"><font face="Arial">Удалить пользователя по id</font></h2>
        <form align="center" method="POST" action="acc/delete.php">
            <input name="id" type="text" placeholder="id" />
            <input type="submit" value="Удалить" />
        </form>

        <h2 align="center"><font face="Arial">Показать пользователя и его данные</font></h2>
        <form align="center" method="POST" action="acc/select.php">
            <input name="name_login" type="text" placeholder="Введите логин пользователя" />
            <input type="submit" name="select_submit" value="Показать">
        </form><br>
  
     <h2 align="center"><font face="Arial">Забанить пользователя</font></h2>
            <form align="center" method="POST" action="acc/ban.php">
            <input name="id" type="number" placeholder="id" />
         <select name="ban_0" id="">
                      <option value="0">разбанить</option>
                      <option value="ban">забанить</option>
                                      </select><br>
          <input type="submit" value="Ок" />
        </form>
            <form action="/account.php" method="POST">
   <input value="Назад" type="button" onclick="location.href='index.php'" />
     </form>

    </section>

    <br>

    <section class="bd">

        <?php
        require_once './connection.php'; // подключаем скрипт\

        // подключаемся к серверу
        $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
            or die("Ошибка " . mysqli_error($link));

        $query = "SELECT * FROM users; ;
        ";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            $rows = mysqli_num_rows($result); // количество полученных строк

            echo "<table><tr><th> Id </th><th> Логин </th><th>  Пароль </th><th>  Роль  </th><th>Имя пользователя </th><th>бан/разбан  </th></tr>";
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                for ($j = 0; $j < 6; ++$j) echo "<td>$row[$j]</td>";
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
