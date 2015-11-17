<!-- Passport Profile Modal -->
<div class="modal fade" id="passportProfileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">My Passport Profile</h4>
      </div>
      <div class="modal-body">
        <p>One fine passport!&hellip;</p>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-primary">Edit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Delete Passport</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
		  <a href="home"><img src="/ASL/Passport/assets/img/traveling-children-project-passport-wordmark.svg" lowsrc="/ASL/Passport/assets/img/traveling-children-project-passport-wordmark.png" alt="Traveling Children Project Passport" class="wordmark hvr-grow" /></a>
	    </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
  			<!-- Button trigger About modal -->
	        <li><button class="btn aboutModalButton" data-toggle="modal" data-target="#aboutModal"><a href="#">About</a></button></li>
			 <li><a href="journeys">Journey Blog</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Passport <span class="caret"></span></a>
	          <ul class="dropdown-menu">
				  <!-- Button trigger modal -->
				  <li data-toggle="modal" data-target="#passportProfileModal"><a href="#passportProfileModal">View Passport Profile</a></li>
	            <!-- <li><a href="#">Passport Profile</a></li> -->
	            <li role="separator" class="divider"></li>
	            <li><a href="/auth/logout" id="logoutLink">Sign Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div><!-- /.container -->