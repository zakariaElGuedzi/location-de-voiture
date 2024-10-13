<?php
include "includes/navbar.php";
?>
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
</script>