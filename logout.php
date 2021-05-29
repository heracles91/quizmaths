<?php
   session_start();
   include("fonctions.php");
   connectMaBase();
   $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
   $infos = mysql_fetch_array($search);
   if($_SESSION['logged_in']==False){
      header("location: accueil");
   }
   if($_GET['logout']==True){
      $_SESSION['logged_in']=False;
      if(session_destroy()) {
         header("Location: accueil");
      }
   }
?>