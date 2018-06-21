
<!-- Modal pour Voir -->
    <div class="modal fade" id="voir<?php echo $roti['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Voir</h4></center>
                </div>
                <div class="modal-body">
				<?php
          include('../connection.php');
					$voir=mysqli_query($conn,"select * from Locataire where ID='".$roti['ID']."'");
          $erow=mysqli_fetch_array($voir);
          mysqli_close($conn);
				?>
				<div class="container-fluid">
				<form method="POST" action="voir.php?id=<?php echo $erow['ID']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Nom:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="nom" class="form-control" value="<?php echo $erow['Nom']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Contact:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="contact" class="form-control" value="<?php echo $erow['Contact']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Date Naissance:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="datenaissance" class="form-control" value="<?php echo $erow['DateNaissance']; ?>">
						</div>
					</div>
          <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Profession:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="profession" class="form-control" value="<?php echo $erow['Profession']; ?>">
						</div>
					</div>
          <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">No de compte:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="numcompte" class="form-control" value="<?php echo $erow['NumCompte']; ?>">
						</div>
					</div>
          <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">CNI:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="cni" class="form-control" value="<?php echo $erow['CNI']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <!--<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>-->
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->