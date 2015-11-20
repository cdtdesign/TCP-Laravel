$(document).ready(function() {
  /**
   * Attach an event listener to the 'Edit' buttons
   * which will send another request to the server
   * for the data related to the post the 'Edit'
   * button was clicked on then replace the input
   * field values with it
   */
  var buttons = $(".journeyEditButton");
  buttons.click(function() {
    var traveler = $(".signupModal"),
    signupButton = $('input[type="submit"]')[0],
    fnameField = $('input[name="fname"]')[0],
    lnameField = $('input[name="lname"]')[0],
    emailField = $('input[name="email"]')[0],
    streetField = $('input[name="street"]')[0],
    cityField = $('textarea[name="city"]')[0],
    stateField = $('input[name="state"]')[0],
    zipField = $('input[name="zip"]')[0],
    birthField = $('input[name="birthday"]')[0],
    sexField = $('input[name="gender"]')[0],
    journeyID = null;

    var button = this,
    journeyPost = traveler[$(editProfileBttn).index(button)];
    journeyID = $(journeyPost).data('traveler-id');

    // Gets the Traveler info and decodes JSON
    $.get('/travelers/show/' + journeyID, function(journeyPost) {
        var journeyPost = JSON.parse(journeyPost)[0];
        fnameField.value = journeyPost['fname'];
        lnameField.value = journeyPost['lname'];
        emailField.value = journeyPost['email'];
        streetField.value = journeyPost['street'];
        cityField.value = journeyPost['city'];
        stateField.value = journeyPost['state'];
        zipField.value = journeyPost['zip'];
        birthField.value = journeyPost['birthday'];
        sexField.value = journeyPost['gender'];
        saveButton.value = "Save";
        $(".signup-form")[0].setAttribute("action", "/journey/edit/" + journeyID);
    });
  });
});
