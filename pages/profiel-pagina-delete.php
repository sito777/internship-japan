<?php 
require_once('./temp/header.php'); 
?>

<!-- company  -->
<?php
$sql = "DELETE FROM comapny_id WHERE id = ?"
$stmt = $conn->prepare($sql);
$stmt->execute([$id])
?>

<!-- intern -->
<?php
$sql = "DELETE FROM inter_id WHERE id = ?"
$stmt = $conn->prepare($sql);
$stmt->execute([$id])
?>




<?php 
require_once('./temp/footer.php');
?>
