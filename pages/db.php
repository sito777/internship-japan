<?php
$servername = "localhost";
$username= "root";
$passwoord = "root";

try {
    $conn = new PDO("mysql:host=$servername;port=8888;dbname=japan", $username, $passwoord);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "connection failed:" . $e->getMessage();
}

?>