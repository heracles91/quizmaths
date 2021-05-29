<?php
    include("fonctions.php");
    include("../quizmaths/users/fonctions/newuser.php");
    session_start();
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
    if($_SESSION['logged_in']==True){
        header("location: moncompte");
    }
    if(isset($_POST['connection'])){
        connectMaBase();
        //récupération des identifiants par méthode POST
        $myusername=$_POST['username'];
        $mypassword=$_POST['password'];

        $result = mysql_query('SELECT id FROM identifiants WHERE username = "'.$myusername.'" AND password = "'.$mypassword.'";');
        $row = mysql_fetch_array($result);
        $active = $row['active'];
      
        $count = mysql_num_rows($result);
        mysql_close();
        //echo('<script>alert("Test n°")</script>');
        
        // If result matched $myusername and $mypassword, table row must be 1 row
        
        if($count == 1) {
           session_register("myusername");
           $_SESSION['login_user'] = $myusername;
         
           header("location: moncompte");
        }else {
           $error = "Votre identifiant ou mot de passe est incorrect.";
        }
     }
    if(isset($_POST['inscription'])){
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $pseudo=$_POST['pseudo'];
        $sexe=$_POST['sexe'];
        $pwd=$_POST['pwd'];
        $confirmation=$_POST['pwd-confirm'];
        if($pwd==$confirmation){
            connectMaBase();
            $req='INSERT INTO identifiants(username, prenom, nom, sexe, password) 
            VALUES("'.$pseudo.'","'.$prenom.'","'.$nom.'","'.$sexe.'","'.$pwd.'");';
            $signin=mysql_query($req) or die('ERREUR SQL ! <br>'.$req.'<br>'.mysql_error());
            $_SESSION['login_user']=$pseudo;
            header("location: moncompte");
            $select='SELECT id FROM identifiants WHERE username="'.$pseudo.'" AND password="'.$pwd.'";';
            $req2=mysql_query($select) or die('ERREUR SQL ! <br>'.$select.'<br>'.mysql_error());
            $id=mysql_result($req2, 0);
            createProfile($pseudo, $id);
            mysql_close();
        }else{
            $wrong_password="Les mots de passe ne sont pas les mêmes";
        }
     }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <title>Connection</title>
    <link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="/quizmaths/css/daynight.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
    <link href="/quizmaths/css/login.css" rel="stylesheet">
</head>
<body onload="checker()">
<header>
    <section class="section-header">
            <div class="boutton-menu" style="display: none;">
                <a onclick="displayMenu()">&#9776;</a>
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
        </ul>
    <img class="logo" src="/quizmaths/images/icon.png" alt="Logo du site">
    <ul>
        <li><a href="/quizmaths/moncompte">Mon Compte</a></li>
        <li><a href="#">Contact</a></li>
        <div class="wrapper">
            <div class="toggle">
                <input class="toggle-input" name="nightmodecheckbox" type="checkbox"/>
                <div class="toggle-bg"></div>
                <div class="toggle-switch">
                <div class="toggle-switch-figure"></div>
                <div class="toggle-switch-figureAlt"></div>
                </div>
            </div>
        </div>
    </ul>
    </section>
</header>
<div id="search_page"></div>
<main>
   <div class="modal">
    <div class="modal-content animate container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST" autocomplete="off">
                <h1>Créer un compte</h1>
                <div class="radio-container">
                    <div class="radio">
                        <input type="radio" id="homme" value="homme" name="sexe" required>
                        <label for="homme">Homme</label>
                        </div><div class="radio">
                        <input type="radio" id="femme" value="femme" name="sexe" required>
                        <label for="femme">Femme</label><br>
                    </div>
                </div>
                <input type="text" name="prenom" placeholder="Prénom" maxlength="40" autocapitalize="words" required>
                <input type="text" name="nom" placeholder="Nom" maxlength="40" autocapitalize="words" required>
                <input type="text" name="pseudo" placeholder="Pseudo" maxlength="20" minlength="4" required>
                <input type="password" name="pwd" id="mdp1" placeholder="Mot de passe" maxlength="40" required>
                <input onkeyup="motdepasse()" type="password" name="pwd-confirm" id="mdp2" placeholder="Confirmer le mot de passe" required>
                <p id="mismatch" style="margin: -5px 0;"></p>
                <button type="submit" name="inscription">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1>Se connecter</h1>
                <input type="text" name="username" placeholder="Pseudo" required/>
                <input type="password" name="password" placeholder="Mot de Passe" required/>
                <div style="display: flex;width: 100%;justify-content: flex-start;align-items: center;">
                    <input type="checkbox" id="showpwd" style="width: fit-content;" />
                    <label for="showpwd">Afficher le mot de passe</label>
                </div>
                <?php echo('<div style = "color:#cc0000; margin-top:10px">'.$error.'</div>'); ?>
                <a class="link" href="#">Mot de passe oublié?</a>
                <button type="submit" name="connection">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bon retour parmis nous !</h1>
                    <p>Si tu as déjà un compte merci de te connecter ici</p>
                    <p>En te créant un compte tu acceptes les <a href="terms-conditions.php" class="link">Conditions d'utilisation</a></p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue à toi !</h1>
                    <p>Inscris-toi parmis nous et commence tes révions de maths</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
	</div>
</div>           
   </div>
</main>
<script>
    var pwd = document.querySelector("input[name=password]");
    var showpwd = document.getElementById("showpwd");
    showpwd.addEventListener('change', function() {
        if (this.checked){
            pwd.type = "text";
        } else {
            pwd.type = "password";
        }
    })
</script>
<script>
    function motdepasse(){
        var mdp1 = document.getElementById("mdp1").value;
        var mdp2 = document.getElementById("mdp2").value;
        if(mdp1==mdp2){
            document.getElementById("mismatch").innerHTML = ("");
        }else{
            document.getElementById("mismatch").innerHTML = ("Les mots de passe ne correspondent pas");
        }
        var php = "<?php  ?>";
    }
</script>
<script type="text/javascript">
//if i click somewhere else than the form
    document.addEventListener("click", (formulaire) => {
    const login = document.getElementsByClassName("modal");
    let mouse = formulaire.target; // clicked element      
    if(mouse == login[0]) {
        window.history.back();
    return;
    }
    });
</script>
<script type="text/javascript" src="/quizmaths/js/login.js"></script>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<?php
    $themeClass = '';
    if (!empty($_COOKIE['theme'])) {
      if ($_COOKIE['theme'] == 'dark') {
        $themeClass = 'dark-theme';
        echo('<script type="text/javascript">
        var x = document.querySelector("input[name=nightmodecheckbox]");
        x.checked = true;
        setNightMode();
        var a = document.getElementsByClassName("modal-content");
        a[0].classList.add("dark-theme");
        /*var b = document.getElementsByClassName("bottom");
        b[0].classList.add("dark-theme");*/
        </script>');
      } else if ($_COOKIE['theme'] == 'light') {
        $themeClass = 'light-theme';
      }
    }
?>
</body>
</html>