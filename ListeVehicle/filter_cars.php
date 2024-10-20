<?php

include_once "../Admin/includes/database.php";
$query = "SELECT * FROM cars WHERE 1=1";
$params = [];

if (!empty($_POST['brand'])) {
    $query .= " AND BrandId = ?";
    $params[] = $_POST['brand']; 
}


if (!empty($_POST['trans'])) {
    if (is_array($_POST['trans'])) {
        $query .= " AND CarTransmission IN (" . implode(',', array_fill(0, count($_POST['trans']), '?')) . ")";
        $params = array_merge($params, $_POST['trans']);
    }
}


if (!empty($_POST['fuel'])) {
    if (is_array($_POST['fuel'])) {
        $query .= " AND CarFuelType IN (" . implode(',', array_fill(0, count($_POST['fuel']), '?')) . ")";
        $params = array_merge($params, $_POST['fuel']);
    }
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$cars = $stmt->fetchAll(PDO::FETCH_OBJ);
if ($cars) {
    foreach ($cars as $car) { ?>


                    <div class="voiroffre">

                        
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
    <?php }
} else {
    echo "<p>No cars found.</p>";
}

?>
