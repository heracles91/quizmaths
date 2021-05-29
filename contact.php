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
    <link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
    <title>Tout sur les maths</title>
    <link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        .presentation {
            display: flex;
            width: 550px;
        }
    </style>
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
        <div>
            <div class="presentation">
                <img src="images/oma.png" class="home-img">
                <div>
                    <h3>Omaima SKALLI BOUAZIZA</h3>
                    <p>"C'est vraiment LE site qu'il faut pour réviser. 
                        Il est simple à utiliser, il y a tout ce qu'il faut dessus,
                        plusieurs niveaux, etc.<br> Même si c'est pour collège, 
                        il m'a permis de revoir des notions que j'avais COMPLETEMENT oubliées..."
                    </p>
                </div>
            </div>
            <div class="presentation">
                <img src="images/jade.png" class="home-img">
                <div>
                    <h3>Jade GAY</h3>
                    <p>"Je suis venu m'entrainer tous les jours sur 
                        <strong>ToutSurLesMaths.com</strong>,
                        et c'est ce qui m'a permis d'obtenir 
                        mon Bac avec mention !<br>
                        Je le recommande fortement."
                    </p>
                </div>
            </div>
            <div class="presentation">
                <img src="images/kevin.png" class="home-img">
                <div>
                    <h3>Kévin KAMENI</h3>
                    <p>"Honnêtement je pensais être en
                        échec scolaire (je le suis peut-être toujours..)
                        mais en découvrant <strong>ToutSurLesMaths</strong>
                        j'ai l'impression de mieux réussir mon année
                        J'ai revu des bases et j'ai même découvert
                        des choses que je n'avais jamais vu !"
                    </p>
                </div>
            </div>
        </div>
	</main>
	<footer class="links-bottom" class="links-bottom">
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