<!-- Passport Profile Modal -->
<div class="modal fade" id="passportProfileModal">
	
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"  data-profile-id="<?= $traveler->id ?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">My Passport Profile</h4>
      </div>
      <div class="modal-body">
		  	<?php if($traveler->pic != NULL): ?>
		<div class="pp_pic"><img></img></div>
			<?php endif ?>
        <p>First Name: <?= $traveler->first_name ?></p>
		<p>Last Name: <?= $traveler->last_name ?></p>
		<p>Email: <?= $traveler->user_email ?></p>
		<p>Password: <?= $traveler->user_pass ?></p>
		<p>Street Address: <?= $traveler->street ?></p>
		<p>City: <?= $traveler->city ?></p>
		<p>State: <?= $traveler->state ?> Zip: <?= $traveler->zip ?></p>
		<p>Birthday: <?= $traveler->birthday ?></p>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-primary editProfileButton">Edit</button>
        <button type="button" class="btn btn-warning deleteProfileButton" data-dismiss="modal">Delete Passport</button>
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
		  <a href="home"><img src="/assets/img/traveling-children-project-passport-wordmark.svg" lowsrc="/assets/img/traveling-children-project-passport-wordmark.png" alt="Traveling Children Project Passport" class="wordmark hvr-grow" /></a>
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

	<script>
		// Link variables to Passport Profile field inputs
		$(document).ready(function () {
			var traveler 	= $(".signupModal"),
			// buttons		= $(".profileEditButton"),
			signupButton	= $('input[type="submit"]')[0],
			editProfileBttn = $(".editProfileButton")[0],
			first_nameField = $('input[name="first_name"]')[0],
			last_nameField	= $('input[name="last_name"]')[0],
			emailField 		= $('input[name="email"]')[0],
			streetField 	= $('input[name="street"]')[0],
			cityField 		= $('textarea[name="city"]')[0],
			stateField 		= $('input[name="state"]')[0],
			zipField 		= $('input[name="zip"]')[0],
			birthField 		= $('input[name="birthday"]')[0],
			sexField 		= $('input[name="gender"]')[0],
			// picField 	= $('input[name="htags"]')[0],
			travelerID 		= null;
			
			// editProfile button click functionality
			editProfileBttn.click(function () {
				var button = this;
				var travelerProfile = traveler[$(editProfileBttn).index(button)];
				travelerID = $(travelerProfile).data('traveler-id');
				
				// Gets the Traveler info and decodes JSON
				$.get('/travelers/show/' + travelerID, function (travelerProfile) {
					// var idField = $('#id-element')[0],
					// picField 		= $('input[name="pic"]')[0];
					var travelerProfile = JSON.parse(travelerProfile)[0];
					console.log(travelerProfile);
					first_nameField.value   = travelerProfile['first_name'];
					last_nameField.value    = travelerProfile['last_name'];
					emailField.value    	= travelerProfile['email'];
					streetField.value  		= travelerProfile['street'];
					cityField.value     	= travelerProfile['city'];
					stateField.value    	= travelerProfile['state'];
					zipField.value      	= travelerProfile['zip'];
					birthField.value    	= travelerProfile['birthday'];
					sexField.value      	= travelerProfile['gender'];
					saveButton.value    	= "Save";
					// imgField.value		= travelerProfile['img'];
					$(".signup-form")[0].setAttribute("action", "/traveler/edit/" + travelerID);
				});
			});
			// SignUp button click functionality
			var signupButton = $(".signupButton")[0],
			editProfileButton = $('.editProfileButton')[0];
			$(signupButton).click(function () {
				submitButton.value = "Sign Up!";
			});
		});
	</script>