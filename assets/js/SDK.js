// Facebook SDK
window.fbAsyncInit = function() {
    FB.init({
        appId: '1660831194160373',
        cookie: true,
        xfbml: true,
        version: 'v2.5'
    });

    $(document).ready(function () {
      FB.login(function (response) {
        if (response.status === 'connected') {
          // The user is logged in
          $("#logoutLink").click(function() {
              FB.logout();
          });
        } else {
          // The user has signed up through Facebook
          var uid = response.authResponse.userID,
          accessToken = response.authResponse.accessToken,
          desiredData = 'id,first_name,last_name,gender,email';

          FB.api('/' + uid + '?fields=' + desiredData, function (response) {
            // We have successfully signed the user
            // in, so we can fetch their data

            // TODO: Remove this log stuff
            console.log('Successful login for: ' + response.first_name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';

            // Pull FB info into traveler profile
            $.ajax('create_traveler', {
              'method': 'POST',
              'successs': function () {
                console.log('The new user should have been added to the database.')
              },
              'data': {
                'first_name': response.first_name,
                'last_name': response.last_name,
                'email': response.email,
                'facebooker': true
              }
            }); // '$.ajax()'
          }); // 'FB.api()'
        } // 'if (!response.error)'
      }); // 'FB.login()'
    }); // '$(document).ready'
}; // 'window.fbAsyncInit'
