<?php
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
?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- stylesheet  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">


    <title>Hello, world!</title>
    </head>   
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Stageplekken</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Over
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Over</a></li>
                            <li><a class="dropdown-item" href="#">Team</a></li>
                            <li><a class="dropdown-item" href="#">Contact</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                        </ul>
                    </ul>
                </div>
                <div class="d-flex">
                    <div class="nav-space">
                        <a href="https://www.facebook.com/InternshipInJapan/" class="link-secondary"><ion-icon name="logo-facebook"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a href="https://twitter.com/InternshipInJP" class="link-secondary"><ion-icon name="logo-twitter"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a href="https://www.instagram.com/internshipinjapan/" class="link-secondary"><ion-icon name="logo-instagram"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a class="link-secondary text-decoration-none" href="#"> Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <main >