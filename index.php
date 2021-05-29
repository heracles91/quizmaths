<?php
    session_start();
    include("fonctions.php");
    include("daynight.php");
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <link href="/quizmaths/css/slick.css" rel="stylesheet"/>
    <link href="/quizmaths/css/slick-theme.css" rel="stylesheet"/>
    <link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
    <title>Tout sur les maths</title>
    <link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body onload="checker();">
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
		<section class="block">
			<div class="section-text">
				<h1>Apprenez tous vos cours !</h1>
				<p>Prenez le temps de réviser vos cours en fonction de votre niveau scolaire
					<br> avant de commencer les exercices et mini-quizz proposés.</p>
				<div> <a href="/quizmaths/cours-et-lecons">EN SAVOIR PLUS</a> </div>
			</div> <img class="home-img" src="images/books.png"> </section>
		<section class="block">
			<div class="section-text">
				<h1>Exercez vous !</h1>
				<p>Après avoir bien révisé vos cours, vous pouvez approfondir vos leçons
					<br> en vous exerçant. Choisissez parmis les exercices et quizz proposés. </p>
				<div> <a href="exercices">EN SAVOIR PLUS</a> </div>
			</div> <img style="order:2;" class="home-img" src="images/study.png"> </section>
		<section class="block">
			<div class="section-text">
				<h1>Quelques petites annecdotes<br>sur les Mathématiques !</h1>
				<p>Nous avons selectionné quelques vidéos du vidéaste professeur <a class="link" href="https://www.youtube.com/channel/UCaDqmzanCq4ZYhdEm0Df9Qg" target="_blank">Yvan Monka</a> que
					<br> nous allons vous montrer ici.</p>
			</div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLVUDmbpupCarwVkDvK6Sq_cReHVL3qj3t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe>
		</section>
		<h2>Nos utilisateurs témoignent</h2>
		<div class="slide-users">
			<section class="block users">
				<div class="section-text">
					<p>"Je suis venu m'entrainer tous
						<br> les jours sur <strong>ToutSurLesMaths.com</strong>,
						<br>et c'est ce qui m'a permis d'obtenir
						<br> mon Bac avec mention !
						<br>
						<br>Je le recommande fortement."</p>
					<h3>Jade<br>Assistante marketing</h3> </div> <img src="images/jade.png" class="home-img" style="order:1;"> </section>
			<section class="block users">
				<div class="section-text">
					<p>"C'est vraiment LE site qu'il faut pour réviser.
						<br> Il est simple à utiliser, il y a tout ce qu'il faut dessus,
						<br> plusieurs niveaux, etc.
						<br>
						<br> Même si c'est pour collège, il m'a permis de revoir
						<br> des notions que j'avais COMPLETEMENT oubliées..."</p>
					<h3>Omaima<br>Responsable web marketing</h3> </div> <img src="images/oma.png" class="home-img" style="order:1;"> </section>
			<section class="block users">
				<div class="section-text">
					<p>"Honnêtement je pensais être en
						<br> échec scolaire (je le suis peut-être toujours..)
						<br> mais en découvrant <strong>ToutSurLesMaths</strong>
						<br> j'ai l'impression de mieux réussir mon année
						<br> J'ai revu des bases et j'ai même découvert
						<br> des choses que je n'avais jamais vu !"</p>
					<h3>Kévin<br>Ingénieur en informatique</h3> </div> <img src="images/kevin.png" class="home-img" style="order: 1;"> </section>
		</div>
		<br>
		<br>
		<div class="contact">
			<div style="color: #0D9FDC;">
				<h3>Si vous avez besoin de quoi que ce soit</h3> </div>
			<div class="a-block"> <a href="mailto:kevin.kameni77500@gmail.com">NOUS CONTACTER</a> </div>
		</div>
	</main>
	<footer class="links-bottom">
		<ul class="bot-page">
			<ul>NOTRE SITE
				<li><a href="accueil">Accueil</a></li>
				<li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=kevin.kameni77500@gmail.com&su=ToutSurLesMaths&body=Dites+nous+ce+que+vous+voulez&bcc=jadeg2003@icloud.com" target="_blank">Contact</a></li>
				<li><a href="terms-conditions.php">Conditions générales d'utilisation</a></li>
			</ul>
			<ul>LES NIVEAUX
				<li><a href="6e.php">6e</a></li>
				<li><a href="5e.php">5e</a></li>
				<li><a href="4e.php">4e</a></li>
				<li><a href="3e.php">3e</a></li>
			</ul>
			<div class="reseaux">
				<a href="https://www.instagram.com/__jxdde__/" target="_blank"><img src="images/instagram.png"></a>
				<a href="https://twitter.com/SbOmaa?s=20" target="_blank"><img src="images/twitter.png"></a>
				<a href="https://www.tiktok.com/@__jxdde__?lang=fr" target="_blank"><img src="images/tiktok.png"></a>
				<a href="https://www.youtube.com/channel/UC0y_0oUVZeCrCzAZRvG6cig" target="_blank"><img src="images/youtube.png"></a>
			</div>
		</ul>
	</footer>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
<script type="text/javascript" src="/quizmaths/js/slick.js"></script>
<script type="text/javascript">
    $('.slide-users').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
</script>
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