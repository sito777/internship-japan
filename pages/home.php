<!-- header + navigatie -->
<?php 
require_once('temp/header.php');

$sql = "SELECT * FROM company";
$stmt = $conn->prepare($sql);
$stmt->execute();
$companyhome = $stmt->fetchAll();
?>
<div class="banner container-fluid card" id='home'>
    <img class="banner-foto" alt="Prachtig uitzicht van japan foto gemaakt door: ZHIJIAN DAI" src="../img/banner-internjapan.jpg">
    <div class="overlay-text">        
        <h1 class='wit'>test</h1>
        <p class='wit'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum, <br>dui eget pellentesque finibus, urna turpis tincidunt sem, quis pretium risus lectus posuere orci.</p>
        <div class="zoek input-group mb-3">
            <input class="form-control zoekbalk" type="text" placeholder="Dierenarts..">
            <button class="btn btn-outline-danger" type="button" id="button-addon2">Zoek</button>
        </div>
    </div>
</div>
<!-- $items = array_slice($items, -5); -->
<div class="container">
    <div class="row nieuwe-stageplekken sectie-space" id='nieuwe-stageplekken'>
        <h2>Nieuwe stageplekken</h2>
        <?php $recent = array_slice($companyhome, -3);
        foreach ($recent as $recentcomp){?>
            <div class="col-sm-4">
                <div class="card order-danger">
                    <div class="card-body border-danger ">
                        <h5 class="card-title"><?php echo $recentcomp['companyname'];?></h5>
                        <p class="card-text"><?php echo $recentcomp['profiel_text'];?></p>
                        <a href="index.php?page=stageplek-profiel&id=<?php echo $recentcomp['company_id'];?>" class="btn btn-outline-danger rond">Klik voor meer</a>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

    <div class="stageplekken sectie-space" id='stageplekken'>
        <h2>Stageplekken</h2>
        <div class="row">
            <div class="col-sm-12">
                <?php foreach($companyhome as $comp) { ?>
                    <div class="card card-space">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5 class="card-title"><?php echo $comp['companyname'];?></h5>
                                    <p class="card-text"><?php echo $comp['profiel_text'];?></p>
                                    <a href="index.php?page=stageplek-profiel&id=<?php echo $comp['company_id'];?>" class="btn btn-outline-danger rond">Klik voor meer</a>
                                    <!-- Hoe maak ik een link die naar de juiste profielpagina linkt? -->
                                </div>
                                <div class="col-3 col-md-2">
                                    <img class="overlay-img" src="../img/1.png"> 
                                </div>                            
                            </div>
                        </div>
                    </div>            
                <?php }?>
            </div>
        </div>
    </div> 
    
    <!-- <div class="row recent-bekeken sectie-space" id='recent-bekeken'>
        <h2>Recent bekeken</h2>
        <div class="col-sm-4">
            <div class="card order-danger">
                <div class="card-body border-danger">
                    <h5 class="card-title">Titel recent bekeken aan database</h5>
                    <p class="card-text">Beschrijving recent bekeken aan database</p>
                    <a href="#" class="btn btn-outline-danger rond">Klik voor meer</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titel recent bekeken aan database</h5>
                    <p class="card-text">Beschrijving recent bekeken aan database</p>
                    <a href="#" class="btn btn-outline-danger rond">Klik voor meer</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titel recent bekeken aan database</h5>
                    <p class="card-text">Beschrijving recent bekeken aan database</p>
                    <a href="#" class="btn btn-outline-danger rond">Klik voor meer</a>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- footer  -->
<?php 
require_once('./temp/footer.php');
?>