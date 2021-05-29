<?php
    session_start();

    $user_check = $_SESSION['login_user'];

    connectMaBase();
    $ses_sql = mysql_query('SELECT * FROM identifiants WHERE username = "'.$user_check.'"');

    $row = mysql_fetch_array($ses_sql);

    $_SESSION['logged_in']=True;
    $login_session = $row['username'];
    $_SESSION['prenom'] = $row['prenom'];
    $_SESSION['nom'] = $row['nom'];
    $_SESSION['id'] = ($row['id']);
    $_SESSION['username']=$login_session;
    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
        die();
   }
?>