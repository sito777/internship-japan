<?php
require_once('db.php');
// require_once('temp/header.php');
if(isset($_GET['page']) && !empty($_GET['page'])){ //als de page empty is dan
    $pages = ['registreren', 'login', 'home','over','wachtwoord-vergeten', 'contact','stageplek-profiel'];
    if(in_array($_GET['page'], $pages)){ //check dan of de GET in de array voorkomt
        include_once($_GET['page'].'.php');
    } else { // zo niet laat de 404 pagina zien
        include_once('404.php'); 
    } 
}
 else { // zo niet laat de home pagina zien
    include_once('home.php');
}
require_once('temp/footer.php');
?>

