<?php
    // Include database connection
    include_once "../Admin/includes/database.php";

    // Fetch the car ID from GET request
    $id = $_GET['id'];

    // Fetch car details from database based on Car ID
    $Cars = $pdo->prepare('SELECT * FROM cars WHERE CarId = ?');
    $Cars->execute(array($id));
    $cr = $Cars->fetch(PDO::FETCH_OBJ);

    // Initialize GET variables if set
    $LD = isset($_GET['LD']) ? $_GET['LD'] : '';
    $DD = isset($_GET['DD']) ? $_GET['DD'] : '';
    $HD = isset($_GET['HD']) ? $_GET['HD'] : '';
    $DR = isset($_GET['DR']) ? $_GET['DR'] : '';
    $LR = isset($_GET['LR']) ? $_GET['LR'] : '';
    $sr = isset($_GET['Search']) ? $_GET['Search'] : '';

    // Handle form submission for reservation
    if (isset($_POST['Reserver'])) {
        // Collect POST variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status = 0; // Default status, can be updated later
        $currentDateTime = date("Y-m-d H:i:s");

        // Echo input values for debugging (optional)
        echo $name;
        echo $email;
        echo $phone;

        // If 'Search' is not set, retrieve values from POST
        if (!isset($_GET['Search'])) {
            $LD = $_POST['LD'];
            $LR = $_POST['LR'];
            $DD = $_POST['DD'];
            $DR = $_POST['DR'];
            $HD = $_POST['HD'];

            // Echo variables for debugging (optional)
            echo $LD;
            echo $LR;
            echo $DD;
            echo $DR;
            echo $HD;
        }

        // Function to check if reservation code is unique in the database
        function checkDatabaseForCode($code, $pdo) {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM reservations WHERE ReservationNum = :code');
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        }

        // Function to generate unique reservation code
        function generateReservationCode($pdo, $length = 10) {
            do {
                $randomBytes = bin2hex(random_bytes($length / 2));
                $reservationCode = strtoupper($randomBytes);
                $isUnique = !checkDatabaseForCode($reservationCode, $pdo);
            } while (!$isUnique);

            return $reservationCode;
        }

        // Generate a unique reservation code
        $reservationCode = generateReservationCode($pdo, 10);

        // Insert reservation into the database
        $sqlState = $pdo->prepare('INSERT INTO reservations VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $result = $sqlState->execute(array($reservationCode, $status, $currentDateTime, $id, $name, $email, $phone, $LD, $LR, $DD, $DR, $HD));

        // Redirect to Thank You page if successful, otherwise display error
        if ($result) {
            $successMessage = "Voiture Bien Ajouté";
            header("Location: ../ThankYouForBooking.php?ref=$reservationCode");
            exit(); // Ensure no further code execution after redirect
        } else {
            $error = "Erreur lors de l'ajout de la voiture";
            echo $error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perla Playa | Location de Voiture</title>
    <link rel="apple-touch-icon" sizes="120x120" href="img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/lgBlanc.png">
    <link rel="stylesheet" href="SingleVehicle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
    <script src="https://kit.fontawesome.com/cfd6df17a2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<header class="">
        <div class="header d-flex justify-content-between">
            <a href="../index.php"><img src="/img/lgBlanc.png" width="150px" alt=""></a>
            <ul class="d-flex align-items-center justify-content-center m-0">
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="">Nos Voitures</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
            </ul>
        </div>
    </header>
    <?php
        if(isset($_GET['Search'])){
    ?>
    <section class="sec1LV"> 
        <div  class="divCordoneLV">
            <div class="Filter">
                <div>
                    <h5 class="bold"><?php echo $_GET['LD']?></h5>
                    <p>mer. 2 oct. 2024, 10:00</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
                <div>
                    <h5 class="bold"><?php echo $_GET['LR']?></h5>
                    <p>mer. 2 oct. 2024, 10:00</p>
                </div>
            </div>
            <button class="BtnModifier">Modifier</button>
        </div>
            <div  class="divCordoneLV2">
                <div class="ContainerTtle">
                    <h6>Modifier la recherche :</h6>
                    <i class="fa-solid fa-xmark rmvModifierFilt"></i>
                </div>
                <div class="Filter2">
                    <div class="LieuPrisenEnCharge">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div>
                            <p>Lieu de prise en charge</p>
                            <input type="text" placeholder="Lieu de prise en charge">
                        </div>
                    </div>
                    <div class="DatePrisencharge">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de prise en charge</p>
                            <input type="date">
                        </div>
                    </div>
                    <div class="HeurePriseencharge">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <p>Heure</p>
                            <input type="time">
                        </div>
                    </div>
                    <div class="DateRestitution">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de restitution</p>
                            <input type="date">
                        </div>
                    </div>
                    <div class="HeureRestitution">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <p>Heure</p>
                            <input type="time">
                        </div>
                    </div>
                    <button class="BtnModifier">Chercher</button>
                </div>
            </div>
    </section>
    <?php
        }
    ?>
    <section class="Offer">
        <div class="CarDetails">
            <div class="OfferPrevNext">
                <a href="/ListeVehicle/listevehicules.php" class="text-primary">Revenir aux resultat de recheche</a>
                <h3>Votre Offre</h3>
            </div>
            <div class="Car">
                <div class="carimg" style="background-image: url('../Admin/<?php echo $cr->CarImage?>')">

                </div>
                <div class="carDts">
                    <div class="CarClasses">
                        <p class="CarClass">Idéal pour les familles</p>
                        <?php if(!$cr->CarReduction == 0 ){?>
                        <p class="CarClass red">Reduction de  : <?php echo  $cr->CarReduction; ?> %</p>
                        <?php } ?>
                    </div>
                    <h6 class="CarName"><?php echo $cr->CarName?></h6>
                    <div class="caroptions">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24">
                                <path d="M16.5 6a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0zM18 6A6 6 0 1 0 6 6a6 6 0 0 0 12 0zM3 23.25a9 9 0 1 1 18 0 .75.75 0 0 0 1.5 0c0-5.799-4.701-10.5-10.5-10.5S1.5 17.451 1.5 23.25a.75.75 0 0 0 1.5 0z">
                                </path>
                            </svg>
                            <?php echo $cr->CarSeats?> siege
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0zM13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474zM6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zm12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zm-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5zm-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zM21.88 17.541a16.503 16.503 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15.003 15.003 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202zm.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5zm1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5z"></path></svg>
                            Kilométrage illimité
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M1.5 6.75v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m2.85-.45-2.25-3a.75.75 0 1 0-1.2.9l2.25 3a.75.75 0 1 0 1.2-.9m18.9 13.95h-3L21 21v-.75A2.25 2.25 0 0 1 23.25 18l-.75-.75v6a.75.75 0 0 0 1.5 0v-6a.75.75 0 0 0-.75-.75 3.75 3.75 0 0 0-3.75 3.75V21c0 .414.336.75.75.75h3a.75.75 0 0 0 0-1.5M18.024 2.056A.75.75 0 1 1 18.75 3v1.5a.75.75 0 1 1-.722.95.75.75 0 1 0-1.446.4A2.25 2.25 0 1 0 18.75 3c-1 0-1 1.5 0 1.5a2.25 2.25 0 1 0-2.174-2.832.75.75 0 0 0 1.448.388M12 18.75a.75.75 0 0 1 1.5 0c0 .315-.107.622-.304.868l-2.532 3.163A.75.75 0 0 0 11.25 24h3a.75.75 0 0 0 0-1.5h-3l.586 1.219 2.532-3.164c.41-.513.632-1.15.632-1.805a2.25 2.25 0 0 0-4.5 0 .75.75 0 0 0 1.5 0M8.25 1.5H9v5.25a.75.75 0 0 0 1.5 0V1.5A1.5 1.5 0 0 0 9 0h-.75a.75.75 0 0 0 0 1.5m0 6h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5m-6-7.5H.75A.75.75 0 0 0 0 .75v3c0 .414.336.75.75.75h1.5a2.25 2.25 0 0 0 0-4.5m0 1.5a.75.75 0 0 1 0 1.5H.75l.75.75v-3l-.75.75zm8.25 11.25v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m1.5 0v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0m7.5 0v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m3 1.5A2.25 2.25 0 0 0 20.25 12h-15A2.25 2.25 0 0 1 3 9.75a.75.75 0 0 0-1.5 0 3.75 3.75 0 0 0 3.75 3.75h15a.75.75 0 0 1 .75.75.75.75 0 0 0 1.5 0"></path></svg>
                            <?php echo $cr->CarTransmission?>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M32 64C32 28.7 60.7 0 96 0L256 0c35.3 0 64 28.7 64 64l0 192 8 0c48.6 0 88 39.4 88 88l0 32c0 13.3 10.7 24 24 24s24-10.7 24-24l0-154c-27.6-7.1-48-32.2-48-62l0-64L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3l0 13.5 0 24 0 32 0 152c0 39.8-32.2 72-72 72s-72-32.2-72-72l0-32c0-22.1-17.9-40-40-40l-8 0 0 144c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32s14.3-32 32-32L32 64zM96 80l0 96c0 8.8 7.2 16 16 16l128 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16L112 64c-8.8 0-16 7.2-16 16z"/></svg>
                            <?php echo $cr->CarFuelType?>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                            <?php echo $cr->CarModel?>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="Advantages">
                <h5>Excellent choix !</h5>
                <div class="ADVS">
                <div class="Adv">
                    <i class="fa-solid fa-check"></i>
                    <p>Évaluation client : 7,5/10</p>
                </div>
                <div class="Adv">
                    <i class="fa-solid fa-check"></i>
                    <p>Comptoir facile à trouver</p>
                </div>
                <div class="Adv">
                    <i class="fa-solid fa-check"></i>
                    <p>Voitures en bon état</p>
                </div>
                <div class="Adv">
                    <i class="fa-solid fa-check"></i>
                    <p>Politique de carburant avantageuse</p>
                </div>
                </div>
            </div>
            
            <div class="Conditions">
                <div>
                    <h5>Conditions :</h5>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>Caution (10% valeur de voiture )</li>
                        <li><i class="fa-solid fa-check"></i>Permis de conduire 2 ans </li>
                        <li><i class="fa-solid fa-check"></i>Age : plus de 24 ans</li>
                        <li><i class="fa-solid fa-check"></i>Durée minimale : 4 jrs</li>
                    </ul>
                </div>
                <div>
                    <h5>Ville Livraison :</h5>
                    <p>Pour 4 jours minimum :</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>Casablanca - Berchid - Safi - Laayoune</li>
                    </ul>
                    <p>Plus de 15 jours :</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>Partout au maroc</li>
                    </ul>
                </div>
                <div>
                    <h5>Documents requis :</h5>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>Permis de conduire Plus de 2 ans</li>
                        <li><i class="fa-solid fa-check"></i>Carte nationale</li>
                    </ul>
                    <p>Pour les étrangers :</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i>Permis de conduire Plus de 2 ans</li>
                        <li><i class="fa-solid fa-check"></i>Passport</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="OfferDetails">
            <div class="sticky-top"> <!--Position Sticky using bootstrap -->
                <?php
                    if(isset($_GET['Search'])){
                ?>
                    <div class="schedule">
                        <div class="event">
                            <div class="circle-container">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
        
                            <div class="details">
                                <div class="date-time">
                                    <p>mer. 2 oct. - 10:00</p>
                                </div>
                                <div class="location">
                                    <p class="bold">Casablanca Aéroport</p>
                                    <a href="#">Voir les instructions relatives à la prise en charge</a>
                                </div>
                            </div>
                        </div>
                        <div class="event">
                            <div class="circle-container">
                                <div class="circle"></div>
                            </div>
                            <div class="details">
                                <div class="date-time">
                                    <p>sam. 5 oct. - 10:00</p>
                                </div>
                                <div class="location">
                                    <p class="bold">Casablanca Aéroport</p>
                                    <a href="#">Voir les instructions relatives à la restitution</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <div class="Tarif">
                    <h5>Détail du tarif de la location :</h5>
                    <div class="Price">
                        <div class="OrgPrice">
                            <p>Montant de la location par <b>4</b> jour :</p>
                            <p><?php echo $cr->CarOriginalPrice?> MAD</p>
                        </div>
                        <div class="Reduction">
                            <?php if(!$cr->CarReduction == 0){?>
                                <p>réduction :</p>
                                <p><?php echo $cr->CarReduction?> %</p>
                            <?php }?>
                        </div>
                    </div>
                    <hr>
                    <div class="FinalPrice">
                        <p class="bold">Prix total par <b>4</b> jours :</p>
                        <?php if(!$cr->CarReduction == 0){?>
                            <p class="bold"><?PHP echo $cr->CarPricewithReduction?> MAD</p>
                        <?php }else{?>
                            <p class="bold"><?PHP echo $cr->CarOriginalPrice?> MAD</p>
                            <?php }?>
                    </div>
                </div>
                <div class="alert alert-success mt-3" role="alert">
                    <h6 class="alert-heading">PAIEMENT A LA LIVRAISON</h6>
                    <p>Paiement Cash ou par carte Visa ou Mastercard.</p>
                </div>
                <div class="RSVBTN">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-default">Reserver Maintenant</button>  
                </div>
            </div>
        </div>
    </section>
        <!-- Modal Reservation -->
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Informations sur le conducteur principal</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" cl  ass="form-label">Nom et Prenom</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Mark" required>
                        <div class="invalid-feedback">
                                Entrer un nom et prenom valide.
                            </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="validationCustom02" placeholder="email@gmail.com" required>
                        <div class="invalid-feedback">
                                Entrer un email valide.
                            </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label">Numero Telephone</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="phone"  id="validationCustomUsername" placeholder="06 53 73 46 73" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer un numero de telephone valide.
                            </div>
                        </div>
                    </div>
                    <?php
                        if(!isset($_GET['Search'])){
                    ?>
                    <div class="col-md-12">
                            <label for="validationCustomUsername" class="form-label">Lieu Depart</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="LD"  id="validationCustomUsername" placeholder="Casablanca" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer un lieu valid
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <label for="validationCustomUsername" class="form-label">Lieu restitution</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="LR"  id="validationCustomUsername" placeholder="Tanger" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer un lieu valid
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Date depart</label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" name="DD"  id="validationCustomUsername" placeholder="Tanger" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer un date valid
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Date restitution</label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" name="DR"  id="validationCustomUsername" placeholder="Tanger" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer une date valid
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <label for="validationCustomUsername" class="form-label">Heure Depart</label>
                        <div class="input-group has-validation">
                            <input type="time" class="form-control" name="HD"  id="validationCustomUsername" placeholder="Time" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Entrer une heure valid
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <button type="submit" name="Reserver" class="confirmer">Confirmer</button>
                        <button type="button" class="btn btn-link text-gray ms-auto fermer" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>

            </div>
            </form>
        </div>
    </div>
</body>
<script>

    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call( forms ).forEach( function ( form ){
        form.addEventListener("submit",function(event){
            if(!form.checkValidity()){
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        },false)
    })
    </script>
<script src="SingleVeh.js" defer></script>
</html>