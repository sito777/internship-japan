<?php 
require_once('./temp/header.php');
session_start();
$user = $_SESSION['username'];
$stmt = $conn->prepare("SELECT role FROM user WHERE username LIKE :username");
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();

$role = $stmt->fetchColumn();


$stmt = $conn->prepare("SELECT user_id FROM user WHERE username LIKE :username");
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();

$user_id = $stmt->fetchColumn();
$_SESSION['user'] = $user_id ;
?>

<?php
// company 
if($role == 1){
    $sql = "DELETE FROM comapny_id WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $sql = "DELETE FROM user WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    header('location: index.php?page=home');
}
?>

<?php 
// intern 
if($role == 2){
    $sql = "DELETE FROM itern WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $sql = "DELETE FROM user WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    header('location: index.php?page=home');
}
?>

<?php 
require_once('./temp/footer.php');
?>
