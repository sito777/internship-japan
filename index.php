<!-- header + navigatie -->
<?php 
include_once('dbconfig.php');
include_once('template/header.php');
if(isset($_GET['page']) && !empty($_GET['page'])){ //als de page empty is dan
    $pages = ['signup', 'login', 'home'];
    if(in_array($_GET['page'], $pages)){ //check dan of de GET in de array voorkomt
        include_once($_GET['page'].'.php');
    } else { // zo niet laat de 404 pagina zien
        include_once('404.php'); 
    } 
} else { // zo niet laat de home pagina zien
    include_once('home.php');
}
include_once('template/footer.php');

require_once('pages/temp/header.php');
?>

<!-- footer  -->
<?php 
require_once('pages/temp/footer.php');
?>