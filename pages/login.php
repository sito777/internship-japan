<?php
    session_start();
    require_once('db.php');

    if(isset($_POST['submit'])) {
        $stmt = $conn->prepare("SELECT password FROM user WHERE username LIKE :username"); // ophalen password van username
        $stmt->bindParam(":username", $_POST['username']); // bind username aan post van username
        $stmt->execute();
    
        $dbhash = $stmt->fetchColumn(); // haalt password op
    
        if(password_verify($_POST['password'], $dbhash)) {
            $_SESSION['username'] = $_POST['username'];
            header('location: index.php?page=profiel-pagina');
        } else {
            echo "Wachtwoord of gebruikersnaam is incorrect";
        }     
    }
?>
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
        <div class="container-fluid zero-padding">
            <div class="row">
                <!-- afbeelding -->
                <div class="col-md-6 d-none d-md-block zero-padding">
                    <img src="../img/manuel-cosentino-7IO8Uei5TzA-unsplash.jpg" class="inlog-img col-12">
                </div>
                <!-- inlog sectie -->
                <div class="col-md-6">
                    <div class="align-items-center inlog-sectie">
                        <form name="x" method="post" action="">
                            <div>
                                <img src="../img/logo.png" class="inlog-logo" width="60%" alt="Logo internship japan" >
                            </div>
                            <div class="inlog-input">
                                <div class="input-group mb-3">
                                    <input name="username" maxlength="50" minlength="7" type="text" class="form-control inlog-form" placeholder="Email" aria-label="Recipient's email" aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input name="password" type="password" minlength="7" maxlength="255" class="form-control inlog-form" placeholder="Wachtwoord" aria-label="Recipient's password" aria-describedby="basic-addon2" required>   
                                </div>
                            </div>
                            <div class="inlog-opties">
                                <div class="row">
                                    <div class="col-9 zero-padding">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <a href="index.php?page=wachtwoord-vergeten" class="text-secondary link-hover">Wachtwoord vergeten</a>
                                            </div>
                                            <div class="col-12 col-md">
                                                <a href="index.php?page=registreren" class="text-secondary link-hover">Account aanmaken</a>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 zero-padding">
                                    <button type="submit" name="submit" class="btn btn-outline-danger rond rechts-uitlijnen">Inloggen</button>
                                    </div>
                                </div>                            
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>     
        </div>
    </body>
</html>

<?php require_once('temp/footer.php')?>