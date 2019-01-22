<?php 
	
	$page_title = 'Ballina';
	$stylesheets = '<link rel="stylesheet" href="assets/css/index.css" type="text/css"/>';
	require_once 'layouts/header.php';  
?>

<div class="container">
    
    <div class="jumbotron">
        <h1>Pershendetje, <?php echo $userRow['first_name']; ?></h1>
        <p>Jeni kyqur ne aplikacionin Healthcare.</p>
    </div>   
</div>

<?php require_once 'layouts/footer.php'; ?>