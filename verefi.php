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

if(isset($_POST["login"])){
    $login = $_POST["login"];
}
if(isset($_POST["password"])){
    $password = $_POST["password"];
}

$query = "SELECT * FROM password";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
    if($login == $row["login"] && $password == $row["password"]){
        echo "1";
        header('Location: choice.html');
        die();
    }
}
header('Location: index.html');


mysqli_close($conn);
?>