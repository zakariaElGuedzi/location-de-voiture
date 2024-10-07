<?php
include "includes/navbar.php";
$cars = $pdo->query('SELECT * FROM cars')->fetchAll(PDO::FETCH_OBJ);

?>
<style>
  .smallspan{
    font-size: 9px;
  }
  td{
    padding: 0 !important;
  }
</style>

<div id="loader">
    <div class="spinner"></div>
</div>

<main class="content">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">
					<h2 class="h4">Liste Voitures</h2>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">
					<a href="AjouterOperateur.php" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
						<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
						</svg>
						Ajouter Voiture
					</a>
				</div>
			</div>
			<div class="card card-body shadow border-0 table-wrapper table-responsive">
				<table class="table user-table table-hover align-items-center text-center" id="datatable">
					<thead>
						<tr>
							<th class="border-bottom">ID</th>
              <th class="border-bottom">Image</th>
              <th class="border-bottom">Car Name</th>
							<th class="border-bottom">Brand</th>
              <th class="border-bottom">Price Per day <span class="smallspan">( avec reduction )</span></th>
              <th class="border-bottom">Fuel Type</th>
              <th class="border-bottom">Vitesse</th>
              <th class="border=bottom">Active</th>
							<th class="border-bottom">Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
                foreach($cars as $car){
            ?>
            <tr>  
                <td><?php echo $car->CarId?></td>
                <td><?php echo '<img src="' . $car->CarImage . '" alt="Image" width="80" style="margin:10px;">';?></td>
                <td><?php echo $car->CarName?></td>
                <?php
                    $Brand = $pdo->prepare('SELECT Brand FROM brands where BrandId=?');
                    $Brand->execute(array($car->BrandId));
                    $br = $Brand->fetch(PDO::FETCH_OBJ);
                ?>
                <td><?php echo $br->Brand?></td>
                <td><?php echo $car->CarPricewithReduction?> DH</td>
                <td><?php echo $car->CarFuelType?></td>
                <td><?php echo $car->CarTransmission?></td>
                <td>
                <div class="form-check form-switch d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheck" 
                    <?php echo ($car->active === 1) ? 'checked' : ''; ?> 
                    onchange="updateCarStatus(<?php echo $car->CarId; ?>, this.checked)">
                </div>
                </td>
                <td>
                    <!-- <a class="p-1" href="ShowCarDetails.php?id=<?php echo $car->CarId ?>"><i class="fa-solid fa-eye"></i></a> -->
                    <a class="p-1" href="EditCar.php?id=<?php echo $car->CarId ?>"><i class="fa-solid fa-pen"></i></a>
                    <a class="p-1" href="DeleteCar.php?id=<?php echo $car->CarId ?>"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php
                  }
            ?>
					</tbody>
				</table>
			</div>
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="h6 modal-title">Supprimer op</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Voulez-vous vraiment supprimer ce op ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <a href="#" class="btn btn-danger" id="supprimer-op">Supprimer</a>
                </div>
              </div>
            </div>
          </div>
		</main>
<script>
function updateCarStatus(carId, isChecked) {
    // Convert the boolean value to 1 or 0
    let status = isChecked ? 1 : 0;    
    // Create an AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_car_status.php', true); // Assuming the script is update_car_status.php
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    // Send the request with the car ID and the new status
    xhr.send('carId=' + carId + '&status=' + status);

    // Optional: Handle response (you could show a message or update the UI)
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Car status updated successfully');
        } else {
            console.log('Error updating car status');
        }
    };
}
</script>