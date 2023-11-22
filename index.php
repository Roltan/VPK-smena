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
<html lang="ru"> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Comatible" content="ie-edge">
	<title>ВПК Смена</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/stylefooter.css">
	<link rel="stylesheet" href="css/headermedia.css">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script defer src="js/mediaheader.js"></script>
	<script defer src="js/index-script.js"></script>
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
	<div class="baner-container">
		<img src="img/34.jpg" class="baner-img">
		<div class="overlay">
			
		</div>
		<div class="baner-info-container">
			<span class="baner-info-title">
				Военно-патриотический клуб "Смена"
			</span>
			<p class="baner-info-paragraf">
				Тренировки различной интенсивности и направления – на любой возраст, предпочтения и уровень профессионализма
			</p>
		</div>
	</div>
	<div class="info">
		<div class="info-img">
			<img src="img/1(2).png" class="info-2">
			<div>
				<h1 class="info-1">О клубе</h1>
				<div class="info-text">
					Направления работы военно-патриотического клуба «Смена» включают в себя физическую, военную, парашютную, медицинскую подготовку, общественно-полезный труд и культурно-просветительскую работу. 
					В программу физической подготовки курсантов входит изучение приемов боевого самбо, рукопашного боя, совершение марш-бросков, изучение специальных норм ВСК. 
					Курсанты изучают технику горного туризма, знакомятся с солдатской жизнью. 
					Особое внимание уделяется воспитанию у курсантов таких качеств, как выносливость, сила воли и терпение.
				</div>
			</div>
		</div>
	</div>
	<!-- Начинаем делать блок "Каталог" -->
	<div class="catalog-container">
		<h2 class="catalog-title">
			Галерея
		</h2>

		<div id="carouselExampleAutoplaying" class="carousel slide catalog-my-style w-50" data-bs-ride="carousel">
			<div class="carousel-inner">
				
				<?php
				$row = mysqli_fetch_array($result);
				echo "<div class='carousel-item active'>
						<a href='albom.php'><img src='".$row["img_src"]."' class='bd-placeholder-img bd-placeholder-img-lg d-block img-c' id='caruselIMG'></a>
					</div>";
				while ($row = mysqli_fetch_array($result)){
					echo "<div class='carousel-item'>
						<a href='albom.php'><img src='".$row["img_src"]."' class='bd-placeholder-img bd-placeholder-img-lg d-block img-c' id='caruselIMG'></a>
					</div>";
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
	</div>
	<!-- БЛОК История клуба -->
	<div class="history">
		<div class="history-item"> 
			<h2> История развития Военно-патриотического клуба "Смена"</h2>
		</div>
		<div class="history-title">
			Военно-патриотический клуб «Смена», создан в 1987 году.
			Сокращенное наименование учреждения ВПК «Смена». <br>
			Предприятие является некоммерческой организацией. 
		</div>
		<div class="history-text">
			<div class="history-div-1">
				<div class="history-text-decor patern-1">
					Направления работы военно-патриотического клуба «Смена» включают в себя физическую, военную, парашютную, медицинскую подготовку, общественно-полезный труд и культурно-просветительскую работу. 
					В программу физической подготовки курсантов входит изучение приемов боевого самбо, рукопашного боя, совершение марш-бросков, изучение специальных норм ВСК. 
					Курсанты изучают технику горного туризма, знакомятся с солдатской жизнью. 
					Особое внимание уделяется воспитанию у курсантов таких качеств, как выносливость, сила воли и терпение.
				</div>
				<img src="img/shit.png" class="img-history">
			</div>
			
			<div class="history-div-2">
				<img src="img/plus.png" class="img-history">
				<div class="history-text-decor patern-2">
					На занятиях по медицинской подготовке «сменовцы» знакомятся с кратким курсом анатомии, физиологии и гигиены человека, правилами оказания первой медицинской помощи при травмах и ранениях, изучают приемы само-массажа и аутогенной тренировки. 
					Под руководством инструкторов по парашютной подготовке курсанты ВПК изучают материальную часть парашютов, проходят теоретическую и наземную подготовку. 
					После прохождения медицинской комиссии они сдают экзамен и совершают учебно-тренировочные прыжки с парашютом с самолета АН-2.
				</div>
			</div>
			
			<div class="history-div-1">
				<div class="history-text-decor patern-3"> 
					Обязательным элементом деятельности клуба является общественно-полезный труд.
					Курсанты участвуют во всех мероприятиях, проводимых по благоустройству района. 
					Руководство военно-патриотического клуба «Смена» проводит серьезную культурно-просветительскую работу. 
					Курсанты посещают различные выставки, музеи МВД и ФСБ, изучают историю Вооруженных Сил России. 
					Организуются встречи с ветеранами Великой Отечественной войны, с «афганцами» и участниками войны в Чечне.
				</div>
				<img src="img/book.png" class="img-history">
			</div>
		</div>
	</div>


	<div class="level-training">
		<div class="level-list">
			<span>Подготовка в ВПК состоит из трех ступеней:</span>
			<ul>
				<li>1 ступень – подготовительная группа</li>
				<li>2 ступень – основная группа</li>
				<li>3 ступень – призывная группа</li>
			</ul>
		</div>

		<div>
			<div class="medal-1 medal-level">1</div>
			<div class="level-1 level-text">
				<span>
					Обеспечивать овладение основными навыками и умениями физической, 
					военной подготовки, основами личной гигиены и здорового образа жизни.
					(срок обучения – один год)
				</span>
			</div>
		</div>
		
		<div>
			<div class="medal-2 medal-level">2</div>
			<div class="level-2 level-text">
				<span>
					Обеспечивает условия становления и формирования личности занимающегося, 
					его склонностей, интересов и способностей к социальному самоопределению. 
					Она закладывает фундамент всей подготовки необходимой для получения различных 
					видов подготовки и полноценного включения в общественную жизнь.
					(срок обучения 2 года)
				</span>
			</div>
		</div>
		
		<div>
			<div class="medal-3 medal-level">3</div>
			<div class="level-3 level-text">
				<span>
					Обеспечивает завершение подготовки 2 ступени и позволяет занимающимся посещать занятия на свободной основе. 
					Обучение на 1 и 2 ступени завершается экзаменом. 
					Занимающихся завершивших подготовку на второй ступени автоматически ставят на свой учет органы МВД, ФСБ и райвоенкоматами. 
				</span>
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