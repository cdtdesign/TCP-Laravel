<!-- Passport Profile Modal -->
<div class="modal fade" id="profileModal">
	
  <div class="modal-dialog">
    <div class="modal-content travelerProfile">
      <div class="modal-header"  data-traveler-id="<?= $traveler->id ?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="pp_title">My Passport Profile</h2>
      </div>
      <div class="modal-body">
		  	<?php if($traveler->pic != NULL): ?>
		<div class="pp_pic"><img src="/assets/uploads/<?= $traveler->pic ?>"></div>
			<?php endif ?>
        <p><b>First Name:</b> <?= $traveler->first_name ?></p>
		<p><b>Last Name:</b> <?= $traveler->last_name ?></p>
		<p><b>Email:</b> <?= $traveler->email ?></p>
		<p><b>Street Address:</b> <?= $traveler->street ?></p>
		<p><b>City:</b> <?= $traveler->city ?></p>
		<p><b>State:</b> <?= $traveler->state ?> <b>Zip:</b> <?= $traveler->zip ?></p>
		<p><b>Birthday:</b> <?= $traveler->birthday ?></p>
      </div>
      <div class="modal-footer">
		<button class="btn btn-primary btn-lg editProfileButton" data-toggle="modal" data-target="#signupModal">Edit</button>
        <a href="/travelers/delete/<?= $traveler->id ?>" class="btn btn-warning btn-lg deleteProfileButton" data-dismiss="modal" role="button">Delete Passport</a>
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
				  <li data-toggle="modal" data-target="#profileModal"><a href="#profileModal">View Passport Profile</a></li>
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
			var traveler 	= $(".travelerProfile"),
			// buttons		= $(".profileEditButton"),
			signupButton	= $('input[type="submit"]')[0],
			editProfileBttn = $(".editProfileButton")[0],
			first_nameField = $('input[name="first_name"]')[0],
			last_nameField	= $('input[name="last_name"]')[0],
			emailField 		= $('input[name="email"]')[0],
			streetField 	= $('input[name="street"]')[0],
			cityField 		= $('input[name="city"]')[0],
			stateField 		= $('input[name="state"]')[0],
			zipField 		= $('input[name="zip"]')[0],
			birthField 		= $('date[name="birth"]')[0],
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
					submitButton.value    	= "Update";
					// imgField.value		= travelerProfile['img'];
					$(".signup-form")[0].setAttribute("action", "/home/edit/" + travelerID);
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