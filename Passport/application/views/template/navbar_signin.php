<!-- ////////////////////////////////////////////////

COURSE: Advanced Server-Side Languages (ASL) - Online
ASSIGNMENT: Week 2 - Project Version 1 - TCP Passport Web App
DATE: November 5, 2015
NAME: Christina D. Thorpe-Rogers

///////////////////////////////////////////////// -->

	<!-- Modal -->
		<div class="modal fade bs-example-modal-sm" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h2>Traveler Passport Profile</h2>
				<!-- Traveler Email Sign-Up -->
				<form action="home/signup" class="form-inline signup-form" method="POST" enctype="multipart/form-data">
			      </div><!-- /.modal-header -->
			      <div class="modal-body">
					<input type="text" name="fname" class="form-control journeyPostTitle" value="" placeholder="Traveler's First Name" required /><br />
					<input type="text" name="lname" class="form-control" value="" placeholder="Traveler's Last Name" autocomplete="on" required /><br />
					<input type="text" name="email" class="form-control" value="" placeholder="Email Address" required /><br />
					<input type="text" name="street" class="form-control" value="" placeholder="Street Address, Apt #" required /><br />
					<input type="text" name="city" class="form-control" value="" placeholder="City" required /><br />
					<input type="text" name="state" class="form-control" value="" placeholder="ST" autocomplete="on" required /><br />
					<input type="text" name="zip" class="form-control" value="" placeholder="Zip Code" autocomplete="on" required /><br />
					<input type="date" name="birth" class="form-control" value="" autocomplete="on" required />
					<div style="margin-top:15px;margin-bottom:15px;"><input type="radio" name="msex" value="male" checked> Male <input type="radio" name="fsex" style="margin:5px;" ="female"> Female <input type="radio" name="nosex" value="decline" style="margin:5px;"> Decline <br /></div>
					<input type="file" name="img" class="input-group" value="" accept="image/*" /><br />
			      </div><!-- /.modal-body -->
			      <div class="modal-footer">
			      <input style="font-size:1.5em;border-radius:6px;" type="submit" class="btn btn-warning journeyUpdateButton" value="Sign-Up!">
				</form>
		      </div><!-- /.modal-footer -->
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
	        <li><button class="btn aboutModalButton" data-toggle="modal" data-target="#aboutModal">About</button></li>
			 <li class="disabled" data-toggle="tooltip" data-placement="bottom" title="Sign-In to view Journey Blog"><a href="#">Journey Blog</a></li>
			 <li><a href="#">Sign-In</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign-Up <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li id="facebook-signup"><a href="#">Sign-Up with Facebook</a></li>
	            <li role="separator" class="divider"></li>
				<!-- Button trigger signup modal -->
	            <li data-toggle="modal" data-target=".bs-example-modal-sm"><a href="#">Sign-Up with Your Email</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div><!-- /.container -->
