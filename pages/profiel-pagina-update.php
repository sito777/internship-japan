<!-- header + navigatie -->
<?php 
require_once('temp/header.php');
?>

<!-- company update  -->
<?php 
// if((!$_GET['company_id']) || empty($_GET['company_id'])){
//     header('location: index.php?page=profiel-pagina');
// }
// $id = interval($_GET['company_id']);

$sql = "SELECT * FROM company";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if(isset($_POST['update'])){
    $sql = "UPDATE company SET companyname = ?, street_adress = ?, postal_code = ?, country_id = ?, field = ?, position = ?, position_text = ?, profiel_text = ?, video = ? WHERE company_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['companyname'],
        $_POST['street_adress'],
        $_POST['postal_code'],
        $_POST['country_id'],
        $_POST['field'],
        $_POST['position'],
        $_POST['position_text'],
        $_POST['profiel_text'],
        $_POST['video'],
        $id
    ]);
    header('location: index.php?page=profiel-pagina');
}
?>
<div class="container row-space">
    <div class="row col-lg-6 offset-lg-3">
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Bedrijfs naam</span>
                <input name="companyname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['companyname']) ? $_POST['companyname']: ($result['companyname']))?>" maxlength="120" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Adres</span>
                <input name="street_adress" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['street_adress']) ? $_POST['street_adress']: ($result['street_adress']))?>" maxlength="60" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Stad</span>
                <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['city']) ? $_POST['city']: ($result['city']))?>" maxlength="30" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Postcode</span>
                <input name="postal_code" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['postal_code']) ? $_POST['postal_code']: ($result['postal_code']))?>" maxlength="10" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Land code</span>
                <input name="country_id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['country_id']) ? $_POST['country_id']: ($result['country_id']))?>" maxlength="3" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Veld</span>
                <input name="field" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['field']) ? $_POST['field']: ($result['field']))?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Positie</span>
                <input name="position" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['position']) ? $_POST['position']: ($result['position']))?>" maxlength="50" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Positie tekst</span>
                <input name="position_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['position_text']) ? $_POST['position_text']: ($result['position_text']))?>" maxlength="1000" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Profiel tekst</span>
                <input name="profiel_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['profiel_text']) ? $_POST['profiel_text']: ($result['profiel_text']))?>" maxlength="500" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Video link</span>
                <input name="video" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['video']) ? $_POST['video']: ($result['video']))?>" minlength="11" maxlength="11" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>    
    </div>
</div>

<!-- intern update  -->
<?php 
// if((!$_GET['inter_id']) || empty($_GET['inter_id'])){
//     header('location: index.php?page=profiel-pagina');
// }
// $id = interval($_GET['inter_id']);

$sql = "SELECT * FROM itern";
$stmt = $conn->prepare($sql);
$stmt->execute();
$profiel_user = $stmt->fetchAll();

if(isset($_POST['update'])){
    $sql = "UPDATE company SET firstname = ?, surname = ?, email = ?, phone = ?, city = ?, street_address = ?, date_of_birth = ?, nationality = ?, native_language = ?, second_language = ?, postal_code = ?, country_id = ?, study = ?, already_graduated = ?, profile_text = ?, linkedin = ?, instagram = ?, facebook = ?, video = ?, profile_image = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['city'],
        $_POST['street_address'],
        $_POST['date_of_birth'],
        $_POST['nationality'],
        $_POST['native_language'],
        $_POST['second_language'],
        $_POST['postal_code'],
        $_POST['country_id'],
        $_POST['study'],
        $_POST['already_graduated'],
        $_POST['profile_text'],
        $_POST['linkedin'],
        $_POST['instagram'],
        $_POST['facebook'],
        $_POST['video'],
        $_POST['profile_image'],
        $id
    ]);
    header('location: index.php?page=profiel-pagina');
}
?>
<div class="container row-space">
    <div class="row col-lg-6 offset-lg-3">
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Voornaam</span>
                <input name="firstname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname']: ($result['firstname']))?>" maxlength="30" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Achternaam</span>
                <input name="surname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['surname']) ? $_POST['surname']: ($result['surname']))?>" maxlength="60" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['email']) ? $_POST['email']: ($result['email']))?>" maxlength="50" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Mobile nummer</span>
                <input name="phone" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['phone']) ? $_POST['phone']: ($result['phone']))?>" maxlength="15" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Stad</span>
                <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['city']) ? $_POST['city']: ($result['city']))?>" maxlength="60" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Straatnaam</span>
                <input name="street_address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['street_address']) ? $_POST['street_address']: ($result['street_address']))?>" maxlength="60" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Geboortedatum </span>
                <input name="date_of_birth" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['date_of_birth']) ? $_POST['date_of_birth']: ($result['date_of_birth']))?>" minlength="3" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nationaliteit</span>
                <input name="nationality" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['nationality']) ? $_POST['nationality']: ($result['nationality']))?>" maxlength="100" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Moedertaal </span>
                <input name="native_language" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['native_language']) ? $_POST['native_language']: ($result['native_language']))?>" maxlength="255" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Tweede taal </span>
                <input name="second_language" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['second_language']) ? $_POST['second_language']: ($result['second_language']))?>" maxlength="255" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Postcode</span>
                <input name="postal_code" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['postal_code']) ? $_POST['postal_code']: ($result['postal_code']))?>" maxlength="10" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Land code</span>
                <input name="country_id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['country_id']) ? $_POST['country_id']: ($result['country_id']))?>" maxlength="3" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Huidige studie</span>
                <input name="study" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['study']) ? $_POST['study']: ($result['study']))?>" maxlength="120" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Studies</span>
                <input name="already_graduated" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['already_graduated']) ? $_POST['already_graduated']: ($result['already_graduated']))?>" maxlength="255" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Profiel tekst</span>
                <input name="profile_text" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="" value="<?php echo (isset($_POST['profile_text']) ? $_POST['profile_text']: ($result['profile_text']))?>" maxlength="500" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Linkedin</span>
                <input name="linkedin" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['linkedin']) ? $_POST['linkedin']: ($result['linkedin']))?>" minlength="255" maxlength="11" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Instagram</span>
                <input name="instagram" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['instagram']) ? $_POST['instagram']: ($result['instagram']))?>" minlength="255" maxlength="11" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Facebook</span>
                <input name="facebook" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['facebook']) ? $_POST['facebook']: ($result['facebook']))?>" minlength="255" maxlength="11" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Video link</span>
                <input name="video" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['video']) ? $_POST['video']: ($result['video']))?>" minlength="11" maxlength="11" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Profiel foto</span>
                <input name="profile_image" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  placeholder="" value="<?php echo (isset($_POST['profile_image']) ? $_POST['profile_image']: ($result['profile_image']))?>" minlength="100" maxlength="11" required>
            </div>
            <button type="submit" class="btn btn-primary" href="index.php?page=profiel-pagina">Update</button>
        </form>    
    </div>
</div>
    
<?php require_once('temp/footer.php')?>