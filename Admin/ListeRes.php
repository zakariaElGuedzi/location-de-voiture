<?php
include "includes/navbar.php";
?>
<main class="content">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">
					<h2 class="h4">Liste Vendeure</h2>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">
					<a href="AjouterOperateur.php" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
						<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
						</svg>
						Ajouter Vendeure
					</a>
				</div>
			</div>
			<div class="card card-body shadow border-0 table-wrapper table-responsive">
				<table class="table user-table table-hover align-items-center text-center" id="datatable">
					<thead>
						<tr>
							<th class="border-bottom">ID</th>
							<th class="border-bottom">Nom</th>
							<th class="border-bottom">Numero Reservation</th>
                            <th class="border-bottom">Voiture</th>
                            <!-- <th class="border-bottom">De</th>
                            <th class="border-bottom">A</th> -->
                            <th class="border-bottom">Status</th>
                            <th class="border-bottom">Date Reservation</th>
                            <th class="border-bottom">Action</th>
						</tr>
					</thead>
					<tbody>
              <tr>
                  <td>1</td>
                  <td>Adnane</td>
                  <td>R123456789</td>
                  <td>BMW , BMW 5 Series</td>
                  <!-- <td>2024-09-12</td>
                  <td>2024-09-20</td> -->
                  <td><span class="badge bg-warning p-2 text-black">Non Confirmé</span></td>
                  <td>2024-09-29 17:04:05</td>
                  <td>
                      <a href=""><i class="fa-solid fa-eye"></i></a>
                  </td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>Adnane</td>
                  <td>R123456789</td>
                  <td>BMW , BMW 5 Series</td>
                  <!-- <td>2024-09-12</td>
                  <td>2024-09-20</td> -->
                  <td><span class="badge bg-success p-2 ">Confirmé</span></td>
                  <td>2024-09-29 17:04:05</td>
                  <td>
                      <a href=""><i class="fa-solid fa-eye"></i></a>
                  </td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>Adnane</td>
                  <td>R123456789</td>
                  <td>BMW , BMW 5 Series</td>
                  <!-- <td>2024-09-12</td>
                  <td>2024-09-20</td> -->
                  <td><span class="badge bg-danger p-2">Annulé</span></td>
                  <td>2024-09-29 17:04:05</td>
                  <td>
                      <a href=""><i class="fa-solid fa-eye"></i></a>
                  </td>
              </tr>
              

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