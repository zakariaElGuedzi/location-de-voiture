<?php
include_once "Admin/includes/database.php";
if(isset($_POST['ChercherVeh'])){
    if(empty($_POST['LieuDepart']) || empty($_POST['DateDepart']) || empty($_POST['HeureDepart']) || empty($_POST['DateResti']) || empty($_POST['LieuResti'])){
        $error =   "Veuillez remplir tous les champs";
        // header("location:../ListeVehicle/listevehicules.php");
    }else{
        $Search = true;
        $LieuDepart = $_POST['LieuDepart'];
        $DateDepart = $_POST['DateDepart'];
        $HeureDepart = $_POST['HeureDepart'];
        $DateResti = $_POST['DateResti'];
        $LieuResti = $_POST['LieuResti'];
        header("location:../ListeVehicle/listevehicules.php?LD=$LieuDepart&DD=$DateDepart&HD=$HeureDepart&DR=$DateResti&LR=$LieuResti&Search=$Search");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company | Location de Voiture</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/stylecopy.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/56fdb73019.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
        <img src="img/lgBlack.png" alt="PerlaPlayaLogo">
        <ul>
            <li>
                <a href=""><b>Acceuil</b></a>
                <a href="OurCars/NosVoiture.php">Nos Voiture</a>
                <a href="AboutUs/AboutUs.php">À propos de nous</a>
                <a href="">Contact</a>
            </li>
        </ul>
        <button>Reserver Maintenant</button>
        </nav>
    </header>
    <main>
        <!-- Main content -->
        <div class="ImageContainer">
            <div class="BookingContainer">
                <div class="BookingTextContainer">
                    <h1>PERLA PLAYA</h1>
                    <h2>Location de voiture</h2>
                    <h5>Location de voitures pour tous les types de voyages</h5>
                    <p>De super voitures à des tarifs avantageux, proposées par les plus grandes sociétés de location de voitures.</p>
                </div>
                <div class="BookingFormContainer">
                    <form class="BookingForm" method="post">
                        <?php
                            if(isset($error)){
                        ?>
                            <div class="MessageErreurNoBooking">
                                <p><?php echo "$error"?></p>
                            </div>
                        <?php
                            }
                        ?>
                        <div class="Input Departure">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="LieuDepart" placeholder="Lieu de prise en charge">
                        </div>
                        <div class="Input DepartureDate">
                            <i class="fa-solid fa-calendar-days"></i>
                            <input type="date" name="DateDepart" placeholder="Date de prise en charge">
                        </div>
                        <div class="Input Departure">
                            <i class="fa-regular fa-clock"></i>
                            <input type="time" name="HeureDepart" placeholder="Heure">
                        </div>
                        <div class="Input ArrivalDate">
                            <i class="fa-solid fa-calendar-days"></i>
                            <input type="date" name="DateResti" placeholder="Date de restitution">
                        </div>
                        <div class="Input Departure">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="LieuResti" placeholder="Lieu de restitution">
                        </div>
                        <button name="ChercherVeh" type="submit">Chercher Vehicule</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Liste Brands -->
         <section class="BrandListe">
            <div class="BrandListeContainer">
                <img src="assets/volkswagen.svg" alt="" srcset="">
                <img src="assets/bmw.svg" alt="" srcset="">
                <img src="assets/mercedes-benz-alt.svg" alt="" srcset="">
                <img src="assets/audi.svg" alt="">
                <img src="assets/renault.svg" alt="" srcset="">
                <img src="assets/opel.svg" alt="" srcset="">
            </div>
         </section>
        <!-- sECTION 3 -->
        <div class="FeaturedCarsTitle">
            <h5>Featured Cars</h5>
            <p>Our vehicle fleet is designed to provide customers with a range of options to choose from , with a focus on comfort , performance and reliability</p>
        </div>
        <section class="FeaturedCars">
            <!--Select 4 Random Cars -->
            <?php
                $stmt = $pdo->prepare('SELECT * FROM cars ORDER BY RAND() LIMIT 4');
                $stmt->execute();
                $cars = $stmt->fetchAll();
                foreach ($cars as $car) {
            ?>
            <div class="CarContainer">
                <div class="CarNameandRow">
                    <h6><?php echo $car['CarName']; ?></h6>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>
                <div class="CarImage">
                    <img src="Admin/<?php echo $car['CarImage']?>" alt="">
                </div>
                <div class="CarOption">
                    <div class="option">
                        <i class="fa-solid fa-user"></i>
                        <p><?php echo $car['CarSeats']; ?></p>
                    </div>
                    <div class="option">
                        <i class="fa-solid fa-gear"></i>
                        <p><?php echo $car['CarTransmission']; ?></p>
                    </div>
                    <div class="option">
                        <b><?php echo $car['CarOriginalPrice'];?>/3 days</b>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
        
        <div class="ButtonCars">
            <button>Check all cars                <i class="fa-solid fa-arrow-right-long"></i></button>
        </div>
        <!-- end sECTION 3 -->

        <!-- sECTION 3 -->
         <section class="WhyPerlaSection">
            <div class="PerlaText">
                <h3>Pourquoi PERLA PLAYA ?</h3>
                <ul>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <p>Assistance routière 24/7</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <p>Service client personnalisé</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <p>Votre confort à 100%</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <p>Large choix de véhicules</p>
                    </li>
                </ul>
                <button>Reserver Maintenant</button>
            </div>
            <div class="PerlaSectionImage">
                <img src="assets/carimg.png" alt="Dacia Car">
            </div>
         </section>
         <!-- FOOTER -->
         <footer>
            <div class="FirstFooter">
                <div class="LogoFooter">
                    <img src="img/lgBlanc.png" alt="">
                    <h6>"Roulez vers l'aventure : des prix imbattables et des véhicules prêts à vous emmener partout!</h6>
                </div>
                <div class="FooterQuickLinks">
                    <b>Quick Link</b>
                    <a href="">Home</a>
                    <a href="">Our Cars</a>
                    <a href="">About us</a>
                    <a href="">Contact</a>
                </div>
                <div class="FooterNewsLetter">
                    <p>Subscribe to the newsletter</p>
                    <div class="EmailContainer">
                        <input type="text" placeholder="Enter your email">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                </div>
            </div>
            <hr>
            <div class="LastFooter">
                <div class="FooterYears">
                        <p>2024 © PerlaPlaya</p>
                </div>
                <div class="Terms">
                    <ul>
                        <li>
                            <a href="">Terms</a>
                            <a href="">Privacy Policy</a>
                            <a href="">Legal Notice</a>
                            <a href="">Acceblity</a>
                        </li>
                    </ul>
                </div>
                <div class="FooterSocialMedia">
                  <a href=""><img src="assets/instagram.svg" alt="" srcset=""></a>
                  <a href=""><img src="assets/facebook.svg" alt="" srcset=""></a>
                  <a href=""><img src="assets/twitter.svg" alt="" srcset=""></a>
                  <a href=""><img src="assets/youtube.svg" alt="" srcset=""></a>
                </div>
            </div>
         </footer>
    </main>
</body>
<script src="script.js" defer></script>
</html>