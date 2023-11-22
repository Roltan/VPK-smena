<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// mysql_select_db('test');
$query = "SELECT * FROM users";
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
        <table border='1' cellpadding='5' align='center'>
            <tr>
                <td>номер</td>
                <td>фамилия</td>
                <td>имя</td>
                <td>отчество</td>
                <td>телефон</td>
                <td>почта</td>
                <td>взраст</td>
                <td>дата заявки</td>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result))
                { // выводим данные
                echo "<tr>\n".
                    "<td>".$row["id"]."</td>"."\n".
                    "<td>".$row["lastname"]."</td>"."\n".
                    "<td>".$row["fisrtname"]."</td>"."\n".
                    "<td>".$row["patronymic"]."</td>"."\n".
                    "<td>".$row["usernumber"]."</td>"."\n".
                    "<td>".$row["email"]."</td>"."\n".
                    "<td>".$row["age"]."</td>"."\n".
                    "<td>".$row["datetime"]."</td>"."\n".
                "</tr>"."\n";
                }
            ?>
        </table>
        <a href="choice.html" class="home__link">Вернуться назад</a>
    </body>
    </html>
<?php
mysqli_close($conn);
?>