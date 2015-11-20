<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//connect.facebook.net/en_US/sdk.js"></script>
<?= '<script>var facebooker = '.$facebooker.'</script>' ?>
<script>
  console.log('Facebook API has loaded');
  // Facebook SDK
  window.fbAsyncInit = function() {
    FB.init({
      appId: '1660831194160373',
      cookie: true,
      xfbml: true,
      version: 'v2.5'
    });

    $(document).ready(function() {
      FB.getLoginStatus(function(response) {
        if (response.status === 'connected' && facebooker) {
          console.log('Signed up with Facebook in the past.')
          /**
           * The user has signed up with Facebook in
           * the past, so we don't want to create a
           * new record in the database for them, we
           * want to ask Facebook if they're
           * authenticated with the application
           */

          // Get their token
          var uid = response.authResponse.userID,
          accessToken = response.authResponse.token,
          tokenExpirationStamp = response.authResponse.signedRequest.expires,
          rightHereRightNow = new Date().getTime();

          if (tokenExpirationStamp <=  rightHereRightNow) {
            // The token has expired and the user
            // must reauthenticate with Facebook
            accessToken = 'Expired at ' + tokenExpirationStamp;
            // FB.login();
          }

          // Tell PHP that the user has signed in
          // with Facebook rather than natively
          $.ajax('/facebookerLoggedIn', {
            'method': 'POST',
            'data': {
              'uid': uid
            }
          });

          // The user is logged in; Let them log out
          $("#logoutLink").click(function() {
            FB.logout();

            // Tell PHP that the user
            // has signed out of TCP
            $.ajax('/facebookerLoggedOut', {
              'method': 'POST',
              'data': {
                'uid': uid
              }
            });
          });
        } else if (!facebooker) {
           /**
            * The user either hasn't authorised TCP or
            * they're logged out of Facebook. We'll
            * present the pop-up to allow them to
            * either give us permission to authenticate
            * them or authenticate with Facebook (and
            * TCP, of course), then they will have
            * given us access to their information.
            */
           console.log('Not authorised with TCP.')
          $('#facebook-signup').click(function () {
            FB.login(function (loginResponse) {
              console.log(loginResponse);
              if (loginResponse.status === 'connected') {
                var uid = loginResponse.authResponse.userID,
                accessToken = loginResponse.authResponse.accessToken,
                desiredData = 'id,first_name,last_name,gender,email';

                FB.api('/' + uid + '?fields=' + desiredData, function(response) {
                  // We have successfully signed the user
                  // in, so we can fetch their data
                  var gender;
                  switch (response.gender) {
                  case "male":
                    gender = 1;
                    break;
                  case "female":
                    gender = 2;
                    break;
                  default:
                    gender = 0;
                    break;
                  }

                  // TODO:
                  // Determine if the user has signed up before by checking the database for their facebook user id. If there's one there, they've signed in through Facebook before. Otherwise, they haven't, and you should trigger the ajax call below.

                  /**
                   * At this point the data Facebook gave
                   * us is written to the database, and
                   * we also make sure we say that the
                   * user signed up with Facebook. We say
                   * so in the PHP this AJAX calls (i.e.
                   * Home/registerFacebooker in Home.php)
                   */
                  $.ajax('create_facebooking_traveler', {
                    'method': 'POST',
                    'data': {
                      'first_name': response.first_name,
                      'last_name': response.last_name,
                      'email': response.email,
                      'gender': gender,
                      'facebookID': uid,
                      'token': accessToken,
                      'in': 1
                    },
                    'success': function () {
                      console.log('Should have sent the user data to the database');
                    }
                  });
                });
              }
            }, {scope: 'public_profile,email'});
          });
        }
      });
    });
  };
</script>
