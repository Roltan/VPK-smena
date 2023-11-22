<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM directions";
$result = mysqli_query($conn,$query);

$counterRow = 0;
$counterInfo = 0;
$counterPatern = 0;
$active = "active";

mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result))
{
	$counterRow++;
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
	<link rel="stylesheet" type="text/css" href="css/directions-style.css">
	<link rel="stylesheet" href="css/stylefooter.css">
	<link rel="stylesheet" href="css/headermedia.css">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script defer src="js/mediaheader.js"></script>
</head>
<body style="margin: 0;padding:0;">
	<!-- шапка -->
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
							<li><a href="club.html" class="menu__link">Создание клуба</a></li> 
							<li><a href="" class="menu__link">Достижения</a></li> 
							<li><a href="contact.html" class="menu__link">Контакты</a></li> 
						</ul> 
					</nav> 
				</div> 
			</div> 
		</div> 
	</header>


	<!-- слайдер -->
	<div class="overlay"></div>
	<div id="carouselExampleAutoplaying" class="carousel slide catalog-my-style" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<?php
			for ($i = 1;$i < $counterRow;$i++){
				echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$i."' aria-label='Slide 2'></button>"."\n";
			}
			?>
		</div>
		<div class="carousel-inner">
			<?php
			mysqli_data_seek($result, 0);
			while ($row = mysqli_fetch_array($result))
			{
				echo "<div class='carousel-item ".$active."'>
					<img src='".$row["baner"]."' class='d-block w-100 carusel-img'>
					<div class='carousel-caption d-md-block'>
						<h1>".$row["title"]."</h1>
					</div>
				</div>";
				if($active != ""){
					$active = "";
				}
			}
			?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
		  	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  	<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
		  	<span class="carousel-control-next-icon" aria-hidden="true"></span>
		  	<span class="visually-hidden">Next</span>
		</button>
	</div>


	<div class="info-conteiner">
		<?php
			mysqli_data_seek($result, 0);
			while ($arr = mysqli_fetch_assoc($result))
			{ // выводим данные
				$counterInfo++;
				$counterPatern++;
				if($counterInfo == 3){
					$counterInfo = 1;
				};
				if($counterPatern == 4){
					$counterPatern = 1;
				};
				echo "<div class='info-".$counterInfo."'>\n".
						"<div class='info-text-decor patern-".$counterPatern."'>\n".
							"<span class='info-text'>".$arr["text"]."</span>\n".
							"<span class='couch-".$counterInfo."'>руководитель ".$arr["coachFIO"]."</span>\n".
						"</div>\n".
						"<img src='".$arr["coachFOTO"]."' alt='' class='info-img'>\n".
					"</div>\n";
			}
		?>
	</div>

	<div class='admin-panel'>
		<form action="reg-directions.php" method="POST" class='add'>
			<input type="text" placeholder="ссылка на картинку для карусели" name='baner'>
			<input type="text" placeholder="название направления" name='title'>
			<input type="text" placeholder="описание направления" name='text'>
			<input type="text" placeholder="ФИО рковадителя" name='coachFIO'>
			<input type="text" placeholder="ссылка на фото руковадителя" name='coachFOTO'>
			<input type="submit" value="добавить" class='but'>
		</form>
		<form action="del-directions.php" method="POST" class='del'>
			<input type="namber" placeholder='номер строки для удаления' name='ID'>
			<input type="submit" value='удалить' class='but'>
		</form>
	</div>

	<!-- подвал -->
	<footer> 
		<section class="footer">  
			<div class="contrainer"> 
				  <div class="row"> 
					<hr> 
					<div class="col-md-3 col-6"> 
						<h4>Информация</h4> 
						<ul class="list-unstyled list1"> 
							<li><a href="#">Направления</a></li> 
							<li><a href="#">Записаться</a></li> 
							<li><a href="#">Создание клуба</a></li> 
							<li><a href="#">Достижения</a></li> 
							<li><a href="#">Контакты</a></li>
							<li><a href="#">Галерея</a></li> 
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
?>