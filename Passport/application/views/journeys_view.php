<!-- ////////////////////////////////////////////////

COURSE: Advanced Server-Side Languages (ASL) - Online
ASSIGNMENT: Week 2 - Project Version 1
DATE: November 5, 2015
NAME: Christina D. Thorpe-Rogers

///////////////////////////////////////////////// -->
	
<div class="container">

	<!-- Modal -->
		<div class="modal fade" id="journeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <!-- <h4 class="modal-title" id="myModalLabel">Journey Post Entry...</h4> -->
			
				<!-- Journey Post Entry -->
				<form action="journeys/create" class="form-inline" method="POST" enctype="multipart/form-data">
				<h4><input type="text" name="title" value="" placeholder="Enter Journey Post Title…" style="background:none;border:none;width:300px;color:#ee6730;" required /></h4>
			      </div>
			      <div class="modal-body">
					<input type="text" name="fname" class="form-control journeyPostTitle" value="" placeholder="Traveler's First Name…" required /><br />
					<input type="date" name="date" class="form-control" value="" autocomplete="on" required /><br />
					<textarea rows="10" name="body" class="form-control" value="" placeholder="Body..." required></textarea><br />
					<input type="htags" name="htags" class="form-control" value="#HappyTravels #TravelingChristian" placeholder="#Hashtagserwttwttw" required /><br />
					<input type="file" name="img" class="input-group" value="" accept="image/*" required /><br />
					<!-- <input type="submit" value="SUBMIT"/> -->
			      </div>
			      <div class="modal-footer">
			      <input style="font-size:1.5em;border-radius:6px;" type="submit" class="btn btn-warning" value="Create">
				</form>
		      </div>
		    </div>
		  </div>
		</div>
	
	<!-- Crest & Welcone Text -->
	<div class="center">
		<img src="/ASL/Passport/assets/img/tcp-crest-yllwshirt.svg" class="crest" />
		<p style="width:875px" class="lead center">Welcome Traveler! You have arrived at Traveling Children Project's Journey Blog! Here you can share your journey with other Travelers and see where their travels have led them.</p>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg journeyModalButton" data-toggle="modal" data-target="#journeyModal">
			<!-- <img src="/ASL/Passport/assets/img/tcp-compass-rose-org.svg" style="width:1.5em;" />&nbsp -->
		   	<span class="glyphicon glyphicon-plus" style="color:#ef6831;font-size:1.0625em;" aria-hidden="true"></span>&nbsp Where has TC taken you? Click to create a post of your journey below.
		</button>
	</div>
	
	<!-- JOURNEY BLOG -->
	<div class="jp_section">
		<div class="journey_post">
			<div class="jp_wrapper">
			<?php foreach ($ten_posts as $post): ?>
				<div class="journeyPost" data-contact-id="<?= $post->id ?>">
				  <a class="x" href="journeys/delete/<?= $post->id ?>">&times</a>
				  <p class="jp_title"><b></b><?= $post->title ?></p>
				  
				  <?php if($post->img != NULL): ?>
					  <div class="jp_img"><img src="/ASL/Passport/assets/uploads/<?= $post->img ?>"></div>
				  <?php endif ?>
				  <p class="jp_fname_date"><em><a href="#"><b>Travleing <?= $post->fname ?>.</b></a> / <?= $post->date ?></em></p>
				  <p class="jp_body"><?= $post->body ?></a></p>
				  <p class="htags"><?= $post->htags ?></p>
				  <hr class="jp_divider"></hr>
				  <a href="journeys/edit/#" class="btn btn-primary journeyButton" role="button">EDIT</a> 
				      <a href="journeys/delete/<?= $post->id ?>" class="btn btn-warning" role="button">DELETE</a>
				</div><!-- /.journeyPost div -->
			<? endforeach ?>
			</div><!-- /.jp_wrapper -->
		</div><!-- /.journey_post -->
	</div><!-- /.jp_section -->
	
</div><!-- /.container -->

	<script>
		$(document).ready(function () {
			var journey = $(".journeyPost"),
			buttons = $(".journeyButton");
		
			buttons.click(function () {
				var button = this;
				var contact = contacts[$(buttons).journeys(button)];
				var contactId = $(contact).data('contact-id');
			
				$.get('journeys', 'id=' + contactId, function (travelerPost) {
					var idField = $('#id-element')[0],
					fnameField 	= $('input[name="fname"]')[1],
					titleField 	= $('input[name="title"]')[1],
					dateField 	= $('input[name="date"]')[1],
					bodyField 	= $('input[name="body"]')[1],
					htagsField 	= $('input[name="htags"]')[1];
					imgField 	= $('input[name="img"]')[1];
				
					travelerPost  	 = JSON.parse(travelerPost)[0];
					idField.value 	 = travelerPost['id'];
					fnameField.value = travelerPost['fname'];
					titleField.value = travelerPost['title'];
					dateField.value  = travelerPost['date'];
					bodyField.value  = travelerPost['body'];
					htagsField.value = travelerPost['htags'];
					imgField.value	 = travelerPost['img'];
				});
			});
		});
	</script>