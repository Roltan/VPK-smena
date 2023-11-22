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
if(isset($_POST["img_num"])){
    $img_num = $_POST["img_num"];
}

$bd = "albom".$number;
$query1 = "SELECT * FROM $bd";
$result = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM $bd";
$result2 = mysqli_query($conn, $query2);
mysqli_data_seek($result2, 1);

// проверка на надобность удоления строки
$checkRow = 0;
$RowDel = 0;
// считаем строчки + проверяем
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result))
{
	$RowDel++;
    if($row['img_string1'] != NULL && $row['img_string2'] == NULL && $row['img_string3'] == NULL){
        $checkRow = 1;
    }
}

//удаление фотку и двигаем остальные
$id=0;
$fl=0;
mysqli_data_seek($result, 0);
while($row = mysqli_fetch_array($result)){
    $row2 = mysqli_fetch_array($result2);
    $id++;
    $idRow2 = $id+1;
    $fl++;
    if($fl==$img_num){
        if($row['img_string2'] != NULL){
            $i = $row['img_string2'];
            $q1 =  "UPDATE $bd SET img_string1 = '$i' WHERE ID='$id'";
            $r1 = mysqli_query($conn, $q1);
            $q2 = "UPDATE $bd SET img_string2 = '' WHERE ID='$id'";
            $r2 = mysqli_query($conn, $q2);
            $img_num++;
        }
        else{
            $q1 =  "UPDATE $bd SET img_string1 = '' WHERE ID='$id'";
            $r1 = mysqli_query($conn, $q1);
            break;
        }
    }
    $fl++;
    if($fl==$img_num){
        if($row['img_string3'] != NULL){
            $i = $row['img_string3'];
            $q2 =  "UPDATE $bd SET img_string2 = '$i' WHERE ID='$id'";
            $r2 = mysqli_query($conn, $q2);
            $q3 = "UPDATE $bd SET img_string3 = '' WHERE ID='$id'";
            $r3 = mysqli_query($conn, $q3);
            $img_num++;
        }
        else{
            $q2 =  "UPDATE $bd SET img_string2 = '' WHERE ID='$id'";
            $r2 = mysqli_query($conn, $q2);
            break;
        }
    }
    $fl++;
    if($fl==$img_num){
        if($row2 != NULL){
            $i = $row2['img_string1'];
            $q3 =  "UPDATE $bd SET img_string3 = '$i' WHERE ID='$id'";
            $r3 = mysqli_query($conn, $q3);
            $q4 = "UPDATE $bd SET img_string1 = '' WHERE ID='$idRow2'";
            $r4 = mysqli_query($conn, $q4);
            $img_num++;
        }
        else{
            $q3 =  "UPDATE $bd SET img_string3 = '' WHERE ID='$id'";
            $r3 = mysqli_query($conn, $q3);
            break;
        }
    }
}


// удоляем строку
if($checkRow){
    $sql = "DELETE FROM $bd WHERE ID = '$RowDel'";
    mysqli_query($conn, $sql);
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