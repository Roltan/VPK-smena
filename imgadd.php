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
if(isset($_POST["number"])){
    $number = $_POST["number"];
}
if(isset($_POST["img_src"])){
    $img_src = $_POST["img_src"];
}


$bd = "albom".$number;
$query = "SELECT * FROM $bd";
$result = mysqli_query($conn, $query);

$true = 0;
$id = 0;
while($row = mysqli_fetch_array($result)){
    $id++;

    if($row['img_string1'] == NULL){
        $q1 =  "UPDATE $bd SET img_string1 = '$img_src' WHERE ID='$id'";
        $r1 = mysqli_query($conn, $q1);
        $true = 1;
    }


    else if($row['img_string2'] == NULL){
        $q2 =  "UPDATE $bd SET img_string2 = '$img_src' WHERE ID='$id'";
        $r2 = mysqli_query($conn, $q2);
        $true = 1;
    }


    else if($row['img_string3'] == NULL){
        $q3 =  "UPDATE $bd SET img_string3 = '$img_src' WHERE ID='$id'";
        $r3 = mysqli_query($conn, $q3);
        $true = 1;
    }
}
if($true < 1){
    $id++;
    $q4 = "INSERT INTO $bd (id, header, img_string1, img_string2, img_string3) values ('$id', '',  '$img_src', '', '')";
    $r4 = mysqli_query($conn, $q4);
};
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