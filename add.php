<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// вводим данные в php
if(isset($_POST["fam"])){
    $fam = $_POST["fam"];
}
if(isset($_POST["username"])){
    $username = $_POST["username"];
}
if(isset($_POST["patronymic"])){
    $patronymic = $_POST["patronymic"];
}
if(isset($_POST["usernumber"])){
    $usernumber = $_POST["usernumber"];
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["age"])){
    $age = $_POST["age"];
}

// INSERT INTO directions (baner,title,text,coach_fio,coach_foto) VALUES ('', '', '', '', '')
// INSERT INTO directions (baner,title,text,coach_fio,coach_foto) VALUES ('img/4.jpg', 'Парашютная подготовка', 'Парашютная подготовка — сложный учебно-воспитательный процесс, требующий серьезной и систематической работы командиров, специалистов ПС и ПДС и авиационной медицины. Прыжки с парашютом воздействуют на человека комплексом стресс-факторов, требующих определенных морально-волевых усилий и психологической устойчивости. Отличительные особенности данной программы от программ, взятых за основу, является углубленное изучение теоретических основ парашютной подготовки, приобретение устойчивых навыков в укладке парашютных систем для совершения прыжков и в наземной отработке элементов прыжка на снарядах парашютного городка и совершение третьего прыжка на фоне соревновательной деятельности.', 'Кожевников Сергей Викторович', 'img/coachesparashut.jpg')
// заполняем таблицу данными
$sql = "INSERT INTO users (lastname, fisrtname, patronymic, usernumber, email, age) VALUES 
('$fam', '$username', '$patronymic', '$usernumber', '$email', '$age')";
if (mysqli_query($conn, $sql)) {
} 
else {
	echo "Регистрация не пройдена!" . "<br>";
}
?>
<!DOCTYPE html>
<html lang="ru"> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width-device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Comatible" content="ie-edge">
		<title>ВПК Смена</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/sign-up-style.css">
		<link rel="stylesheet" href="css/stylefooter.css">
		<link rel="stylesheet" href="css/headermedia.css">
		<link rel="stylesheet" href="css/success.css">
		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script defer src="js/sign-up-script.js"></script>
		<script defer src="js/mediaheader.js"></script>
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
							<ul class="menu__list"> 
								<li><a href="directions.php" class="menu__link">Направления</a></li> 
								<li><a href="sign-up.html" class="menu__link">Записаться</a></li> 
								<li><a href="club.html">Создание клуба</a></li> 
								<li><a href="" class="menu__link">Достижения</a></li> 
								<li><a href="contact.html" class="menu__link">Контакты</a></li> 
							</ul> 
						</nav> 
					</div> 
				</div> 
			</div> 
		</header>


		<div class="baner-container">
			<img src="img/5.jpg" class="baner-img">
			<div class="overlay"></div>
			<div class="baner-info-container">
				<h1 class="baner-info-title">
					Записаться в военно-патриотический клуб "Смена"
				</h1>
				<div class="block-container">
					<div class="block-info">
						<h4>Успешно! Ваша заявка будет рассмотрена в ближайшее время!</h4>
						<a href="index.php"><button class="link__home">Главная</button></a>	
					</div>
				</div>
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
