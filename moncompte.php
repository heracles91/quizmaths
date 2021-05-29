<?php
    include ("fonctions.php");
    include ("session.php");
    session_start();
    if ($_SESSION['logged_in'] == False)
    {
        header("location: accueil");
    }
    if ($_GET['logout'] == True)
    {
        $_SESSION['logged_in'] = False;
        if (session_destroy())
        {
            header("Location: accueil");
        }
    }
    if (isset($_POST["modifications"]))
    {
        connectMaBase();
        $new_username = $_POST['identifiant'];
        $new_prenom = $_POST['prenom'];
        $new_nom = $_POST['nom'];
        $new_bio = $_POST['bio'];
        if($_FILES['photo']['name']==""){
            $modif = mysql_query('UPDATE identifiants SET 
            username = "' . $new_username . '", 
            prenom = "' . $new_prenom . '", 
            nom = "' . $new_nom . '", 
            bio = "' . $new_bio . '"
            WHERE id = ' . $_SESSION['id'] . ';') or die('ERREUR SQL ! <br>' . $modif . '<br>' . mysql_error());
        }else{
        // $new_profilepicture = $_FILES['photo']['name'];
        $new_profilepicture = $new_username . '.gif';
        $modif = mysql_query('UPDATE identifiants SET 
            username = "' . $new_username . '", 
            prenom = "' . $new_prenom . '", 
            nom = "' . $new_nom . '", 
            bio = "' . $new_bio . '", 
            profilepicture = "' . $new_profilepicture . '" 
            WHERE id = ' . $_SESSION['id'] . ';') or die('ERREUR SQL ! <br>' . $modif . '<br>' . mysql_error());
        }
        mysql_close();
        // move_uploaded_file($_FILES["photo"]["tmp_name"], 'images/users/' . $_FILES['photo']['name']);
        move_uploaded_file($_FILES["photo"]["tmp_name"], 'images/users/' . $new_username . '.gif');
        header('location : moncompte');
    }

    connectMaBase();
    $req = mysql_query('SELECT profilepicture FROM identifiants WHERE id="' . $_SESSION['id'] . '";');
    $req2 = mysql_query('SELECT sexe FROM identifiants WHERE id="' . $_SESSION['id'] . '";');
    if (!$req2)
    {
        echo ("Impossible d'avoir le résultat");
    }
    $result = mysql_result($req, 0);
    $sexe = mysql_result($req2, 0);
    if ($result == "")
    {
        if ($sexe == "homme")
        {
            $profilepicture = "avatar-male.png";
        }
        else
        {
            $profilepicture = "avatar-female.png";
        }
        $register = false;
    }
    else
    {
        $profilepicture = "users/" . $result;
        $register = true;
    }
    connectMaBase();
    $search = mysql_query('SELECT * FROM identifiants WHERE id=' . $_SESSION['id'] . ';');
    $infos = mysql_fetch_array($search);
    $prenom = $infos['prenom'];
    $nom = $infos['nom'];
    $bio = $infos['bio'];
    $link = "http://localhost/quizmaths/" . $infos['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/quizmaths/css/style.css" rel="stylesheet"/>
    <link href="/quizmaths/css/slick.css" rel="stylesheet"/>
    <link href="/quizmaths/css/slick-theme.css" rel="stylesheet"/>
    <link href="/quizmaths/css/logout-style.css" rel="stylesheet"/>
    <title>Mon Compte</title>
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
        <li><button onclick="displaymodal()">Se déconnecter</button></li>
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
        <li id="compte"><button onclick="displaymodal()">Se déconnecter</button></li>
        <div style="display: flex;justify-content: space-around;align-items: center;">
                <form action="" class="searchbar">
                    <input type="search"> <i class="fa fa-search"></i> </form>
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
    <form method="POST" enctype="multipart/form-data" action="">
    <h2>Photo de profil</h2>
    <section class="block2">
        <?php echo('<img id="pfp" src="/quizmaths/images/'.$profilepicture.'" class="profile-picture">'); ?>
        <div>
        <?php
            echo('<script>function hiddenclick(){document.getElementById("photo").click();}</script>');
            if($register==true){
                echo('<div class="update-pfp">');
                echo('<button onclick="hiddenclick()" type="button">Mettre à jour la photo de profil</button>');
                echo('<input type="image" style="height:50px" src="/quizmaths/images/trashcan.png">');
                echo('</div>');
            }else{
                echo('<button onclick="hiddenclick()" type="button">Ajouter une image de profil</button>');
            }
            echo('<input style="display:none" id="photo" name="photo" type="file" accept=".jpeg, .png, .gif">');
        ?>
        <p>L’image doit être au format JPEG, PNG ou GIF et ne doit pas dépasser 10 Mo. (Format carré si possible)</p>
        </div>
    </section>
    <h2>Paramètre du profil</h2>
    <section class="block2">
        <div style="
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;">
            <div class="lane">
                <h4>Identifiant</h4>
                <input name="identifiant" value="<?php echo($infos['username']) ?>" required>
            </div>
            <div class="lane">
                <h4>Prénom</h4>
                <input name="prenom" value="<?php echo($prenom) ?>" required>
            </div>
            <div class="lane">
                <h4>Nom</h4>
                <input name="nom" value="<?php echo($nom) ?>" required>
            </div>
            <div class="lane">
                <h4>Bio</h4>
                <textarea name="bio" maxlength="300" warp="soft"><?php echo($bio) ?></textarea>
            </div>
            <div class="lane">
                <h4>Lien du Profil</h4>
                <input id="profilelink" value="<?php echo($link); ?>" readonly></input>
            </div>
        </div>
    </section>
    <button type="submit" name="modifications">Enregistrer les modifications</button>
    </form>
    <div id="logout-page" class="logout-modal">
        <span onclick="document.getElementById('logout-modal').style.display='none'"
        class="close" title="Close Modal">&times;</span>
        <div class="modal-content animate" style="width: 310px;">
            <div class="logout-block">
                <img src="/quizmaths/images/icon.png">
                <h3>Me déconnecter ?</h3>
                <p>Vous pouvez toujours vous reconnecter à tout moment. 
                    Si vous voulez simplement changer de compte, vous pouvez le 
                    faire en ajoutant un compte existant.</p>
            </div>
        <div class="container bottom">
        <button class=" cancel" type="button" onclick="document.getElementById('logout-page').style.display='none'">Annuler</button>
        <button class=" confirm" type="button" onclick="window.location.href='logout.php?logout=True'">Se déconnecter</button>
        </div>
        </div>
    </div>
</main>
<footer>
    <h3>Tu veux partager ton profil à tes amis ?</h3>
    <button onclick="clipboard()" style="width: 40%;">Clique ici !</button>
</footer>
<script type="text/javascript">
    function clipboard() {
        var copyText = document.getElementById("profilelink");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        document.execCommand("copy");
    }
</script>
<script type="text/javascript">
    function displaymodal(){
        var modal = document.getElementById('logout-page');
        modal.style.display='flex';
        modal.style.alignContent='center';
        modal.style.justifyContent='center';
        modal.style.alignItems='center';
    // Get the modal
    var modal = document.getElementById('logout-page');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    }
</script>
<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
<script type="text/javascript" src="/quizmaths/js/imagedisplay.js"></script>
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