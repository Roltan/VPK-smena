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
if(isset($_POST["albomname"])){
    $albomname = $_POST["albomname"];
}
if(isset($_POST["albomnumber"])){
    $albomnumber = $_POST["albomnumber"];
}
if(isset($_POST["albombody"])){
    $albombody = $_POST["albombody"];
}
$counterRow = 0;
$query = "SELECT * FROM card_albom";
$result = mysqli_query($conn,$query);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result))
{
	$counterRow++;
}
$counterRow++;

//добовление инфы о карте
$sql = "INSERT INTO card_albom (id, img_src, card_head, card_body) values 
('$counterRow', '$albomname', '$albomnumber', '$albombody')";
mysqli_query($conn, $sql);

// создание таблицы под альбом

$bd = "albom".$counterRow;
$sql = 
    "CREATE TABLE $bd 
    (
        `id` int(11) NOT NULL,
        `header` varchar(1000) DEFAULT NULL,
        `img_string1` varchar(2048) DEFAULT NULL,
        `img_string2` varchar(2048) DEFAULT NULL,
        `img_string3` varchar(2048) DEFAULT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8"
;
mysqli_query($conn, $sql);
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