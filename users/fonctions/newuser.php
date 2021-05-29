<?php
function createProfile($pseudo, $id){
    $newfile=$pseudo;
    $newphpfile=$pseudo.".php";
    $newuser = fopen("../quizmaths/users/".$newphpfile, "w");
    $text='<?php $id='.$id.'; ?>';
    fwrite($newuser, $text);
    $html=fopen("../quizmaths/users/fonctions/user.php", "r");
    fwrite($newuser, fread($html,filesize("../quizmaths/users/fonctions/user.php")));
    fclose($html); 
    $settings="\nRewriteRule ^".$newfile."$ /quizmaths/users/".$newfile.".php";
    $htacess=fopen("../quizmaths/.htaccess", "a+");
    fwrite($htacess, $settings);
}
?>