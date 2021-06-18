<?php 
require_once('./temp/header.php'); 
?>

<!-- company  -->
<?php
// if((!$_GET['company_id']) || empty($_GET['company_id'])){
//     header('location: index.php?page=profiel-pagina');
// }
// $id = interval($_GET['company_id']);

$sql = "DELETE FROM comapny_id WHERE id = ?"
$stmt = $conn->prepare($sql);
$stmt->execute([$id])
?>

<!-- intern -->
<?php
// if((!$_GET['inter_id']) || empty($_GET['inter_id'])){
//     header('location: index.php?page=profiel-pagina');
// }
// $id = interval($_GET['inter_id']);

$sql = "DELETE FROM inter_id WHERE id = ?"
$stmt = $conn->prepare($sql);
$stmt->execute([$id])
?>




<?php 
require_once('./temp/footer.php');
?>
