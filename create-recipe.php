<?php 
	//Required in all pages
	$page_title = 'Kërko recetat';
	$stylesheets = '<link rel="stylesheet" href="assets/css/index.css" type="text/css"/>'; //can be empty. ex: ''
	require_once 'layouts/header.php';  
	 
	if (isset($_POST['recipe'])) {
	 
		$first_name 	= trim($_POST['first_name']);
		$middle_name 	= trim($_POST['middle_name']);
		$last_name 		= trim($_POST['last_name']);
		$personal_nr	= trim($_POST['personal_nr']);
		$address		= trim($_POST['address']);
		$phone			= trim($_POST['phone']);
		$email			= trim($_POST['email']);
		$description	= trim($_POST['recipe']);
		
		$doctor_id		= $userRow['id'];
		
		$last_recipe = $conn->query("SELECT * FROM recipes ORDER BY id DESC LIMIT 1");
		$last_recipe = mysqli_fetch_array($last_recipe, MYSQLI_ASSOC); 
		$reference = "REF".date('y')."".date('m')."".($last_recipe['id']+1); 
		  
		$stmts = $conn->prepare("INSERT INTO recipes
			(first_name,middle_name,last_name,personal_nr,address,phone,email,description,doctor_id,reference) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
		");
		$stmts->bind_param("ssssssssss", $first_name, $middle_name, $last_name, $personal_nr, $address, $phone, $email, $description, $doctor_id, $reference );
		$res = $stmts->execute();//get result
		$stmts->close();  
	}
?>

<div class="container"> 
	<div class="jumbotron">
		<div class="row">
			<div class="col-md-12"> 
				<h5>Kërko pacientin <code>(API call)</code></h5>
			</div>
			<div class="col-md-8"> 
				<input type="text" name="query" id="query" value="0123456789" class="form-control" placeholder="numri personal i pacientit">  
			</div>
			<div class="col-md-4"> 
				<button class="btn btn-primary d-block" id="searchBtn">Kërko</button> 
			</div>
		</div>
	</div>
	
	<div class="alert alert-warning d-none" id="searchResultsMsg">
		Nuk u gjetë asnjë përdorues!
	</div>
	
	<form method="POST" action="">
		<div class="row" id="newRecipeForm">
			
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="first_name"> Emri <span>*</span></label>
					<input type="text" class="form-control" name="first_name" id="first_name" required> 
				</div> 
			</div>
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="middle_name"> Atësia (emri babës)  <span>*</span></label>
					<input type="text" class="form-control" name="middle_name" id="middle_name" required> 
				</div> 
			</div>
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="last_name"> Mbiemri <span>*</span></label>
					<input type="text" class="form-control" name="last_name" id="last_name" required> 
				</div> 
			</div>
		
			<div class="col-md-12 apiValue"> 
				<div class="form-group">
					<label for="personal_nr"> Numri Personal <span>*</span></label>
					<input type="text" class="form-control" name="personal_nr" id="personal_nr" required> 
				</div> 
			</div>
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="address"> Adresa</label>
					<input type="text" class="form-control" name="address" id="address"> 
				</div> 
			</div>
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="phone"> Tel</label>
					<input type="text" class="form-control" name="phone" id="phone"> 
				</div> 
			</div>
			<div class="col-md-4 apiValue"> 
				<div class="form-group">
					<label for="email"> Email</label>
					<input type="text" class="form-control" name="email" id="email"> 
				</div> 
			</div>
			<div class="col-md-12"> 
				<div class="form-group">
					<label for="description"> Receta <span>*</span> </label>
					<textarea class="form-control" name="recipe" id="description" required></textarea>
				</div> 
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Krijo recetën</button>
	</form>
</div>

<?php require_once 'layouts/footer.php'; ?>

<script>

	$('#searchBtn').click(function(){
			//Clear API inputs
			$('.apiValue :input').val('');
		
			//Hide message div
			$('#searchResultsMsg').addClass('d-none');
			
			//get query string from input
			var query = $("#query").val(); 
			
			//CALL API -> check if results -> fill inputs
			$.ajax({
				url: "http://localhost/healthcare-api/GetCitizenDetailsByPersonalNumber/?personalNr="+query, 
				success: function(result) {
					var data = JSON.parse(result); 
					
					if(data[0] == "No user where found!") {
						$('#searchResultsMsg').removeClass('d-none');
					} else {
						$("#newRecipeForm input").each(function() { 
							var input_id = $(this).attr("id"); 
							$('#'+input_id).val(data[input_id]) 
						});
					} 
				}
			});
		
	});
 

</script>
