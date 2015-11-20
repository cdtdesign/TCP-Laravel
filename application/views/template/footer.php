  <div id="footer" class="container">
    <p class="center">
      <b>
        &copy; 2015 Traveling Children Project, LLC. All rights reserved.
        <a href="https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha" alt="Google Chrome" target="_blank">
          <img id="chrome" src="/assets/img/chrome.png" />
          Best viewed with Google Chrome</a>.
      </b>
    </p>
    <br />
    <div id="socialBadges">
      <a href="https://vimeo.com/channels/tcpvideos" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-vimeo.png" title="Vimeo" alt="Vimeo"></a>
      <a href="https://twitter.com/KiDFRONTATiON" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-twitter.png" title="Tweet" alt="Twitter"></a>
      <a href="https://www.pinterest.com/TCJourneys/" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-pinterest.png" title="Pin" alt="Pinterest"></a>
      <a href="https://instagram.com/travelingchristian/" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-instagram.png" title="IG" alt="Instagram"></a>
      <a href="https://www.facebook.com/TravelingChristian" target="_blank"><img class="socialBadges hvr-bob" src="/assets/img/socials/tcp-social-facebook.png" title="FB" alt="Facebook"></a>
    </div>
    <div id="tcDownloads">
      <a href="http://bit.ly/JourneyKitPDF" target="_blank">
        <img src="/assets/img/tcp-journeykit-footer-peek.svg" class="journeyKitDowload" alt="Download TC here!" data-toggle="tooltip" data-placement="right" title="Download Journey Kit!">
      </a>
    </div>
  </div> <!-- .footer -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins and probably Facebook's SDK) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Bootstrap Stuff -->
  <script src="/assets/js/bootstrap.min.js"></script>
  <script>
    $(function () {
    	$('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <!-- Facebook API Stuff -->
  <script>
      // // Facebook SDK
      // window.fbAsyncInit = function() {
      //     FB.init({
      //         appId: '1660831194160373',
      //         cookie: true, // enable cookies to allow the server to access
      //         // the session
      //         xfbml: true, // parse social plugins on this page
      //         version: 'v2.5' // use version 2.5
      //     });
      //
      //     // Now that we've initialized the JavaScript SDK, we call
      //     // FB.getLoginStatus().  This function gets the state of the
      //     // person visiting this page and can return one of three states to
      //     // the callback you provide.  They can be:
      //     //
      //     // 1. Logged into your app ('connected')
      //     // 2. Logged into Facebook, but not your app ('not_authorized')
      //     // 3. Not logged into Facebook and can't tell if they are logged into
      //     //    your app or not.
      //     //
      //     // These three cases are handled in the callback function.
      //
      //     FB.getLoginStatus(function(response) {
      //         statusChangeCallback(response);
      //     });
      //
      // };
      //
      // // Load the SDK asynchronously
      // (function(d, s, id) {
      //     var js, fjs = d.getElementsByTagName(s)[0];
      //     if (d.getElementById(id)) return;
      //     js = d.createElement(s);
      //     js.id = id;
      //     js.src = "//connect.facebook.net/en_US/sdk.js";
      //     fjs.parentNode.insertBefore(js, fjs);
      // }(document, 'script', 'facebook-jssdk'));
      //
      // // Here we run a very simple test of the Graph API after login is
      // // successful.  See statusChangeCallback() for when this call is made.
      // function testAPI() {
      //     console.log('Welcome!  Fetching your information.... ');
      //
      //     //We have successfully signed the user in so we can fetch their data
      //     var desiredUserData = [
      //         'first_name',
      //         'last_name',
      //         'gender',
      //         'email'
      //     ];
      //
      //     FB.api('/me', {
      //         fields: desiredUserData
      //     }, function(response) {
      //         console.log('Successful login for: ' + response.first_name);
      //         document.getElementById('status').innerHTML =
      //             'Thanks for logging in, ' + response.name + '!';
      //
      //         var users_email = response.email;
      //         console.log("Beginning to try creating the user");
      //         // Pull FB info into traveler profile
      //         $.ajax('create_traveler', {
      //             'method': 'POST',
      //             'data': {
      //                 'first_name': response.first_name,
      //                 'last_name': response.last_name,
      //                 'email': response.email,
      //                 'password': 'Facebook15',
      //                 'password_confirm': 'Facebook15'
      //             }
      //         });
      //     });
      // }
      //
      // $("#logoutLink").click(function() {
      //     FB.logout();
      // });
  </script>
</html>
