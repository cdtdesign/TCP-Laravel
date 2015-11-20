<?php
  if ($userLoggedIn):
  /**
   * The user has logged in according to the
   * controller, so we'll display the
   * appropriate navigation bar
   */
?>
  <!-- Begin Modal -->
  <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel">
    <div class="container">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h2>About</h2>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
          </div> <!-- .modal-header -->
          <div class="modal-body">
            <p>Traveling Children Project (TCP) is a fun activity that encourages children, who we like to refer to as our <b>Travelers,</b> and their families to explore a variety of destinations, creating memorable experiences and later recording those experiences
              in their Passport Journals. Follow travel guide, Traveling Christian (TC), either online or find your own path using the Journey Kit that includes: TC, Journey Compass and Passport. Find the link to our PIY (print-it-yourself) downloads
              at the very bottom of the home page.<b>Remember, it's not JUST about the destination, but also enjoying the journey along the way! Wishing you many happy travels!!</p>
            <p style="text-align:right;"><em>— Your friends, at Traveling Children Project</em></p>
          </div> <!-- .modal-body -->
        </div> <!-- .modal-content -->
      </div> <!-- .modal-dialog -->
  </div> <!-- .container -->
  </div> <!-- .modal .fade -->
  <!-- End Modal -->

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
          <a href="/home">
            <!-- <object class="wordmark hvr-grow" data="/assets/img/traveling-children-project-passport-wordmark.svg" type="image/svg+xml"> -->
              <img src="/assets/img/traveling-children-project-passport-wordmark.png" alt="Traveling Children Project Passport" class="wordmark hvr-grow">
            <!-- </object> -->
          </a>
        </div> <!-- .navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><button class="btn aboutModalButton" data-toggle="modal" data-target="#aboutModal">About</button></li>
            <li><a href="#">Journey Blog</a></li>
            <li><a href="#">What's supposed to be here???</a></li>

            <!-- Button trigger modal -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Passport <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li data-toggle="modal" data-target="#passportProfileModal"><a href="#passportProfileModal">View Passport Profile</a></li>
                <li><a href="#">Passport Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/auth/logout" id="logoutLink">Sign Out</a></li>
              </ul> <!-- .dropdown-menu -->
            </li> <!-- .dropdown -->
          </ul> <!-- .nav .navbar-nav .navbar-right -->
        </div> <!-- .collapse .navbar-collapse -->
      </div> <!-- .container-fluid -->
    </nav> <!-- .navbar .navbar-inverse -->
  </div> <!-- .container -->
<?php
  else:
  /**
   * The controller says the user
   * hasn't logged in, so we'll show
   * them the standard navigation bar
   */
?>
  <!-- Begin Modal -->
  <div class="modal fade bs-example-modal-sm" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4>Traveler Passport Sign Up</h4>
        </div> <!-- .modal-header -->
        <div class="modal-body">
          <input type="text" name="fname" class="form-control journeyPostTitle" value="" placeholder="Traveler's First Name" required />
          <br />
          <input type="text" name="lname" class="form-control" value="" placeholder="Traveler's Last Name" autocomplete="on" required />
          <br />
          <input type="text" name="email" class="form-control" value="" placeholder="Email Address" required />
          <br />
          <input type="text" name="street" class="form-control" value="" placeholder="Street Address, Apt #" required />
          <br />
          <input type="text" name="city" class="form-control" value="" placeholder="City" required />
          <br />
          <input type="text" name="state" class="form-control" value="" placeholder="ST" autocomplete="on" required />
          <br />
          <input type="text" name="zip" class="form-control" value="" placeholder="Zip Code" autocomplete="on" required />
          <br />
          <input type="date" name="birth" class="form-control" value="" autocomplete="on" required />
          <div style="margin-top:15px;margin-bottom:15px;">
            <input type="radio" name="msex" value="male" checked> Male
            <input type="radio" name="fsex" style="margin:5px;"="female"> Female
            <input type="radio" name="nosex" value="decline" style="margin:5px;"> Decline
            <br />
          </div>
          <input type="file" name="img" class="input-group" value="" accept="image/*" />
          <br />
        </div> <!-- .modal-body -->
        <div class="modal-footer">
          <!-- Traveler Email Sign-Up -->
          <form action="home/register" class="form-inline signup-form" method="POST" enctype="multipart/form-data">
            <input style="font-size:1.5em;border-radius:6px;" type="submit" class="btn btn-warning journeyUpdateButton" value="Sign-Up!">
          </form>
        </div> <!-- .modal-footer -->
      </div> <!-- .modal-content -->
    </div> <!-- .modal-dialog .modal-sm -->
  </div> <!-- .modal .fade .bs-example-modal-sm -->
  <!-- End Modal -->

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
          <a href="home">
          <img src="/assets/img/traveling-children-project-passport-wordmark.svg" lowsrc="/assets/img/traveling-children-project-passport-wordmark.png" alt="Traveling Children Project Passport" class="wordmark hvr-grow" />
          </a>
        </div> <!-- .navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <!-- Button trigger About modal -->
            <li>
              <button class="btn aboutModalButton" data-toggle="modal" data-target="#aboutModal">
                <a href="#">About</a>
              </button>
            </li>
            <li class="disabled" data-toggle="tooltip" data-placement="bottom" title="Sign In to view Journey Blog">
              <a href="#">Journey Blog</a>
            </li>

            <!-- Button trigger Sign In modal -->
            <li data-toggle="modal" data-target="#signinModal">
              <a href="#signinModal">Sign In</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign Up <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="facebook-signup">
                  Sign Up with Facebook
                </li>
                <li role="separator" class="divider"></li>

                <!-- Button trigger Sign Up modal -->
                <li id="email-signup" data-toggle="modal" data-target="#signupModal">
                  <a href="#signupModal">Sign Up with Your Email</a>
                </li>
              </ul> <!-- .dropdown-menu -->
            </li> <!-- .dropdown -->
          </ul> <!-- .nav .navbar-nav .navbar-right -->
        </div> <!-- .collapse .navbar-collapse -->
      </div> <!-- .container-fluid -->
    </nav> <!-- .navbar .navbar-inverse -->
  </div> <!-- .container -->
<?php endif ?>
