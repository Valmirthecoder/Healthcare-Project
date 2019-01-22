<?php 
	
	$page_title = 'Kërko recetat';
	$stylesheets = '<link rel="stylesheet" href="assets/css/index.css" type="text/css"/>'; //can be empty. 
	require_once 'layouts/header.php';  
	
	
	if (isset($_GET['query'])) {
		
		$recipe = $conn->query("SELECT * FROM recipes where reference = '".$_GET['query']."' LIMIT 1");
		$recipe = mysqli_fetch_array($recipe, MYSQLI_ASSOC);  
	}
?>

<div class="container"> 
	<form method="GET" action="search-recipes.php">
	<div class="jumbotron">
		<div class="row">
			<div class="col-md-12"> 
				<h5>Kërko recetat</h5>
			</div>
			<div class="col-md-8"> 
				<input type="text" name="query" class="form-control" placeholder="numri i references" value="REF19011">  
			</div>
			<div class="col-md-4"> 
				<button class="btn btn-primary d-block">Kërko</button> 
			</div>
		</div>
	</div>
	</form>
	
	<?php if(isset($recipe)) {  
		echo'
		<div class="recipe-content row">  
			<div class="col-md-12 item">
				<b>'.$recipe['first_name'].' ('.$recipe['middle_name'].') '.$recipe['last_name'].'</b> 
			</div> 
			<div class="col-md-12 item">
				Numri personal: <b>'.$recipe['personal_nr'].'</b> 
			</div> 
			<div class="col-md-12 item">
				Adresa: '.$recipe['address'].' 
			</div> 
			<div class="col-md-12 item">
				 Tel: '.$recipe['phone'].' 
			</div> 
			<div class="col-md-12 item">
				 Emaili: '.$recipe['email'].'
			</div> 
			<div class="col-md-12 item">
				Receta:
				<p class="recipe-desc mt-3 alert alert-info"> '.$recipe['description'].'</p>
			</div>  
		</div>
		'; 
	} ?>
	
</div>

<?php require_once 'layouts/footer.php'; ?>