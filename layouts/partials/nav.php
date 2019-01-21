<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="index.php">HealthCare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Ballina <span class="sr-only">(current)</span></a>
                </li>
				
				<?php if($userRow['role_id'] == 2 || $userRow['role_id'] == 3) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Recetat Mjekësore
					</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                        <a class="dropdown-item" href="search-recipes.php">Kërko recetat</a> 
                        <?php if($userRow['role_id'] == 2) { ?>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="create-recipe.php">Krijo recetë të re</a> 
						<?php } ?>
                    </div>
                </li>
				<?php } ?>
                <li class="nav-item">
                
                </li>
                <li class="nav-item">
                
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php echo $userRow['first_name']; ?> (<?php echo $userRow['role_name']; ?>)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>