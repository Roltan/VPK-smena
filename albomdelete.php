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
if(isset($_POST["albomnumber"])){
    $number = $_POST["albomnumber"];
}

$sql = "DELETE FROM card_albom where id = '$number'";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Успех!";
    $fl3--;

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
    <form action="imgdel.php" method="post" align='center' class="form">
        <div>Удоление картинки в альбом</div>
        <input type="text" name="number" placeholder="Номер альбома">
        <input type="text" name="img_num" placeholder="Номер фотографии">
        <input type="submit">
    </form>
</body>
</html>
<?php
mysqli_close($conn);
?>