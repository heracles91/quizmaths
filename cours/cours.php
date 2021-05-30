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
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <title>Cours de maths</title>
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
					<li><a class="link" href="/quizmaths/cours/6e/Cours Décimaux.pdf" target="_blank">Nombres Entiers</a></li>
					<li><a class="link" href="/quizmaths/cours/6e/Eléments de Géométrie.pdf" target="_blank">Element de Géométrie</a></li>
					<li><a class="link" href="/quizmaths/cours/6e/Addition Soustraction Multiplication.pdf" target="_blank">Addition, Soustraction, Multiplication</a></li>
					<li><a class="link" href="/quizmaths/cours/6e/Droites.pdf" target="_blank">Droites Parallèles et Perpendiculaires</a></li>
					<li><a class="link" href="/quizmaths/cours/6e/Partage Fraction.pdf" target="_blank">Partage et Fraction</a></li>
				</ul>
			</div>
			<div>
				<h1>Cinquième</h1>
				<ul>
					<li><a class="link" href="/quizmaths/cours/5e/Calcul Littéral.pdf" target="_blank">Calcul Litteral</a></li>
					<li><a class="link" href="/quizmaths/cours/5e/Nombres Relatifs.pdf" target="_blank">Nombres Relatifs</a></li>
					<li><a class="link" href="/quizmaths/cours/5e/Parallélogramme.pdf" target="_blank">Parallèlogrammes</a></li>
					<li><a class="link" href="/quizmaths/cours/5e/Prisme et Cylindre.pdf" target="_blank">Prismes et Cylindres</a> | <a class="link" href="/quizmaths/cours/5e/volume.pdf" target="_blank">Volume</a></li>
					<li><a class="link" href="/quizmaths/cours/5e/Proportionnalité.pdf" target="_blank">Proportionnalité</a></li>
				</ul>
			</div>
		</div>
		<div>
			<div>
				<h1>Quatrième</h1>
				<ul>
					<li><a class="link" href="/quizmaths/cours/4e/Probabilités.pdf" target="_blank">Probabilité</a></li>
					<li><a class="link" href="/quizmaths/cours/4e/Pythagore.pdf" target="_blank">Théorème de Pythagore et sa Réciproque</a></li>
					<li><a class="link" href="/quizmaths/cours/4e/Equations.pdf" target="_blank">Equations</a></li>
					<li><a class="link" href="/quizmaths/cours/4e/Puissances.pdf" target="_blank">Puissances</a></li>
					<li><a class="link" href="/quizmaths/cours/4e/Proportionnalité.pdf" target="_blank">Proportionnalité</a></li>
				</ul>
			</div>
			<div>
				<h1>Troisième</h1>
				<ul>
					<li><a class="link" href="/quizmaths/cours/3e/Arithmétique.pdf" target="_blank">Arithmétique</a></li>
					<li><a class="link" href="/quizmaths/cours/3e/Homothetie.pdf" target="_blank">Homothétie</a> | <a class="link" href="/quizmaths/cours/3e/Thalès.pdf" target="_blank">Théorème de Thalès</a></li>
					<li><a class="link" href="/quizmaths/cours/3e/Inégalités et Inéquations.pdf" target="_blank">Inegalités et Inéquations</a></li>
					<li><a class="link" href="/quizmaths/cours/3e/Statistiques.pdf" target="_blank">Statistiques</a></li>
					<li><a class="link" href="/quizmaths/cours/3e/Triangles Semblables.pdf" target="_blank">Triangles Semblabes</a></li>
				</ul>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<?php
    $themeClass = '';
    if (!empty($_COOKIE['theme'])) {
      if ($_COOKIE['theme'] == 'dark') {
        $themeClass = 'dark-theme';
        echo('<script type="text/javascript">
        var x = document.querySelector("input[name=nightmodecheckbox]");
        x.checked = true;
        setNightMode();
        </script>');
      } else if ($_COOKIE['theme'] == 'light') {
        $themeClass = 'light-theme';
      }
    }
?>
</body>
</html>