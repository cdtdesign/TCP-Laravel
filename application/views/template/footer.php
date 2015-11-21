    <div id="footer" class="container">
		<p class="center"><b>&copy; 2015 Traveling Children Project, LLC. All rights reserved. <a href="https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha" alt="Google Chrome" target="_blank"><img id="chrome" src="/assets/img/chrome.png" /></a> Best viewed with <a href="https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha" alt="Google Chrome" target="_blank">Google Chrome</a>.</b></p><br />
			<div id="socialBadges">
	        <a href="https://vimeo.com/channels/tcpvideos" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-vimeo.png" title="Vimeo" alt="Vimeo"></a>
	        <a href="https://twitter.com/KiDFRONTATiON" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-twitter.png" title="Tweet" alt="Twitter"></a>
	        <a href="https://www.pinterest.com/TCJourneys/" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-pinterest.png" title="Pin" alt="Pinterest"></a>
	        <a href="https://instagram.com/travelingchristian/" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-instagram.png" title="IG" alt="Instagram"></a>
	        <a href="https://www.facebook.com/TravelingChristian" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-facebook.png" title="FB" alt="Facebook"></a>
		</div><!-- END socialBadges -->
		<div id="tcDownloads"><a href="http://bit.ly/JourneyKitPDF" target="_blank"><img src="/assets/img/tcp-journeykit-footer-peek.svg" class="journeyKitDowload" alt="Download TC here!" data-toggle="tooltip" data-placement="right" title="Download Journey Kit!"></a></div>
	</div><!-- /.container -->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
	<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	
	<script>
	  // Facebook JS ---> This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI();
	    } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into this app.';
	    } else {
	      // The person is not logged into Facebook, so we're not sure if
	      // they are logged into this app or not.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into Facebook.';
	    }
	  }

	  // This function is called when someone finishes with the Login
	  // Button.  See the onlogin handler attached to it in the sample
	  // code below.
	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '1660831194160373',
		    cookie     : true,  // enable cookies to allow the server to access 
		                        // the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.5' // use version 2.5
		  });

		  // Now that we've initialized the JavaScript SDK, we call 
		  // FB.getLoginStatus().  This function gets the state of the
		  // person visiting this page and can return one of three states to
		  // the callback you provide.  They can be:
		  //
		  // 1. Logged into your app ('connected')
		  // 2. Logged into Facebook, but not your app ('not_authorized')
		  // 3. Not logged into Facebook and can't tell if they are logged into
		  //    your app or not.
		  //
		  // These three cases are handled in the callback function.

		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });
	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  // Here we run a very simple test of the Graph API after login is
	  // successful.  See statusChangeCallback() for when this call is made.
	  function testAPI() {
	    console.log('Welcome!  Fetching your information.... ');
		
		//We have successfully signed the user in so we can fetch their data
		var desiredUserData = [
			'first_name',
			'last_name',
			'gender',
			'email'
		];
		
	    FB.api('/me', {fields: desiredUserData}, function(response) {
		      console.log('Successful login for: ' + response.first_name);
		      document.getElementById('status').innerHTML =
		        'Thanks for logging in, ' + response.name + '!';
				console.log(response);
			  var users_email = response.email;
			  console.log("Beginning to try creating the user");
			  // Pull FB info into traveler profile
			  $.ajax('create_traveler', {
				'method': 'POST',
				'data': {
					'first_name': response.first_name,
					'last_name': response.last_name,
					'email': response.email,
					'password': 'Facebook15',
					'password_confirm': 'Facebook15'
					}
				});
			});
	  }
	  
	  $("#logoutLink").click(function () {
		  FB.logout();
	  });
	</script>

	<script>
		// Link variables to SignIn field inputs
		$(document).ready(function () {
			var signin 		= $(".signinModal"),
			signinButton	= $('input[type="submit"]')[0],
			emailField 	= $('input[name="email"]')[0],
			passField		= $('input[type="lpassword"]')[0];
			
			// SignIn button click functionality
			var signinButton = $(".signinButton")[0];
			$(signinButton).click(function () {
				submitButton.value = "Sign In!";
			});
			
		});
	</script>
		
		<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button>

		<div id="status">
		</div> -->
		
	<link rel="stylesheet" type="text/css" href="/assets/css/custom3.css">
  </body>
</html>