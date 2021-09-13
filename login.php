<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

    
</head>

<body bgcolor="b3b3b3">

    <div class="container">
        <form class="form-signin" method="POST" align="center">
            <h2 align="center">Страница входа</h2>

            <input  type="text" name="username" class="form-control" placeholder="Username" required><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
             <button  type="submit">Войти</button><br>
            <a href="index.php" class="btn btn-primary btn-lg btn-block">Домой</a>
            
        </form>
<form class="form-signin" align="center">
<h3 align="center">Ещё не зарегистрированны?</h3>
<button  type="submit"><a href="reg.php" >Зарегистрироваться</a></button>
</form>
    </div>

    <?php
    session_start();
    require_once './connection.php';
       
    if (isset($_POST['username']) and isset($_POST['password'])) {
        $link = mysqli_connect($db_host, $db_user, $db_password, $db_base)
            or die("Ошибка " . mysqli_error($link));

        $username = $_POST['username'];
        $password = $_POST['password'];
       $_POST['rols'] = 'admin';
       $rols = $_POST['rols'];
      $_POST['ban'] = 'ban';
      $ban = $_POST['ban'];

      
        $query1 = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND rols = 'admin'";
        $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
        $count1 = mysqli_num_rows($result1);

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

       $query2 = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND ban = '$ban'";
        $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
        $count2 = mysqli_num_rows($result2);


        if ($count == 1 && $count1 == 1 && $count2 == 0 ) {
            $_SESSION['username'] = $username;
             $_SESSION['rols'] = $rols;
            header('Location: index.php');
            exit;
        } elseif ($count == 1 && $count2 == 1) {
       $_SESSION['username'] = $username;
 $_SESSION['ban'] = $ban;
                header('Location: index.php');
            exit;
} elseif ($count == 1) {
       $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
}
else
 {
            function alert($msg)
            {
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            
            alert("Такого пользователя не существует");
        }
    }
    ?>
</body>

</html>