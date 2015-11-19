<!-- ////////////////////////////////////////////////
  COURSE: Advanced Server-Side Languages (ASL) - Online
  ASSIGNMENT: Week 2 - Project Version 1 - TCP Passport Web App
  DATE: November 5, 2015
  NAME: Christina D. Thorpe-Rogers

  ///////////////////////////////////////////////// -->
<div class="navAllowance container">
<div class="container">
  <?php if ($this->session->flashdata('image_uploaded')): ?>
  <div class="message-container">
    <p class="message success-message">Saved!</p>
  </div>
  <script>
    // Jump to the edited post (The space offset is in the styles of the anchor)
    window.location.href = "#<?= $this->session->flashdata('post_edited') ?>";
  </script>
  <?php endif ?>
  <!-- Modal -->
  <div class="modal fade" id="journeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <!-- Journey Post Entry -->
          <form action="/journeys/create" class="form-inline journey-form" method="POST" enctype="multipart/form-data">
            <h4>
              <label for="title">TC Journey to </label>
              <input type="text" name="title" id="title" placeholder="Enter Journey Post Title…" style="background:none;border:none;color:#ee6730;margin-left: 15px;line-height: normal;width: 375px !important;" required />
            </h4>
        </div>
        <div class="modal-body">
        <input type="text" style="display:none;" name="travelerid" class="form-control journeyPostTitle" value="3" placeholder="Traveler's First Name…" required /><br />
        <input type="date" name="date" class="form-control" value="" autocomplete="on" required /><br />
        <textarea rows="10" name="body" class="form-control" value="" placeholder="Body..." required></textarea><br />
        <input type="htags" name="htags" class="form-control" value="#HappyTravels #TravelingChristian" placeholder="#Hashtagserwttwttw" required /><br />
        <input type="file" name="journey_header_image" class="input-group" value="" accept="image/*" /><br />
        </div>
        <div class="modal-footer">
        <input style="font-size:1.5em;border-radius:6px;" type="submit" class="btn btn-warning journeyUpdateButton" value="Create">
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Crest & Welcome Text -->
  <div class="center welcome">
    <img src="/assets/img/tcp-crest-yllwshirt.svg" class="crest hvr-grow-rotate" />
    <p class="lead center"><span>Welcome Traveler!</span> You have arrived at Traveling Children Project's Journey Blog! Here you can share your journey with other Travelers and also see where their travels have led them. <em style="font-weight:500;">Where has TC taken you? Click the button below to share your latest journeys here!</em></p>
    <!-- Button trigger modal -->
    <button type="button" style="margin:auto,0;" class="btn btn-primary btn-lg journeyModalButton journeyCreateButton" data-toggle="modal" data-target="#journeyModal"><span class="hvr-icon-spin" style="color:#ef6831;text-align:center;line-height:50px;font-size:1.125em;"></span>
    </button>
  </div>
  <!-- JOURNEY BLOG -->
  <div class="jp_section">
    <div class="journey_post">
      <div class="jp_wrapper">
        <?php foreach ($ten_posts as $post): ?>
        <div class="journeyPost" data-journey-id="<?= $post->id ?>">
          <a name="<?= $post->id ?>"></a>
          <a class="x" href="journeys/delete/<?= $post->id ?>">&times</a>
          <div class="jpPadding">
            <p class="jp_title"><?= $post->title ?></p>
          </div>
          <!-- /.jpPadding -->
          <?php if($post->img != NULL): ?>
          <div class="jp_img"><img src="/assets/uploads/<?= $post->img ?>"></div>
          <?php endif ?>
          <div class="jpPadding">
            <p class="jp_fname_date"><em><a href="#"><b>Traveling <?= $post->user->fname ?></b></a> / <?= $post->date ?></em></p>
            <p class="jp_body"><?= $post->body ?></a></p>
            <p class="htags"><?= $post->htags ?></p>
            <!-- Modal Footer -->
            <hr class="jp_divider">
            </hr>
            <button class="btn btn-primary journeyEditButton" data-toggle="modal" data-target="#journeyModal">EDIT</button>
            <a href="/journeys/delete/<?= $post->id ?>" class="btn btn-warning journeyDeleteButton" role="button">DELETE</a>
          </div>
          <!-- /.jpPadding -->
        </div>
        <!-- /.journeyPost div -->
        <?php endforeach ?>
      </div>
      <!-- /.jp_wrapper -->
    </div>
    <!-- /.journey_post -->
  </div>
  <!-- /.jp_section -->
</div>
<!-- /.container -->
<script>
  // Tooltip functionality
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<script>
  // Link variables to Journey Post field inputs
  $(document).ready(function () {
  	var journeys 	= $(".journeyPost"),
  	buttons			= $(".journeyEditButton"),
  	submitButton	= $('input[type="submit"]')[0],
  	fnameField 		= $('input[name="fname"]')[0],
  	titleField 		= $('input[name="title"]')[0],
  	dateField 		= $('input[name="date"]')[0],
  	bodyField 		= $('textarea[name="body"]')[0],
  	htagsField 		= $('input[name="htags"]')[0],
  	journeyID 		= null;

  	// Edit button click functionality
  	buttons.click(function () {
  		var button = this;
  		var journeyPost = journeys[$(buttons).index(button)];
  		journeyID = $(journeyPost).data('journey-id');

  		// Gets the journey info and decodes the JSON
  		$.get('/journeys/show/' + journeyID, function (travelerPost) {
  			// var idField = $('#id-element')[0],
  			// imgField 		= $('input[name="img"]')[0];
  			var travelerPost = JSON.parse(travelerPost)[0];
  			fnameField.value = travelerPost['fname'];
  			titleField.value = travelerPost['title'];
  			dateField.value  = travelerPost['date'];
  			bodyField.value  = travelerPost['body'];
  			htagsField.value = travelerPost['htags'];
  			submitButton.value = "Update";
  			// imgField.value	 = travelerPost['img'];
  			$(".journey-form")[0].setAttribute("action", "/journeys/edit/" + journeyID);
  		});
  	});

  	// Create button click functionality
  	var createJourneyButton = $(".journeyCreateButton")[0],
  	journeyUpdateButton = $('.journeyUpdateButton')[0];
  	$(createJourneyButton).click(function () {
  		submitButton.value = "Create";
  	});

  	// If the message container is showing we'll animate it away
  	var messageContainer = $(".message-container");
  	$(messageContainer).click(function () {
  		// If the user is impatient and clicks the message
  		// container we'll get it out of their way
  		messageContainer.fadeOut();
  	});
  	setTimeout(function () {
  		// Otherwise we'll dismiss the message
  		// container after a few seconds
  		messageContainer.fadeOut();
  	}, 2250);
  });
</script>
