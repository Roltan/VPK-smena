<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// mysql_select_db('test');
$query = "SELECT * FROM card_albom";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
    <script defer src="js/im-in.js" ></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="BD.php" class="menu__link">Посмотреть заявки</a></li>
            <li><a href="albomchoice.html" class="menu__link">Редактировать "галлерея"</a></li>
            <li><a href="directions-admin.php" class="menu__link">Редактировать "направления"</a></li>
            <li><a href="password.html" class="menu__link">Изменить пароль</a></li>
        </ul>
    </nav>
</header>
<hr>
   <?php
    echo "<div class='welcome-text'>Всего ".$_SESSION['fl2']." альбомов</div>"
   ?>
    <table border='1' cellpadding='5' align='center'>
<?php
$fl3 = 1;
      while ($row = mysqli_fetch_array($result))
      { 
       echo "<tr>\n
        <td>Альбом номер ".$row["id"]."</td>". 

        "</tr>";
$fl3++;
      }


?>
 </table>
 <form action="albomadd.php" method='post' align='center'>
    <input class="albomdelete" type="text" name="albomname" placeholder='Укажите ссылку на картинку'>
    <input class="albomdelete" type="text" name="albomnumber" placeholder='Укажите заголовок альбома'>
    <input class="albomdelete" type="text" name="albombody" placeholder='Описание (до 17 слов)!' maxlength="118">
    <input class="albomdelete" type="submit">
</form>
</body>
</html>
<?php
mysqli_close($conn);
?>