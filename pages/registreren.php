<?php
if(isset($_POST['submit'])){
    $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user(username, password, role) VALUES (:username,:password, :role)");
    $stmt->bindParam(":username", $_POST['username']);
    $stmt->bindParam(":password", $hashed_pass);
    $stmt->bindParam(":role", $_POST['role']);
    $stmt->execute();

    // haal de meest recente id op 
    $stmt=$conn->prepare("SELECT user_id FROM user WHERE username LIKE :username ORDER BY user_id DESC limit 1");
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
    
    if($_POST['role'] == '1'){
        $stmt = $conn->prepare("INSERT INTO company(user_id, companyname) VALUES (:id, 'vul hier je bedrijfsnaam')");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        header('location: index.php?page=login');
    }
    
    if($_POST['role'] == '2'){
        $stmt = $conn->prepare("INSERT INTO itern(user_id, email, phone, firstname) VALUES (:id, :username, '000000','vul hier je naam in')");
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        header('location: index.php?page=login');
    }
    // if($_POST['role'] == '3'){
    //     header('location: index.php?page=login');
    // }
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
                    <div class="align-items-center registratie-sectie">
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
                                <div class="input-group mb-3">
                                    <input value="<?php echo (isset($_POST['role']) ? $_POST['role'] : '' );?>" type="text" name="role" class="form-control" id="input_role" placeholder="Typ 1, 2 of 3">                                    
                                </div>
                            </div>
                            <div class="inlog-opties">
                                <div class="row">
                                    <div class="zero-padding">
                                        <button type="submit" name="submit" class="btn btn-outline-danger rond rechts-uitlijnen">Account aanmaken</button>
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