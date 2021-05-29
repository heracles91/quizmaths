<?php
    session_start();
    if($id==$_SESSION['id']){
        header("location: moncompte");
    }
    include("../fonctions.php");
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
    $req=mysql_query('SELECT * FROM identifiants WHERE id="'.$id.'";') or die('ERREUR SQL ! <br>'.$req.'<br>'.mysql_error());
    $infos = mysql_fetch_array($req);
    $bio = $infos['bio'];
    if($infos['profilepicture']==""){
        if($infos['sexe']=="homme"){
            $profilepicture="avatar-male.png";
        }else{
            $profilepicture="avatar-female.png";
        }
        $register=false;
    }else{
        $profilepicture="users/".$infos['profilepicture'];
        $register=true;
    }
    if(isset($_POST['message'])){
        connectMaBase();
        $msgenvoye=$_POST['msgenvoye'];
        $req='INSERT INTO messages (destinataire, expediteur, contenu)
            VALUES ('.$infos["id"].', '.$_SESSION['id'].', "'.$msgenvoye.'");';
        mysql_query($req) or die('ERREUR SQL ! <br>'.$req.'<br>'.mysql_error());
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <title><?php echo($infos['prenom']." (@".$infos['username'].") / ToutSurLesMaths"); ?></title>
    <link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link href="/quizmaths/users/userstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
    <style>
        #myImg {
            cursor: pointer;
        }
    </style>
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
                            echo('<li><a href="/quizmaths/moncompte">'.$_SESSION['prenom'].'</a></li>');
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
    <div class="block2" style="width: fit-content;">
    <?php echo('<img id="myImg" src="/quizmaths/images/'.$profilepicture.'" class="profile-picture" style="border-radius: 50px;">'); ?>
        <div>
            <h3><?php echo($infos['prenom']); ?></h3>
            <p>@<?php echo($infos['username']); ?></p>
            <p>"<?php echo($infos['bio']); ?>"</p>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
    <?php
    if($_SESSION['logged_in']==true){
        echo('<div style="display: flex;justify-content: flex-end;position: sticky;bottom: 10px;">
            <form action="" method="POST" class="messagesbox">
                <div style="overflow: hidden scroll;">');
        connectMaBase();
        $req = mysql_query('SELECT contenu, destinataire 
        FROM messages 
        WHERE destinataire ='.$_SESSION["id"].' AND expediteur ='.$infos["id"].' 
        OR destinataire ='.$infos["id"].' AND expediteur ='.$_SESSION["id"].' 
        ORDER BY id') or die('ERREUR SQL ! <br>'.$req.'<br>'.mysql_error());
        $messages = array();
        while($ligne = mysql_fetch_array($req)){
            $messages = $ligne;
            if($messages["destinataire"]==$infos["id"]){
                echo "<div class='msgenvoye'>";
                echo $messages["contenu"]."</div>";
            }else{
                echo "<div class='msgrecu'>";
                echo $messages["contenu"]."</div>";
            }
        }
        echo('</div>
                <div class="sendbox">
                    <textarea maxsize="300" style="width: 50%;" name="msgenvoye"></textarea>
                    <button type="submit" name="message" class="sendmsg">Envoyer</button>
                </div>
            </form>
        </div>');
    }
    ?>
</main>
<?php if($_SESSION['logged_in']==false){
    echo('
    <footer class="user-footer">
        <div>
        <h3>Ne restez pas là, devenez plus fort et révisez vos maths comme '.$infos["prenom"].'.</h3>
        <p>Inscrivez vous pour avoir vous aussi un profil comme celui-ci.</p>
        </div>
        <a href="login">Se connecter</a>
    </footer>');
 } ?>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<script type="text/javascript" src="/quizmaths/users/modal.js"></script>
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