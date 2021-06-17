<!-- header + navigatie -->
<?php 
$id = intval($_GET['id']);
if ($id == 0){
    echo 'Deze profiel bestaat niet';
} else{
    $sql = "SELECT * FROM company WHERE company_id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $stagecomp = $stmt->fetchAll();
    if (count($stagecomp) == 0){
        echo 'er is geen data beschikbaar';
    }  else {
        require_once('./temp/header.php');          
?>
    <!-- body  -->
    <div class="container row-space">
        <?php foreach($stagecomp as $comp){?>
            <div class="row row-space">
                <div class="col-9">            
                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/<?php echo $comp['video']?>;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="titel"><?php echo $comp['companyname'];?></h2>   
                        </div>
                        <div class="col-12">
                            <p class="broodtekst"><?php echo $comp['profiel_text']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="titel"><?php echo $comp['position'];?></h2>
                        </div>
                        <div class="col-12">
                            <p class="broodtekst"><?php echo $comp['position_text']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-2">
                    <img class="overlay-img" src="../img/1.png">
                </div>
            </div>
            <div class="row row-space">
                <div class="col-12">
                    <h2 class="titel"><?php echo substr($comp['field'],0, 10)?></h2>
                </div>
                <div class="col-7">
                    <p class="broodtekst"><?php echo $comp['field']?></p>
                </div>        
            </div>

            <div class="row-space contact">
                <div class="section-title">
                    <h3><span>Contact Us</span></h3>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12">
                        <div class="info-box mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <h3>Our Address</h3>
                            <p><?php echo $comp['street_adress'].', '. $comp['city']. ', '. $comp['postal_code']?></p>
                        </div>
                    </div>                    
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" min="3" placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" min="3" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
<?php
}
}
// footer
require_once('./temp/footer.php');
?>