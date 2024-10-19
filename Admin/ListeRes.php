<?php
include "includes/navbar.php";
?>
<!-- Include jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<main class="content">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">
					<h2 class="h4">Liste Reservation</h2>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">

				</div>
			</div>
			<div class="card card-body shadow border-0 table-wrapper table-responsive">
				<table class="table user-table table-hover align-items-center text-center" id="datatable">
					<thead>
						<tr>
							<th class="border-bottom">ID</th>
              <th class="border-bottom">Numero Reservation</th>
							<th class="border-bottom">Nom</th>
              <th class="border-bottom">Voiture</th>
              <th class="border-bottom">Status</th>
              <th class="border-bottom">Date Reservation</th>
              <th class="border-bottom">Details</th>
              <th class="border-bottom">Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
            $reservations = $pdo->query('SELECT * FROM reservations')->fetchAll(PDO::FETCH_OBJ);
            foreach($reservations as $res){
            ?>
              <tr>
                  <td><?php echo  $res->ResID; ?></td>
                  <td><?php echo  $res->ReservationNum; ?></td>
                  <td><?php echo  $res->Name; ?></td>
                  <?php
                    $CarName = $pdo->prepare('SELECT CarName FROM cars where CarId=?');
                    $CarName->execute(array($res->CarId));
                    $CN = $CarName->fetch(PDO::FETCH_OBJ);
                ?>
                  <td><?php echo $CN->CarName; ?></td>

                  <?php
                    if($res->Status == 0){
                      $STATUS = "En Attente";
                      $bg = "warning";
                    }elseif($res->Status == 1){
                      $STATUS = "Accepté";
                      $bg = "success";
                    }else{
                      $STATUS = "Refusé";
                      $bg = "danger";
                    }
                  ?>
                  <td><span class="badge bg-<?php echo $bg?> p-2 text-black"><?php echo  $STATUS; ?></span></td>
                  <td><?php echo  $res->ReservationDate; ?></td>
                  <td>
                      <a href="showbooking.php?id=<?php echo $res->ResID?>"><i class="fa-solid fa-eye"></i></a>
                      <!-- <a href="deleetebooking.php?id=<?php echo $res->ResID?>"><i class="fa-solid fa-eye"></i></a> -->

                  </td>
                  <td>
                    <select class="form-control SelectStatus"  onchange="updateCarStatus(<?php echo $res->ResID; ?>, this.value)">                    >
                      <option value="" selected disabled>Status</option>
                      <option value="0">En Attente</option>
                      <option value="1">Accepté</option>
                      <option value="2">Refusé</option>
                    </select>
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
    var modal = document.getElementById('modal-default');
    modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var opId = button.getAttribute('data-op-id');
    var supprimeropButton = modal.querySelector('#supprimer-op');
    supprimeropButton.href = 'SupprimerOp.php?id=' + opId;
  });

  function updateCarStatus(ResId, StatusValue) {
    // Convert the boolean value to 1 or 0
    let status = StatusValue
    // Create an AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_res_status.php', true); // Assuming the script is update_car_status.php
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    // Send the request with the car ID and the new status
    xhr.send('resid=' + ResId + '&status=' + status);

    // Optional: Handle response (you could show a message or update the UI)
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('res status updated successfully');
            refreshTable()
        } else {
            console.log('Error updating res status');
        }
    };

    const refreshTable = () => {
    const $dataTable = $('#datatable');
    $dataTable.load(`${location.href} #datatable`);
};
    
}

</script>