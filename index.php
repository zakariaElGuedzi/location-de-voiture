<?php
// if(isset($_POST['ChercherVeh'])){
//     if(empty($_POST['LieuDepart']) || empty($_POST['DateDepart']) || empty($_POST['HeureDepart']) || empty($_POST['DateResti']) || empty($_POST['LieuResti'])){
//         $error =   "Veuillez remplir tous les champs";
//         // header("location:../ListeVehicle/listevehicules.php");
//     }else{
//         $Search = true;
//         $LieuDepart = $_POST['LieuDepart'];
//         $DateDepart = $_POST['DateDepart'];
//         $HeureDepart = $_POST['HeureDepart'];
//         $DateResti = $_POST['DateResti'];
//         $LieuResti = $_POST['LieuResti'];
//         header("location:../ListeVehicle/listevehicules.php?LD=$LieuDepart&DD=$DateDepart&HD=$HeureDepart&DR=$DateResti&LR=$LieuResti&Search=$Search");
//     }
// }
if(isset($_POST['ChercherVeh'])){
    if(empty($_POST['LieuDepart']) ){
        $error =   "Veuillez remplir tous les champs";
        // header("location:../ListeVehicle/listevehicules.php");
    }else{
        // $Search = true;
        $LieuDepart = $_POST['LieuDepart'];
        $DateDepart = $_POST['DateDepart'];
        // $HeureDepart = $_POST['HeureDepart'];
        $DateResti = $_POST['DateResti'];
        // $LieuResti = $_POST['LieuResti'];
        header("location:../ListeVehicle/listevehicules.php?LD=$LieuDepart");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perla Playa | Location de Voiture</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0.3s">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <link rel="apple-touch-icon" sizes="120x120" href="img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/lgBlanc.png">
</head>
<body>
<!-- <div id="loader">
    <div class="spinner"></div>
</div> -->
    <!-- First 100vh -->
    <header>
        <div class="container firstIn">
            <div class="logo d-inline">
                <h1></h1>
            </div>

        </div>
        <div class="container container2">
            <nav class="navHeader">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="../ListeVehicle/listevehicules.php" blank>Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="lastcontHeader p-2">
                <i class="sss fa-solid fa-bars"  onclick="afficheMenuPhone()"></i>
                <a href="../ListeVehicle/listevehicules.php" class="callToActionHeader bg-success px-3 py-2">Reserver Maintenant</a>
            </div>
            <!-- menu phone -->
            <div class="menuphone position-absolute" id="menPhone" style="z-index: 999 !important;">
                <!-- <div class="menu1">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="../ListeVehicle/listevehicules.php" blank>Services</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="/Admin/index.php">Admin Panel (demo)</a></li>
                    </ul>
                </div> -->
                <div class="MenuDiv ">
                    <div class="menu1">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="../ListeVehicle/listevehicules.php" blank>Nos  Voitures</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="closeMenu px-3">
                        <ul>
                            <li><i class="fa-solid fa-x" onclick="closemenu()"></i></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- sec inputs -->
        <div class="container argumentHeader">
            <h1 >Location de voitures pour tous les types de voyages</h1>
            <p>De super voitures à des tarifs avantageux, proposées par les plus grandes sociétés de location de voitures.</p>
        </div>
            
    </header>
  
    <section class="sec2">
        <div class="Homeinputs py-2  bg-info" >
            <form class="Filter2" method="post" novalidate>
                    <div class="LieuPrisenEnCharge  rounded-0">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div>
                            <p>Lieu de prise en charge</p>
                            <input type="text" name="LieuDepart" placeholder="Lieu de prise en charge">
                        </div>
                    </div>
                    
                    <div class="DatePrisencharge rounded-0">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de prise en charge</p>
                            <input type="date" id="DateDepart" name="DateDepart" onchange="setMinEndDate()" placeholder="Date Depart">
                        </div>
                    </div>
                    <!-- <div class="HeurePriseencharge rounded-0">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <p>Heure</p>
                            <input type="time" name="HeureDepart" placeholder="Heure Depart">
                        </div>
                    </div> -->
                    <div class="DateRestitution rounded-0">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de restitution</p>
                            <input type="date" name="DateResti" placeholder="Date restitution">
                        </div>
                    </div>
                    <!-- <div class="LieuRestitution rounded-0">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div>
                            <p>Lieu de prise restitution</p>
                            <input type="text" name="LieuResti" placeholder="Lieu de restitution">
                        </div>
                    </div> -->
                    <button class="BtnModifier rounded-0" type="submit" name="ChercherVeh">Chercher</button>
            </form>
            <?PHP
                IF(isset($error)){
            ?>
                <div class="ErrorDiv">
                    <p class="errortext"><?php echo "$error"?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="argumentDiv py-4">
            <label for="">
                <h2>Pourquoi PERLA PLAYA ?</h2>
                <p><i class="fa-solid fa-circle-check px-3" style="color: #3ca305;"></i>Assistance routière 24/7</p>
                <p><i class="fa-solid fa-circle-check px-3" style="color: #3ca305;"></i>Service client personnalisé</p>
                <p><i class="fa-solid fa-circle-check px-3" style="color: #3ca305;"></i>Votre confort à 100%</p>
                <p><i class="fa-solid fa-circle-check px-3" style="color: #3ca305;"></i>Large choix de véhicules</p>
            </label>
        </div>
        <div class="daciaTransSec2  d-flex py-3">
            <div class="imgContentFlyer golfFlyer d-flex align-items-center justify-content-between" id="imgContentFlyers" alt="Dacia Car"> 
               <i class="fa-solid fa-chevron-left px-4" id="previousFlyerVeh"></i>
               <i class="fa-solid fa-chevron-right px-4" id="nextFlyerVeh"></i>
            </div>
        </div>
    </section>
    
    <!-- sticky button of whatsapp contact -->
    <div class="buttonFixedWhatsapp d-flex  p-1">
        <div class="d-flex wstpContainer align-items-end justify-content-start  ">
            <div class="border rounded-circle  onlinewtsp"></div>
            <div  class="p-0 m-0 IconWtspShow" target="_blank">
                <i class="fa-brands fa-square-whatsapp m-0 p-0" style="color: #4fee51;"></i>
            </div>
        </div> 
        <div class="contentMessagerie">
            <div class="d-flex headset align-items-center justify-content-start py-2">
                <i class="fa-solid fa-headset m-0  px-1 d-inline"></i>
                <p class="p-0 m-0 text-secondary">perla playa service client<div class="border rounded-circle  onlinewtsp onlinewtsp2 p-0"></div></p>
            </div>
            <!-- <div class="messagesHis  d-flex bg-danger justify-content-end align-items-end">
                 i need scrool bar in this div
            </div> -->
            <div  class="containerStikcyWhtsp d-flex bg-white p-1 m-0 d-flex align-items-center">
                <input type="text" name="" id="contentMsg" class="m-0 p-1 py-2 bg-transparent" placeholder="contacter perlaplaya...">
                <i class="fa-solid fa-paper-plane" id="sendFun"></i>
            </div>   
        </div>   
        <p class=" text-center cl24Sur7 m-0 p-0 fw-bold">24/7</p>
    </div>

 <!-- section dirent -->
 <section class="sectionDirent">
    <div class="sectionDirent2">
    <div>
        <img src="img/ico-time.png" alt="">
        <h4>Disponible</h4>
        <p>Réservation et assistance 24h/7j</p>
    </div>
    <div>
        <img src="img/ico-driver.png" alt="">
        <h4>Professionel</h4>
        <p>Personnel qualifié</p>
    </div>
    <div>
        <img src="img/ico-implementation.png" alt="">
        <h4>Excellent service</h4>
        <p>Qualité irréprochable</p>
    </div>
    <div>
        <img src="img/ico-precision.png" alt="">
        <h4>Flotte neuve</h4>
        <p>véhicules récent et bien entretenus</p>
    </div>
    <div>
        <img src="img/ico-reactivite.png" alt="">
        <h4>Tarifs attractifs</h4>
        <p>Tarifs très compétitifs</p>
    </div>
    </div>
</section>

    <section class="servicesOrng ">
        <div class="servicesOrngH2Div1">
            <h2>Nos Services De Location De véhicules</h2>
        </div>
        <p>Nous mettons à votre disposition un large choix de services additionnels, afin de vous garantir confort et satisfaction.        </p>
    </section>

    <!-- faQ section -->
     <section>
        <div class="faq-section">
            <h2 class="faq-title">QUESTIONS FRÉQUENTES</h2>
            <div class="faq-item">
                <div class="faq-question">
                    <p>Pourquoi choisir notre agence de location de voiture ?</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Nous offrons des tarifs compétitifs, une flotte variée et un service client exceptionnel.
                </div>
                <div class="faq-question">
                    <p>Offrez-vous des services de livraison ou de retour ?</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Oui, nous pouvons livrer et récupérer le véhicule à votre emplacement, selon disponibilité.
                </div>
                <div class="faq-question">
                    <p>Quels documents dois-je fournir pour louer une voiture ?</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Pour louer une voiture, vous devez présenter un permis de conduire valide au moins deux ans d'ancienneté (+2ans )
                </div>
                <div class="faq-question">
                    <p>Y a-t-il un âge minimum pour louer une voiture ?</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Oui, l'âge minimum pour louer une voiture est généralement de 24 ans. </div>
                </div>
     </section>
   
    </div>








<!-- footer -->
<footer>
    <div class="Contentfooter hidden">
        <div class="smallContent">
            <img src="img/lgBlanc.png" alt="Logo">
            <p>"Roulez vers l'aventure : des prix imbattables et des véhicules prêts à vous emmener partout! "</p>
            <p id="yearFoot"></p>
        </div>

        <div class="smallContent">
            <h1>Heures de travail</h1>
            <p style="font-weight: bold;">lundi - Dimanche</p>
            <p>24h/7j</p>
        </div>
    

        <div class="smallContent Reseau">
            <h1>Notre réseaux sociaux</h1>
            <ul>
                <li><i class="fa-brands fa-instagram"></i></li>
                <li><i class="fa-brands fa-facebook"></i></li>
                <li>
                <a href="https://api.whatsapp.com/send/?phone=212668455918&text&type=phone_number&app_absent=0"><i class="fa-brands fa-whatsapp"></i></a>
                </li>
                
            </ul>
        </div>

    </div>
</footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/examples/js/controls/OrbitControls.js"></script>
      

    <script src="jsFile.js?v=1.0.3" defer></script>
    <script src="flyerhome.js" defer></script>


</body>
</html>