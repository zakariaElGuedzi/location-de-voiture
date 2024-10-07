<?php
include "includes/navbar.php";
if(isset($_POST['AjouterVoiture'])){
    $carname = $_POST['carname'];
    $carbrand = $_POST['carbrand'];
    $originalcarprice = $_POST['originalcarprice'];
    $reduction = $_POST['reduction'];
    $carpricewithreduction = $_POST['carpricewithreduction'];
    $carmodel = $_POST['carmodel'];
    $carsteats = $_POST['carsteats'];
    $carfuel = $_POST['carfuel'];
    $cartransmission = $_POST['cartransmission'];
    // $carimg = $_POST['carimg'];

    // $sqlState = $pdo->prepare('INSERT INTO cars VALUES(NULL,?,?,?,?,?,?,?,?,?,?)');
    // $sqlState->execute(array($carname, $carbrand, $originalcarprice,
    // $reduction, $carpricewithreduction, $carmodel, $carsteats,$carfuel,$cartransmission,$carimg
    // ));

    $targetDir = "uploads/";  // Folder to store the uploaded images
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowedTypes = array("jpg", "jpeg", "png","avif","webp");
    if (in_array($imageFileType, $allowedTypes)) {
        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert file path into the database
            // $insert = $conn->query("INSERT INTO images (image_path) VALUES ('$targetFilePath')");
            $sqlState = $pdo->prepare('INSERT INTO cars (CarName, BrandId, CarOriginalPrice, CarReduction, CarPricewithReduction, CarModel, CarSeats, CarFuelType, CarTransmission, CarImage,active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,1)');
            $result = $sqlState->execute(array($carname, $carbrand, $originalcarprice, $reduction, $carpricewithreduction, $carmodel, $carsteats, $carfuel, $cartransmission, $targetFilePath));            
            // if($result){
            //     echo "voiture ajouté avec succés";
            // }else{
            //     echo " echec";
            // }
        } else {
            echo "File upload failed.";
        }
    } else {
        $TypeError = "Image extension Only JPG, JPEG, PNG autorisé";
    }
    $SuccesMessage = "Voiture Bien Ajouté";
    header("refresh:1;AjouterVoiture.php");
}
?>

<div id="loader">
    <div class="spinner"></div>
</div>

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
            <h2 class="h5 mb-4">Ajouter Voiture</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Nom Vehicle</label>
                            <input class="form-control" name="carname" type="text" placeholder="Exemple : AUDI RS4" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="my-1 me-2" for="country">Marque</label>
                        <select class="form-select" name="carbrand" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <?php
                                $Brands = $pdo->prepare('SELECT * FROM brands');
                                $Brands->execute();
                                while($row = $Brands->fetch()){
                            ?>
                            <option value="<?php echo $row['BrandId']?>"><?php echo $row['Brand']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Prix par jour:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" oninput="calculatePrice()" name="originalcarprice" id="orgprix" placeholder="Exemple : 1500" aria-label="Search" required>
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
                                <input type="text" class="form-control" oninput="calculatePrice()" name="reduction" id="reduction" placeholder="Exemple : 10" aria-label="Search" required>
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
                                <input type="text" class="form-control" name="carpricewithreduction" id="prixreduc" readonly placeholder="" aria-label="Search">
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
                            <input class="form-control" name="carmodel" type="text" placeholder="Exemple : 2020" required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Password">Nombre Siege :</label>
                        <input class="form-control" name="carsteats" type="text" placeholder="Exemple : 5 " required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Password">Type Fuel</label>
                        <select class="form-select" name="carfuel" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Essence">Essence</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="my-1 me-2" for="country">Vitesse</label>
                        <select class="form-select" name="cartransmission" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="Manuel">Manuel</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Voiture Image :</label>
                    <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
                </div>
                <div class="">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" name="AjouterVoiture" type="submit">Ajouter</button>
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