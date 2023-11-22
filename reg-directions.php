<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["baner"])){
    $baner = $_POST["baner"];
}
if(isset($_POST["title"])){
    $title = $_POST["title"];
}
if(isset($_POST["text"])){
    $text = $_POST["text"];
}
if(isset($_POST["coachFIO"])){
    $coachFIO = $_POST["coachFIO"];
}
if(isset($_POST["coachFOTO"])){
    $coachFOTO = $_POST["coachFOTO"];
}

$counterRow = 0;
$query = "SELECT * FROM directions";
$result = mysqli_query($conn,$query);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result))
{
	$counterRow++;
}
$ID = $counterRow + 1;

$sql = "INSERT INTO directions (ID,baner,title,text,coachFIO,coachFOTO) VALUES 
('$ID','$baner', '$title', '$text', '$coachFIO', '$coachFOTO')";
mysqli_query($conn, $sql)

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