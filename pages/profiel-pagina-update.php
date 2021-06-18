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
?>

<!-- company update  -->
<?php 
if($role == 1){
    $sql = "SELECT * FROM company WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    if(isset($_POST['update'])){
        $sql = "UPDATE company SET (companyname, street_adress, postal_code, country_id , field, position, position_text, profiel_text, video) VALUE (:companyname, :street_adress, :postal_code, :country_id, :field, :position, :position_text, :profiel_text, :video) WHERE company_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':companyname', $companyname);
        $stmt->bindParam(':street_adress', $street_adress);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':country_id', $country_id);
        $stmt->bindParam(':field', $field);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':position_text', $position_text);
        $stmt->bindParam(':profiel_text', $profiel_text);
        $stmt->bindParam(':video', $video);
        $stmt->execute();
        header('location: index.php?page=profiel-pagina');
    }
    ?>
    <?php foreach($result as $item){?>
        <div class="container row-space">
            <div class="row col-lg-6 offset-lg-3">
                <form name="x" method="post" action="">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Bedrijfs naam</span>
                        <input name="companyname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" maxlength="120" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Adres</span>
                        <input name="street_adress" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="60" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Stad</span>
                        <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="30" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Postcode</span>
                        <input name="postal_code" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="10" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Land code</span>
                        <input name="country_id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" maxlength="3" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Veld</span>
                        <input name="field" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Positie</span>
                        <input name="position" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="50" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Positie tekst</span>
                        <input name="position_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="1000" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Profiel tekst</span>
                        <input name="profiel_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="500" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Video link</span>
                        <input name="video" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="11" maxlength="11" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>    
            </div>
        </div>
    <?php }?>
<?php
}
?>

<!-- intern update  -->
<?php
if($role == 2) {
    
    $sql = "SELECT * FROM itern WHERE user_id LIKE :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    if(isset($_POST['update'])){
        $sql = "UPDATE itern SET (surname, street_adress, postal_code, country_id , field, position, position_text, profiel_text, video) VALUE (:surname, :street_adress, :postal_code, :country_id, :field, :position, :position_text, :profiel_text, :video) WHERE company_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':street_adress', $street_adress);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':country_id', $country_id);
        $stmt->bindParam(':field', $field);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':position_text', $position_text);
        $stmt->bindParam(':profiel_text', $profiel_text);
        $stmt->bindParam(':video', $video);
        $stmt->execute();
        header('location: index.php?page=profiel-pagina');
    }
    ?>
    <div class="container row-space">
        <div class="row col-lg-6 offset-lg-3">
            <form>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Voornaam</span>
                    <input name="firstname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" maxlength="30" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Achternaam</span>
                    <input name="surname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="60" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" maxlength="50" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Mobile nummer</span>
                    <input name="phone" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="15" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Stad</span>
                    <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="60" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Straatnaam</span>
                    <input name="street_address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="60" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Geboortedatum </span>
                    <input name="date_of_birth" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" minlength="3" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nationaliteit</span>
                    <input name="nationality" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="100" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Moedertaal </span>
                    <input name="native_language" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tweede taal </span>
                    <input name="second_language" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Postcode</span>
                    <input name="postal_code" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="10" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Land code</span>
                    <input name="country_id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" maxlength="3" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Huidige studie</span>
                    <input name="study" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="120" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Studies</span>
                    <input name="already_graduated" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="255" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Profiel tekst</span>
                    <input name="profile_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="" maxlength="500" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Linkedin</span>
                    <input name="linkedin" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="255" maxlength="11" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Instagram</span>
                    <input name="instagram" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="255" maxlength="11" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Facebook</span>
                    <input name="facebook" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="255" maxlength="11" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Video link</span>
                    <input name="video" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="11" maxlength="11" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Profiel foto</span>
                    <input name="profile_image" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="" minlength="100" maxlength="11" required>
                </div>
                <button type="submit" class="btn btn-primary" href="index.php?page=profiel-pagina">Update</button>
            </form>    
        </div></div>
<?php }?>
<?php require_once('temp/footer.php')?>