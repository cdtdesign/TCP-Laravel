<div class="container">
	
	<!-- Destination Modal -->
	<div class="modal fade" id="destModal" tabindex="-1" role="dialog" aria-labelledby="destModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title jd_title" id="destModalLabel">Journey Destinations</h3>
	      </div>
	      <div class="modal-body journeyDestSearch" id="destination">
	        <!-- <p><b>Destination Name:</b><span id="dname"></span></p>
			<p><b>Type:</b><span id="dtype"></span></p>
			<p><b>Description:</b><span id="dscrp"></span></p>
			<p><b>Street Address:</b><span id="dstrt"></span></p>
			<p><b>City:</b><span id="dcty"></span></p>
			<p><b>State:</b><span id="dstate"></span><b>Zip:</b><span id="dzip"></span></p>
			<p><b>Adult Cost:</b><span id="acost"></span></p>
			<p><b>Child Cost:</b><span id="ccost"></span></p>
			<p><b>Discount Amount:</b><span id="damt"></span></p> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
	      </div>
	    </div>
	  </div>
	</div><!-- /.modal .fade -->
	
	<!-- Crest & Welcome Text -->
	<div class="center welcome">
		<img src="/assets/img/tcp-crest-yllwshirt.svg" class="crest hvr-grow-rotate" />
		<p class="lead center">Welcome to the Traveling Children Project Passport! Your passport to fun experiences!</p>
	</div>
	
	<!-- SEARCH FORM -->
	
	<form style="" class="form-inline center" id="destSearch">
	  <div class="form-group">
		<select id="type" class="form-control">
			<option name="all_types" value="">Choose destination type… </option>
		  	<option name="active" value="1">Active</option>
		  	<option name="create" value="2">Creative</option>
		  	<option name="fun" value="3">Fun</option>
		  	<option name="learn" value="4">Learning</option>
		  	<option name="outdoor" value="5">Outdoor</option>
		  	<option name="perf" value="6">Performance</option>
		  	<option name="read" value="7">Reading</option>
		  	<option name="taste" value="8">Tasty</option>
		  	<option name="tech" value="9">Technology</option>
		</select>
		<select id="location" class="form-control">
			<option name="all_locations" value="">Choose destination location…</option>
			<option name="daytona" value="5">Daytona</option>
			<option name="kissimmee" value="1">Kissimmee</option>
			<option name="orlando" value="2">Orlando</option>
			<option name="sanford" value="3">Sanford</option>
			<option name="tampa" value="4">Tampa</option>
			<option name="wintergarden" value="5">Winter Garden</option>
		</select>
	    <!-- <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Destination Location (City, ST)"> -->
		<!-- <button type="submit" class="btn btn-warning">Search</button> -->
		<!-- Button trigger modal -->
		<a class="btn btn-warning btn-lg" id="destSearchBtn" data-toggle="modal" data-target="#destModal">
		  Search
		</a>
	  </div>
	</form>
	
	<!-- BUTTONS -->
	
	<div class="center" id="destButtons">
	<div class="btn-group btn-group-lg center" role="group" aria-label="...">
	  <button type="button" class="btn btn-info"><a href="#">Active</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Creative</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Fun</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Learning</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Outdoor</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Performance</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Reading</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Tasty</a></button>
	  <button type="button" class="btn btn-info"><a href="#">Technology</a></button>
	</div>
	</div>
	
</div><!-- /.container -->

<script>
$('#destSearchBtn').click(function(){
var type = $($('#type')[0]).val(),
	local =  $($('#location')[0]).val();
	console.log(type,local);
	$.ajax('/destinations', {
		'method':'post',
		'data':{
			'type':type,
			'location':local
		},
		'success':function(response){
			console.log(response);
			console.log('You should have the info on the destination');
			$.each(response,function(index,destination){
				console.log(destination);
				var dest = '<div class="modal-body journeyDestSearch">';
			        dest += '<p><b>Destination Name: </b>' + destination.dname + '</p>';
					dest += '<p><b>Type: </b>' + destination.type + '</p>';
					dest += '<p><b>Description: </b>' + destination.dscrptn + '</p>';
					dest += '<p><b>Street Address: </b>' + destination.dstreet + '</p>';
					dest += '<p><b>City: </b>' + destination.cities + '</p>';
					dest += '<p><b>State: </b>' + destination.dstate + '<b> Zip: </b>' + destination.dzip + '</p>';
					dest += '<p><b>Adult Cost: </b>' + destination.adult_cost + '</p>';
					dest += '<p><b>Child Cost: </b>' + destination.child_cost + '</p>';
					dest += '<p><b>Discount Amount: </b>' + destination.discount + '</p>';
			      	dest += '</div>';
					$('#destination').after(dest);
			});
		}
	});
});
</script>