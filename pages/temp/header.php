<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- stylesheet  -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">


    <title>Hello, world!</title>
    </head>   
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=home">
                    <img src="../img/logo.png" width="5%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link link-hover nav-tekst <?php echo (isset($_GET['page']) && $_GET['page'] == 'home' ? 'active' : '');?>" aria-current="page" href="index.php?page=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-hover nav-tekst" href="index.php?page=home#stageplekken">Stageplekken</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle link-hover nav-tekst" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Over
                            </a>                        
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item link-hover nav-tekst" href="index.php?page=profiel-pagina">Profiel</a>                   
                                <a class="dropdown-item link-hover nav-tekst" href="index.php?page=profiel-pagina-create">Profiel aanvullen</a>                   
                                <a class="dropdown-item link-hover nav-tekst" href="index.php?page=profiel-pagina-update">Profiel updaten</a>                   
                                <a class="dropdown-item link-hover nav-tekst" href="index.php?page=over">Over</a>                   
                                <a class="dropdown-item link-hover nav-tekst" href="index.php?page=contact">Contact</a>
                                <!-- <a class="dropdown-item link-hover nav-tekst" href="index.php?page=faq">FAQ</a> -->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <div class="nav-space">
                        <a href="https://www.facebook.com/InternshipInJapan/" class="link-secondary link-hover"><ion-icon name="logo-facebook"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a href="https://twitter.com/InternshipInJP" class="link-secondary link-hover"><ion-icon name="logo-twitter"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a href="https://www.instagram.com/internshipinjapan/" class="link-secondary link-hover"><ion-icon name="logo-instagram"></ion-icon></a>
                    </div>
                    <div class="nav-space">
                        <a class="link-secondary text-decoration-none link-hover" href="index.php?page=login">Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <main>