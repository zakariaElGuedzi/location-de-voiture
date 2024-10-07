<?php
include "includes/navbar.php";
$id = $_GET['id'];

if(isset($_POST['ModifierVoiture'])){
    $carname = $_POST['carname'];
    $carbrand = $_POST['carbrand'];
    $originalcarprice = $_POST['originalcarprice'];
    $reduction = $_POST['reduction'];
    $carpricewithreduction = $_POST['carpricewithreduction'];
    $carmodel = $_POST['carmodel'];
    $carsteats = $_POST['carsteats'];
    $carfuel = $_POST['carfuel'];
    $cartransmission = $_POST['cartransmission'];
    if (isset($_POST['current_image'])) {
        $currentImage = $_POST['current_image'];
    
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newImageUploaded = false;
    
        // Check if a new image was uploaded
        if (!empty($_FILES["image"]["name"])) {
            $targetFilePath = $targetDir . $fileName;
            // Allow certain file formats
            $allowedTypes = array("jpg", "jpeg", "png","avif");
            if (in_array($imageFileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    // If a new image was uploaded, delete the old one and update the path
                    if (file_exists($currentImage)) {
                        unlink($currentImage);
                    }
                    $currentImage = $targetFilePath;
                    $newImageUploaded = true;
                } else {
                    $TypeError = "Failed to upload the new image.";

                    exit;
                }
            } else {
                $TypeError = "Image extension Only JPG, JPEG, PNG autorisé";
                exit;
            }
        }
    }
        $sqlState = $pdo->prepare('UPDATE cars SET 
        carname = ?, 
        BrandId = ?, 
        CarOriginalPrice = ?, 
        CarReduction     = ?, 
        CarPricewithReduction = ?, 
        CarModel = ?, 
        CarSeats = ?, 
        CarFuelType = ?, 
        CarTransmission = ?, 
        CarImage = ? 
        WHERE CarId = ?'); // Assuming you're updating based on an 'id' field

    $update = $sqlState->execute(array(
        $carname, 
        $carbrand, 
        $originalcarprice, 
        $reduction, 
        $carpricewithreduction, 
        $carmodel, 
        $carsteats, 
        $carfuel, 
        $cartransmission, 
        $currentImage, 
        $id // Add the id of the car you're updating
    ));
    if($update){
        $SuccesMessage = "Car updated successfully";
        header("refresh:1;GererVoiture.php");
    }else{
        $TypeError = "Error updating car";
    }
}

?>

<div id="loader">
    <div class="spinner"></div>
</div>

<?php
    $Cars = $pdo->prepare('SELECT * FROM cars where CarId=?');
    $Cars->execute(array($id));
    $cr = $Cars->fetch(PDO::FETCH_OBJ);
?>

<main class="content">
  <div class="row">
    <div class="col-12 col-xl-12">
            <?php
                if(isset($TypeError)){
                    echo "
                    <div class='alert alert-danger' role='alert'>
                        $TypeError
                    </div>
                    ";
                }elseif(isset($SuccesMessage)){
                    echo "
                    <div class='alert alert-success' role='alert'>
                        $SuccesMessage
                    </div>
                    ";
                }
            ?>

        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Nom Vehicle</label>
                            <input class="form-control" name="carname" type="text" value="<?php echo $cr->CarName?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="my-1 me-2" for="country">Marque</label>
                        <select class="form-select" name="carbrand" aria-label="Default select example" required>
                            <?php
                                // Fetch the selected brand
                                $Brand = $pdo->prepare('SELECT Brand FROM brands WHERE BrandId = ?');
                                $Brand->execute(array($cr->BrandId));
                                $br = $Brand->fetch(PDO::FETCH_OBJ);
                            ?>
                            <!-- Selected brand displayed first -->
                            <option selected value="<?php echo $cr->BrandId ?>"><?php echo $br->Brand ?></option>
                            
                            <?php
                                // Fetch all brands
                                $Brands = $pdo->prepare('SELECT * FROM brands');
                                $Brands->execute();
                                while($row = $Brands->fetch()){
                                    // Skip the selected brand from the options list
                                    if ($row['BrandId'] != $cr->BrandId) {
                            ?>
                            <option value="<?php echo $row['BrandId'] ?>"><?php echo $row['Brand'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Prix par jour:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" oninput="calculatePrice()" name="originalcarprice" id="orgprix" value="<?php echo $cr->CarOriginalPrice?>" aria-label="Search" required>
                                <span class="input-group-text" id="basic-addon2">
                                    MAD
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Recution:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" oninput="calculatePrice()" name="reduction" id="reduction" value="<?php echo $cr->CarReduction?>" aria-label="Search" required>
                                <span class="input-group-text" id="basic-addon2">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Prix avec reduction:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="carpricewithreduction" id="prixreduc" readonly value="<?php echo $cr->CarPricewithReduction?>" aria-label="Search">
                                <span class="input-group-text" id="basic-addon2">
                                    MAD
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Annee Model:</label>
                            <input class="form-control" name="carmodel" type="text" value="<?php echo $cr->CarModel?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Password">Nombre Siege :</label>
                        <input class="form-control" name="carsteats" type="text" value="<?php echo $cr->CarSeats?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Password">Type Fuel</label>
                        <select class="form-select" name="carfuel" aria-label="Default select example" required>
                            <option selected value="<?PHP echo $cr->CarFuelType?>"><?PHP echo $cr->CarFuelType?></option>
                            <option value="Diesel">Diesel</option>
                            <option value="Essence">Essence</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="my-1 me-2" for="country">Vitesse</label>
                        <select class="form-select" name="cartransmission" aria-label="Default select example" required>
                            <option selected value="<?PHP echo $cr->CarTransmission?>"><?PHP echo $cr->CarTransmission?></option>
                            <option value="Manuel">Manuel</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Voiture Image :</label>
                    <input type="hidden" name="current_image" value="<?php echo $cr->CarImage; ?>">
                    <img src="<?php echo $cr->CarImage?>" alt="" width="200px"> <br>
                    <label for="image">Choisir Nouveau image (optionel):</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    
                </div>
                <!-- <h6>Accesories :</h6>
                <div class="d-flex flex-wrap align-content-center gap-3 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                        <label class="form-check-label" for="defaultCheck10">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck11">
                        <label class="form-check-label" for="defaultCheck11">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck12">
                        <label class="form-check-label" for="defaultCheck12">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck13">
                        <label class="form-check-label" for="defaultCheck13">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck14">
                        <label class="form-check-label" for="defaultCheck14">
                            Default checkbox
                        </label>
                    </div>                    
                </div> -->

                <div class="">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" name="ModifierVoiture" type="submit">Modifier</button>
                </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>
<script>
    function calculatePrice() {
        const prix = parseFloat(document.getElementById("orgprix").value);
        const reduction = parseFloat(document.getElementById("reduction").value);
        
        if (!isNaN(prix) && !isNaN(reduction)) {
            const discount = (reduction / 100) * prix;
            const finalPrice = prix - discount;
            document.getElementById("prixreduc").value = finalPrice.toFixed(2);
        } else {
            document.getElementById("prixreduc").value = '';
        }
    }
</script>