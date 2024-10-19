<?php
    include_once "../Admin/includes/database.php";
    if(isset($_GET['LD']) || isset($_GET['DD']) || isset($_GET['HD']) || isset($_GET['DR']) || isset($_GET['LR']) || isset($_GET['Search'])){
        $LD = $_GET['LD'];
        $DD = $_GET['DD'];
        $HD = $_GET['HD'];
        $DR = $_GET['DR'];
        $LR = $_GET['LR'];
        $sr = $_GET['Search'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perla Playa | Liste de Voiture</title>
    <link rel="apple-touch-icon" sizes="120x120" href="img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/lgBlanc.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/lgBlanc.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     
    <link rel="stylesheet" href="listevehicules.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
    <header class="">
        <div class="header d-flex justify-content-between">
            <a href="../index.php"><img src="../img/lgBlanc.png" width="150px" alt=""></a>
            <ul class="d-flex align-items-center justify-content-center m-0 ull">
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
                    <h5 class="bold"><?php ECHO $_GET['LD']?></h5>
                    <p><?php echo "Le : ".$_GET['DD']?> A : <?php echo $_GET['HD']?></p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
                <div>
                    <h5 class="bold"><?php ECHO $_GET['LR']?></h5>
                    <p><?php echo $_GET['DR']?></p>
                </div>
            </div>
            <button class="BtnModifier">Modifier</button>
        </div>
            <div  class="divCordoneLV2">
                <div class="ContainerTtle">
                    <h6>Modifier la recherche :</h6>
                    <i class="fa-solid fa-xmark rmvModifierFilt"></i>
                </div>
                <form class="Filter2" method="post">
                    <div class="LieuPrisenEnCharge">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div>
                            <p>Lieu de prise en charge</p>
                            <input type="text" placeholder="Lieu de prise en charge" name="LP">
                        </div>
                    </div>
                    <div class="DatePrisencharge">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de prise en charge</p>
                            <input type="date" name="DP">
                        </div>
                    </div>
                    <div class="HeurePriseencharge">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <p>Heure</p>
                            <input type="time" name="HP">
                        </div>
                    </div>
                    <div class="DateRestitution">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <p>Date de restitution</p>
                            <input type="date" name="DR">
                        </div>
                    </div>
                    <div class="HeureRestitution">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <p>Heure</p>
                            <input type="time" name="HR">
                        </div>
                    </div>
                    <button class="BtnModifier">Chercher</button>
                </form>
            </div>
    </section>
    <?php
        }
    ?>
    <div class="Cariste">
        <div class="CarFilter">
            <form class="FilterConatiner" id="filterForm">
                <div class="FilterTitle">
                    <h6><i class="fa-solid fa-filter"></i> Filter</h6>
                    <!-- <a href="">Supprimer tous les filtres</a> -->
                </div>
                <div class="FilterOptions">
                <hr>
                <div class="Marque">
                    <h6>Marque :</h6>
                    <select class="form-control" name="brand" onchange="filterCars()">
                        <option value="" selected disabled>Filter par marque</option>
                        <?php 
                        $sqlstate = $pdo->prepare('SELECT * FROM brands');
                        $sqlstate->execute();
                        $result = $sqlstate->fetchAll();
                        foreach ($result as $row) {
                            echo '<option value="' . $row['BrandId'] . '">' . $row['Brand'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>
                <div class="Transmission">
                    <h6 for="price">Transmission :</h6>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="checkbox" name="trans[]" id="" value="manuel" onchange="filterCars()">
                            <label for="">Manuel</label>
                        </div>
                        <?php
                            $sqlstate = $pdo->prepare('SELECT COUNT(*) AS mn FROM cars WHERE CarTransmission = ?');
                            $sqlstate->execute(['manuel']);
                            $mn = $sqlstate->fetchColumn();
                        ?>
                        <p class="m-0"><?php echo $mn?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="checkbox" name="trans[]" value="Automatic" onchange="filterCars()">
                            <label for="">Automatique</label>
                        </div>
                        <?php
                            $sqlstate = $pdo->prepare('SELECT COUNT(*) AS au FROM cars WHERE CarTransmission = ?');
                            $sqlstate->execute(['Automatic']);
                            $au = $sqlstate->fetchColumn();
                        ?>
                        <p class="m-0"><?php echo $au?></p>
                    </div>
                </div>
                <hr>
                <div>
                    <h6>Fuel :</h6>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="checkbox" name="fuel[]" value="diesel" onchange="filterCars()">
                            <label for="">Diesel</label>
                        </div>
                        <?php
                            $sqlstate = $pdo->prepare('SELECT COUNT(*) AS ds FROM cars WHERE CarFuelType = ?');
                            $sqlstate->execute(['Diesel']);
                            $ds = $sqlstate->fetchColumn();
                        ?>
                        <p class="m-0"><?php echo $ds?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="checkbox" name="fuel[]" value="essence" onchange="filterCars()">
                            <label for="">Essence</label>
                        </div>
                        <?php
                            $sqlstate = $pdo->prepare('SELECT COUNT(*) AS es FROM cars WHERE CarFuelType = ?');
                            $sqlstate->execute(['Essence']);
                            $es = $sqlstate->fetchColumn();
                        ?>
                        <p class="m-0"><?php echo $es?></p>
                    </div>
                </div>
                </div>
            </form>
        </div>
        <div class="Cars" id="car">
            <?php
                $cars = $pdo->query('SELECT * FROM cars')->fetchAll(PDO::FETCH_OBJ);
                foreach($cars as $car){
            ?>
            <div class="caritem">
                <div class="ImageContainer">
                    <div class="carimg" style="background-image: url('../Admin/<?php echo $car->CarImage?>')"></div>
                </div>
                <div class="carDts">
                    <div class="CarClasses">
                        <p class="CarClass">Idéal pour les familles</p>
                        <?php if(!$car->CarReduction == 0 ){?>
                        <p class="CarClass red">Reduction de  : <?php echo  $car->CarReduction; ?> %</p>
                        <?php } ?>
                    </div>
                    <h6 class="CarName"><?php echo  $car->CarName; ?></h6>
                    <div class="OptionAndPrice">
                        <div class="caroptions">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24">
                                    <path d="M16.5 6a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0zM18 6A6 6 0 1 0 6 6a6 6 0 0 0 12 0zM3 23.25a9 9 0 1 1 18 0 .75.75 0 0 0 1.5 0c0-5.799-4.701-10.5-10.5-10.5S1.5 17.451 1.5 23.25a.75.75 0 0 0 1.5 0z">
                                    </path>
                                </svg>
                                <?php echo  $car->CarSeats?> Siege

                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0zM13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474zM6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zm12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zm-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5zm-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5zM21.88 17.541a16.503 16.503 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15.003 15.003 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202zm.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5zm1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5z"></path></svg>
                                Kilométrage illimité
                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M1.5 6.75v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m2.85-.45-2.25-3a.75.75 0 1 0-1.2.9l2.25 3a.75.75 0 1 0 1.2-.9m18.9 13.95h-3L21 21v-.75A2.25 2.25 0 0 1 23.25 18l-.75-.75v6a.75.75 0 0 0 1.5 0v-6a.75.75 0 0 0-.75-.75 3.75 3.75 0 0 0-3.75 3.75V21c0 .414.336.75.75.75h3a.75.75 0 0 0 0-1.5M18.024 2.056A.75.75 0 1 1 18.75 3v1.5a.75.75 0 1 1-.722.95.75.75 0 1 0-1.446.4A2.25 2.25 0 1 0 18.75 3c-1 0-1 1.5 0 1.5a2.25 2.25 0 1 0-2.174-2.832.75.75 0 0 0 1.448.388M12 18.75a.75.75 0 0 1 1.5 0c0 .315-.107.622-.304.868l-2.532 3.163A.75.75 0 0 0 11.25 24h3a.75.75 0 0 0 0-1.5h-3l.586 1.219 2.532-3.164c.41-.513.632-1.15.632-1.805a2.25 2.25 0 0 0-4.5 0 .75.75 0 0 0 1.5 0M8.25 1.5H9v5.25a.75.75 0 0 0 1.5 0V1.5A1.5 1.5 0 0 0 9 0h-.75a.75.75 0 0 0 0 1.5m0 6h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5m-6-7.5H.75A.75.75 0 0 0 0 .75v3c0 .414.336.75.75.75h1.5a2.25 2.25 0 0 0 0-4.5m0 1.5a.75.75 0 0 1 0 1.5H.75l.75.75v-3l-.75.75zm8.25 11.25v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m1.5 0v1.5a.75.75 0 0 0 1.5 0v-1.5a.75.75 0 0 0-1.5 0m7.5 0v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0m3 1.5A2.25 2.25 0 0 0 20.25 12h-15A2.25 2.25 0 0 1 3 9.75a.75.75 0 0 0-1.5 0 3.75 3.75 0 0 0 3.75 3.75h15a.75.75 0 0 1 .75.75.75.75 0 0 0 1.5 0"></path></svg>
                                <?php echo  $car->CarTransmission; ?>

                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M32 64C32 28.7 60.7 0 96 0L256 0c35.3 0 64 28.7 64 64l0 192 8 0c48.6 0 88 39.4 88 88l0 32c0 13.3 10.7 24 24 24s24-10.7 24-24l0-154c-27.6-7.1-48-32.2-48-62l0-64L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3l0 13.5 0 24 0 32 0 152c0 39.8-32.2 72-72 72s-72-32.2-72-72l0-32c0-22.1-17.9-40-40-40l-8 0 0 144c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32s14.3-32 32-32L32 64zM96 80l0 96c0 8.8 7.2 16 16 16l128 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16L112 64c-8.8 0-16 7.2-16 16z"/></svg>
                                <?php echo  $car->CarFuelType; ?>

                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                <?php echo  $car->CarModel; ?>

                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="voiroffre">
                        <div class="carprice">
                            <p>Prix par <b>4</b> jour :</p>
                            <?php  if(!$car->CarReduction == 0){?>
                            <s><?php echo  $car->CarOriginalPrice;?> DH</s>
                            <?php } ?>
                            <h4><?php echo  $car->CarPricewithReduction;?> DH</h4>
                        </div>
                        
                        <?php
                            if(isset($_GET['Search'])){
                        ?>
                            <a href="../SingleVehiclePgae/SingleVehicle.php?id=<?php echo $car->CarId ?>&LD=<?php echo $LD ?>&DD=<?php echo $DD ?>&HD=<?php echo $HD ?>&DR=<?php echo $DR ?>&LR=<?php echo $LR ?>&Search=<?php echo $sr ?>">Voir L'offre</a>
                        <?php
                            }else{
                        ?>
                        <a href="../SingleVehiclePgae/SingleVehicle.php?id=<?php echo $car->CarId ?>">Voir L'offre</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <script src="Listeveh.js"></script>
    <script>
function filterCars() {
    var formData = new FormData(document.getElementById('filterForm'));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'filter_cars.php', true); 
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("filtred");
            document.getElementById('car').innerHTML = xhr.responseText;
        }else{
            console.log("error");
        }
    };
    xhr.send(formData);
}
</script>
</body>
</html>