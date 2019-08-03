<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Car Database</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">            
			<a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>			
          </li>
		  
		  <li class="nav-item active">            
			<a class="nav-link" href="insert-new.php">Insert New              
            </a>			
          </li>
		  
		  <li class="nav-item active">            
			<a class="nav-link" href="search.php">Search              
            </a>			
          </li>
		  
		  <li class="nav-item active">            
			<a class="nav-link" href="update.php">Update              
            </a>			
          </li>
		  
          <li class="nav-item active">
		  <?php if ($user->is_logged()):?>
            <a class="nav-link" href="logout.php">Logout</a>
		  <?php endif;?>
          </li>          
        </ul>
      </div>
    </div>
  </nav>