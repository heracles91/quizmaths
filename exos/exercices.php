<?php
    session_start();
    include("../fonctions.php");
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<link href="/quizmaths/css/style.css" rel="stylesheet" />
	<link href="/quizmaths/exos/css/style.css" rel="stylesheet" />
	<title>Exercices de maths</title>
	<link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
	<link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
</head>

<body onload="checker()">
<header>
	<section class="section-header">
		<div class="boutton-menu" style="display: none; width: 210px;"> <a onclick="displayMenu()" style="width: 40px; cursor:pointer;">&#9776;</a>
			<ul id="menu" class="hidemenu">
				<li><a href="/quizmaths/accueil">Accueil</a></li>
				<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
				<li><a href="exercices">Exercices, Quizz</a></li>
				<?php
					if($_SESSION['logged_in']){
						echo('<li><a href="/quizmaths/moncompte">'.$infos['prenom'].'</a></li>');
					}else{
						echo('<li><a href="login">Me connecter</a></li>');
					}
				?>
					<li><a href="mailto:jadeg2003@icloud.com">Contact</a></li>
			</ul>
		</div>
		<ul>
			<li><a href="/quizmaths/accueil">Accueil</a></li>
			<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
			<li><a href="exercices">Exercices, Quizz</a></li>
		</ul> <img class="logo" src="/quizmaths/images/icon.png" alt="Logo du site">
		<ul>
			<?php
			if($_SESSION['logged_in']){
				echo('<li id="compte"><a href="/quizmaths/moncompte">'.$infos['prenom'].'</a></li>');
			}else{
				echo('<li id="compte"><a href="login">Me connecter</a></li>');
			}
			?>
			<div style="display: flex;justify-content: space-around;align-items: center;">
				<form action="" class="searchbar">
					<input type="search"> <i class="fa fa-search"></i> </form>
				<div class="wrapper">
					<div class="toggle">
						<input class="toggle-input" name="nightmodecheckbox" type="checkbox" />
						<div class="toggle-bg"></div>
						<div class="toggle-switch">
							<div class="toggle-switch-figure"></div>
							<div class="toggle-switch-figureAlt"></div>
						</div>
					</div>
				</div>
			</div>
		</ul>
	</section>
</header>
<div id="search_page"></div>
<main>
    <div class="niveaux">
		<div>
			<div>
				<h1>Sixième</h1>
				<ul>
					<li><a class="link" href="calcul-mental-6e">Calcul Mental</a></li>
					<li><a class="link" href="formules-6e">Formules à completer</a></li>
				</ul>
			</div>
			<div>
				<h1>Cinquième</h1>
				<ul>
					<li><a class="link" href="calcul-mental-5e">Calcul Mental</a></li>
					<li><a class="link" href="#">Formules à completer</a></li>
				</ul>
			</div>
		</div>
		<div>
			<div>
				<h1>Quatrième</h1>
				<ul>
					<li><a class="link" href="calcul-mental-4e">Calcul Mental</a></li>
					<li><a class="link" href="#">Formules à completer</a></li>
				</ul>
			</div>
			<div>
				<h1>Troisième</h1>
				<ul>
					<li><a class="link" href="calcul-mental-3e">Calcul Mental</a></li>
					<li><a class="link" href="#">Formules à completer</a></li>
				</ul>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<?php
$themeClass = '';
if (!empty($_COOKIE['theme']))
{
    if ($_COOKIE['theme'] == 'dark')
    {
        $themeClass = 'dark-theme';
        echo ('<script type="text/javascript">
        var x = document.querySelector("input[name=nightmodecheckbox]");
        x.checked = true;
        setNightMode();
        </script>');
    }
    else if ($_COOKIE['theme'] == 'light')
    {
        $themeClass = 'light-theme';
    }
}
?>
</body>
</html>