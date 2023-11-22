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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script defer src="js/mediaheader.js"></script>
    <script defer src="/js/albom.js"></script>
    <link rel="stylesheet" href="css/headermedia.css">
    <link rel="stylesheet" href="css/stylefooter.css">
    <link rel="stylesheet" href="css/albom.css">
    <link rel="stylesheet" href="css/gallery.css">

    <title>ВПК Смена</title>
</head>
<body>
    <div class="wrapper">
        <header class="header"> 
            <div class="header__container"> 
                <div class="header__row"> 
                    <button class="header__burger-btn" id="burger">  
                        <span></span><span></span><span></span> 
                    </button> 
                    <a href="index.php" class="header__logo">ВПК Смена</a> 
                    <div class="header__menu menu"> 
                        <div class="menu__icon icon__menu"> 
                            <span></span> 
                        </div> 
                        <nav class="menu__body"> 
                            <ul class="menu__list ul"> 
                                <li><a href="directions.php" class="menu__link">Направления</a></li> 
                                <li><a href="sign-up.html" class="menu__link">Записаться</a></li> 
                                <li><a href="club.html" class="menu__link">Создание клуба</a></li> 
                                <li><a href="" class="menu__link">Достижения</a></li> 
                                <li><a href="contact.html" class="menu__link">Контакты</a></li> 
                            </ul> 
                        </nav> 
                    </div> 
                </div> 
            </div> 
        </header>
        
        <div class="body">
            <div class="body__container"></div>
                <div class="welcome-text" id="welcome-text">Галерея военно-патриотического клуба "Смена"</div>
                <div class='card-row'>
                    <?php
                        $fl2 = 0;
                        $fl = 1;
                        while($row = mysqli_fetch_array($result)){
                        if($fl == 4){
                            echo "</div>\n<div class='card-row'>";
                            $fl = 1;
                        }
                        $fl2++;
                        echo "
                            <div class='card card-container bg-transparent' id='card".$fl2."'>
                                <img src='".$row["img_src"]."' class='img'>
                                <div class='card-body'>
                                    <h5>".$row["card_head"]."</h5>
                                    <p>".$row["card_body"]."</p>
                                <button class='card-btn' data-link='".$fl."'>Посмотреть альбом</button>
                                </div>
                            </div>";
                        $fl++;
                        }
                        
                        $_SESSION['fl2'] = $fl2;
                    ?>
                </div>
            <div>
                <?php 
                for($i = 1;$i < $fl2; $i++){
                    $bd = "albom".$i;
                    $query = "SELECT * FROM $bd";
                    $result = mysqli_query($conn,$query);
                    echo "<div class='albom-container' id='".$bd."'>";
                    while($row = mysqli_fetch_array($result)){
                        if($row["id"] == 1){
                            echo "<h4 class='albomh4'>".$row["header"]."</h4>";
                        }
                        echo "<div class='albom__row1'>";
                        if($row["img_string1"]!=''){
                            echo    "<img src='".$row["img_string1"]."' class='albom-img img2 imgs' alt='img' id='myImg'>";
                        }
                        if($row["img_string2"]!=''){
                            echo    "<img src='".$row["img_string2"]."' class='albom-img img2 imgs' alt='img' id='myImg'>";
                        }  
                        if($row["img_string3"]!=''){
                            echo    "<img src='".$row["img_string3"]."' class='albom-img img2 imgs' alt='img' id='myImg'>";
                        }                 
                            echo "</div>";
                    }
                    echo "<a href='albom.php' class='link__back'>Вернуться в галерею</a></div>";
                }
                ?>
            </div>
               
            

        </div>



        <footer> 
            <section class="footer">  
                <div class="contrainer"> 
                      <div class="row"> 
                        <hr> 
                        <div class="col-md-3 col-6"> 
                            <h4>Информация</h4> 
                            <ul class="list-unstyled list1"> 
                                <li><a href="directions.php">Направления</a></li> 
                                <li><a href="sign-up.html">Записаться</a></li> 
                                <li><a href="club.html">Создание клуба</a></li> 
                                <li><a href="#">Достижения</a></li> 
                                <li><a href="contact.html">Контакты</a></li>
                                <li><a href="albom.php">Галерея</a></li> 
                            </ul> 
                        </div> 
    
                        <div class="col-md-3 col-6"> 
                            <h4>График работы</h4> 
                             <ul class="list-unstyled"> 
                                  <li>Г. Уфа, ул. Сипайловская, 14</li>
                                  <li>индекс 450100</li>
                                  <li>Пн-Пт 18:00–21:00</li> 
                                  <li>Без перерыва</li> 
                             </ul> 
                        </div> 
    
                        <div class="col-md-3 col-6"> 
                            <h4>Контакты</h4> 
                            <ul class="list-unstyled"> 
                                <li><a href="tel:89174822831">+7 (917) 482-28-31</a></li> 
                                <li><a href="tel:89273312155">+7 (927) 331-21-55</a></li> 
                                <li><a href="tel:89279361116">+7 (927) 936-11-16</a></li> 
                                <li><a href="https://vk.com/vpcsmena">наша группа в VK</a></li>
                            </ul> 
                        </div> 
         
                        <div class="col-md-3 col-6"> 
                             <h4>Мы на карте</h4> 
                             <div class="footer-map"> 
                                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A21402319cac3ed0d9450673d9c4115e13fc3df407d78f2d4fb33aaeed1b5a9b8&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
                             </div> 
                        </div> 
                    </div> 
                 </div> 
            </section> 
        </footer>
    </div>
</body>
</html>
<?php
mysqli_close($conn);