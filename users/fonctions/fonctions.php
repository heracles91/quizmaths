<?php
function connectMaBase(){
    $base = mysql_connect ('localhost', 'root', 'root');  
    mysql_select_db ('quizmaths', $base) or die('ERREUR SQL ! <br> jsp <br>'.mysql_error());
}
?>