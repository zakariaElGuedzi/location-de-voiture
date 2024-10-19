<?php
include "includes/navbar.php";

if(isset($_POST['AjouterMarque'])){
  $marque = $_POST['marque'];
  $sqlState = $pdo->prepare('INSERT INTO brands VALUES(NULL,?)');
  $rsult = $sqlState->execute(array($marque));
  if($rsult){
    $SuccesMessage = "Voiture Bien Ajouté";
    // header("refresh:1;Marque.php");
  }else{
    $Error = "Erreur lors de l'ajout de la voiture";
  }
}
?>
<main class="content">
            <?php
                if(isset($Error)){
                    echo "
                    <div class='alert alert-danger' role='alert'>
                        $Error
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
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">
					<h2 class="h4">Liste Marques</h2>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">
					<a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-default">
						<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
						</svg>
						Ajouter Marque
					</a>
				</div>
			</div>
			<div class="card card-body shadow border-0 table-wrapper table-responsive">
				<table class="table user-table table-hover align-items-center text-center" id="datatable">
					<thead>
						<tr>
							<th class="border-bottom">ID</th>
							<th class="border-bottom">Marque</th>
							<th class="border-bottom">Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
                  $Brands = $pdo->prepare('SELECT * FROM brands');
                  $Brands->execute();
                  while($row = $Brands->fetch()){
            ?>
            <tr>
                <td><?php echo  $row['BrandId']; ?></td>
                <td>
                <?php echo  $row['Brand'] ?>
                </td>
                <td class="">
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal3-default" data-marque-id="<?php echo $row['BrandId']; ?>"><i class="fa-solid fa-pen"></i></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal2-default" data-marque-id="<?php echo $row['BrandId']; ?>"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
      <!-- modal add brand -->
        <form class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Ajouter Des Marque des vehicles</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nom Marque</label>
                        <input type="text" class="form-control" name="marque" required placeholder="Exemple :  BMW">

                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary" type="submit" name="AjouterMarque">Ajouter</button>
                        <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- modal delete brand -->
        <form class="modal fade" id="modal2-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Supprimer la marque :</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Si vous supprimer  une marque, vous ne pourrez pas la récupérer</p>
                        <p class="text-danger">Tous les voitures de cette marque seront supprimé</p>
                    </div>
                    <div class="modal-footer">
                        <a href=""  class="btn btn-danger" type="submit" id="supprimer-marque">Supprimer</a>
                        <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- modifier!-->
        <form class="modal fade" id="modal3-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Modifier la marque</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nom Marque</label>
                        <input type="text" class="form-control" id="Newmarque" placeholder="Exemple :  BMW" required>

                    </div>
                    <div class="modal-footer">
                        <a id="modifier-marque" href="#"  class="btn btn-success">Modifier</a>
                        <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
		</main>
    <script>
    var modal = document.getElementById('modal2-default');
    modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var opId = button.getAttribute('data-marque-id');
    var supprimeropButton = modal.querySelector('#supprimer-marque');
    supprimeropButton.href = 'supprimermarque.php?id=' + opId;
  });



  var modal3 = document.getElementById('modal3-default');
    modal3.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var opId = button.getAttribute('data-marque-id');
    var modifier = modal3.querySelector('#modifier-marque');
    var marque = document.getElementById("Newmarque")
    marque.addEventListener('input', function(event) {
        console.log(event.target.value);  
        var NewMarquevalue = event.target.value
        modifier.href =`modifiermarque.php?id=${opId}&newmarque=${NewMarquevalue}`

    });
  });
</script>