<!-- header + navigatie -->
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
// als je een company bent zie je dit
if($role == 1 ){
    $sql = "SELECT * FROM company WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $profiel_company = $stmt->fetchAll(); 
    ?>
    <div class="container row-space">
        <?php foreach($profiel_company as $prof){?>
            <div class="row row-space">
                <div class="col-9">            
                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/<?php echo $prof['video']?>;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="kop">Bedrijfsnaam name:</p>
                            <p class="broodtekst"><?php echo $prof['companyname'];?></p>   
                        </div>
                        <div class="col-12">
                            <p class="kop">Profiel tekst:</p>
                            <p class="broodtekst"><?php echo $prof['profiel_text']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <p class="kop">Positie:</p>
                            <p class="broodtekst"><?php echo $prof['position'];?></p>
                        </div>
                        <div class="col-12">
                            <p class="kop">Positie tekst:</p>
                            <p class="broodtekst"><?php echo $prof['position_text']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-2">
                    <img class="overlay-img" src="../img/1.png">
                </div>
            </div>
            <div class="row row-space">
                <div class="col">
                    <p class="kop">Veld titel:</p>
                    <p class="broodtekst"><?php echo substr($prof['field'],0, 10)?></p>
                </div>
                <div class="col">
                    <p class="kop">Veld titel:</p>
                    <p class="broodtekst"><?php echo $prof['field']?></p>
                </div>        
            </div>

            <div class="row row-space">
                <div class="col">
                    <p class="kop">Adres:</p>
                    <p class="broodtekst"><?php echo $prof['street_adress']?></p>
                </div>
                <div class="col">
                    <p class="kop">Stad:</p>
                    <p class="broodtekst"><?php echo $prof['city']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Postcode:</p>
                    <p class="broodtekst"><?php echo $prof['postal_code']?></p>
                </div>        
            </div>
        <?php }?>
        <div class="row align-items-center">
            <div class="col-4 offset-4">
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-create">Profiel aanmaken</a>
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-update">aanpassen</a>
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-delete">verwijderen</a>
            </div>
        </div>
    </div>
<?php
} ?>
<!-- user -->
<?php
if($role == 2){
    $sql = "SELECT * FROM itern WHERE user_id LIKE user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $profiel_user = $stmt->fetchAll(); 
    ?>
    <div class="container row-space">
        <?php foreach($profiel_user as $user){?>
            <div class="row row-space">
                <div class="col">
                    <p class="kop">First name:</p>
                    <p class="broodtekst"><?php echo $user['firstname']?></p>
                </div>
                <div class="col">
                    <p class="kop">Surname:</p>
                    <p class="broodtekst"><?php echo $user['surname']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Email:</p>
                    <p class="broodtekst"><?php echo $user['email']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Telefoonnummer:</p>
                    <p class="broodtekst"><?php echo $user['phone']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Geboorte datum:</p>
                    <p class="broodtekst"><?php echo $user['date_of_birth']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Land code:</p>
                    <p class="broodtekst"><?php echo $user['country_id']?></p>
                </div>        
            </div>

            <div class="row row-space">
                <div class="col">
                    <p class="kop">Adres:</p>
                    <p class="broodtekst"><?php echo $user['street_address']?></p>
                </div>
                <div class="col">
                    <p class="kop">Stad:</p>
                    <p class="broodtekst"><?php echo $user['city']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Postcode:</p>
                    <p class="broodtekst"><?php echo $user['postal_code']?></p>
                </div>        
            </div>

            <div class="row row-space">
                <div class="col">
                    <p class="kop">Profiel tekst:</p>
                    <p class="broodtekst"><?php echo $user['profile_text']?></p>
                </div>
                <div class="col">
                    <p class="kop">Huideige studie:</p>
                    <p class="broodtekst"><?php echo $user['current_study']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Afgestudeerd:</p>
                    <p class="broodtekst"><?php echo $user['postal_code']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Nationaliteit:</p>
                    <p class="broodtekst"><?php echo $user['nationality']?></p>
                </div>
                <div class="col">
                    <p class="kop">Moedertaal:</p>
                    <p class="broodtekst"><?php echo $user['native_language']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Tweede taal:</p>
                    <p class="broodtekst"><?php echo $user['second_language']?></p>
                </div>        
            </div>

            <div class="row row-space">
                <div class="col">
                    <p class="kop">Linkedin:</p>
                    <p class="broodtekst"><?php echo $user['linkedin']?></p>
                </div>
                <div class="col">
                    <p class="kop">Instagram:</p>
                    <p class="broodtekst"><?php echo $user['instagram']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Facebook:</p>
                    <p class="broodtekst"><?php echo $user['facebook']?></p>
                </div>        
                <div class="col">
                    <p class="kop">Real emp:</p>
                    <p class="broodtekst"><?php echo $user['real_emp']?></p>
                </div>
                <div class="col">
                    <p class="kop">Studies:</p>
                    <p class="broodtekst"><?php echo $user['field_studies']?></p>
                </div>  
                <div class="col">
                    <p class="kop">Studiel:</p>
                    <p class="broodtekst"><?php echo $user['study']?></p>
                </div>        
            </div>

            <div class="row row-space">
                <div class="col-10">
                    <p class="kop">Video:</p>
                    <p class="broodtekst"><?php echo $user['video']?></p>
                </div>
                <div class="col-2">
                    <p class="kop">Profiel foto:</p>
                    <p class="broodtekst"><?php echo $user['profile_image']?></p>
                </div>             
            </div>

        <?php }?>
        <div class="row align-items-center">
            <div class="col-4 offset-4">
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-create">Profiel aanmaken</a>
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-update">aanpassen</a>
                <a type="button" class="btn btn-outline-primary" href="index.php?page=profiel-pagina-delete">verwijderen</a>
                <!-- De links zou ik al eigenlijk moeten verbinden met de id toch? -->
            </div>
        </div>
    </div>
<?php
}
?>
<?php
// footer
require_once('./temp/footer.php');
?>
