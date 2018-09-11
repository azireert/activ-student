<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.carousel').carousel()
    });
</script>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../../../assets/Images/banniere-4.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../../../assets/Images/banniere-3.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../../../assets/Images/banniere-1.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<img class="img-fluid logo" src="../../../assets/Images/Fichier_3.svg"/>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse text" id="navbarNav">
	    	<ul class="navbar-nav">
		      	<li class="nav-item">
		        	<a class="nav-link" href="home.php">Accueil</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="sorties.php">Sorties</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="covoit.php">Covoiturage</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="cours.php">Cours</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="bde.php">BDE</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="profil.php">Profil</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="deco.php">Déconnexion</a>
		      	</li>
	    	</ul>
	  	</div>
	</nav>




