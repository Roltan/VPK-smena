<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["ID"])){
    $ID = $_POST["ID"];
}

//удоляем запись
$sql = "DELETE FROM directions WHERE ID = '$ID'";
mysqli_query($conn, $sql);
$ID += 1;

// считаем строки
$counterRow = 0;
$query = "SELECT * FROM directions";
$result = mysqli_query($conn,$query);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result))
{
	$counterRow++;
}
$counterRow++;

// меняем ID
for($i = $ID; $i <= $counterRow; $i++){
    $j = $i - 1; 
    $sql = "UPDATE directions SET ID='$j' WHERE ID='$i'";
    mysqli_query($conn, $sql);
    echo "$j $i";
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <script defer src="js/im-in.js" ></script>
    </head>
    <body>
    <header>
    <nav>
        <ul>
            <li><a href="BD.php" class="menu__link">Посмотреть заявки</a></li>
            <li><a href="albomchoice.html" class="menu__link">Редактировать "галлерея"</a></li>
            <li><a href="directions.php" class="menu__link">Редактировать "направления"</a></li>
            <li><a href="password.html" class="menu__link">Изменить пароль</a></li>
        </ul>
    </nav>
</header>
<hr>
        <div>
            <a href="choice.html">Обновления учтены</a>
        </div>
    </body>
</html>
<?php

mysqli_close($conn);
?>