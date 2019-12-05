<?php session_start(); ?>
<html>
<head>


		  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="siteReservationCSS.css">
		<script src="fonctionjs.js"></script>

</style>
</head>

<body onload="date()">
	<div id="BOX">
		<div id="FORM">
			<div id="TITRE">
				<h3>Réservation</h3>
			</div>
			<form action="formReservation.php" method="GET">
					<label> S'abonner :</label> 
					<div class="switch">
				      <input type="radio" class="switch-input" name="type" value="abonner" id="abonner" required>
				      <label for="abonner" class="switch-label switch-label-off">Oui</label>
				      <input type="radio" class="switch-input" name="type" value="journalier" id="journalier" checked>
				      <label for="journalier" class="switch-label switch-label-on">Non</label>
				      <span class="switch-selection"></span>
				    </div>
					<label>Nom :</label><input type="text" name="nom" id="nom" required/></br>
					<label>Date début :</label><input type="date" name="debutD" id="debutD" value="<?php echo date("Y-m-d");?>" required/></br>
					<label>Date fin :</label><input type="date"name="finD" id="finD"  value="<?php echo date("Y-m-d",time()+86400);?>"required/></br>
				<input type="submit" name="reserver" value="Valider" id="valider" onclick="verifierDate()" />
			</form>
		</div>
<?php if(isset($_SESSION['qrcode']))
{
echo'<div class="container">
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Votre Carte RFID </h4>
        </div>
        <div class="modal-body">
         <div class="mx-auto" style="width: 200px;">
         	<img class="center-block" src="test.jpg"/>
         </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>';

echo'<script type="text/javascript">
				$(myModal).modal("show");
		 </script>';	

unset($_SESSION['qrcode']);
}
?>

	</div>
</body>