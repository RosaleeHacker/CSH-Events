<!DOCTYPE html PUBLIC>
<head>
	<title>CSH Events</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://theatrecompanywebsite.com/colorbox/example4/colorbox.css" />
</head>

<body>
	<h1>CSH Events Calendar</h1>
	<div class="banner"></div>
	<div class="banner1"></div>

	<!-- Button trigger modal -->
		<a id="modalbutton" data-toggle="modal" href="#defaultModal" class="btn btn-primary btn-large">Create Event</a>
		<br>
	<!-- Modal -->
	<div class="modal fade" id="defaultModal">
		<div class="modal-dialog"> 
			<div class="modal-content">
				<div class="modal-header">
					<h4 id="myModalLabel">Event Creater!</h4>
				</div>
				<div class="modal-body">
				<div class="row-fluid">
					<div class="span6">
					<form action="createevent.php" method="post" name="createevent">
						<h4>Name:</h4>
						<input type="text" class="span11" placeholder="Enter Name" name="name">
						<h4>Location:</h4>
						<input type="text" class="span11" placeholder="Enter Location" name="location">
						<h4>Description:</h4>
						<input type="text" class="span11" placeholder="Enter details" name="details">
						<h4>Category:</h4>
						<form>
							<input type="radio" name="category" value="concert" checked>Concert
								<br>
							<input type="radio" name="category" value="sports">Sports
								<br>
							<input type="radio" name="category" value="theater">Theatre
								<br>
							<input type="radio" name="category" value="house">House	
								<br>
							<input type="radio" name="category" value="misc">Misc
						</form>
						</div>
						<div class="span6">
						<h4>Date:</h4>
						<input type="text" class="span11" placeholder="dd/mm/yyyy" name="date">
						<h4>Start Time:</h4>
						<input type="text" class="span11" placeholder="Start of Event" name="start">
						<h4>End Time:</h4>
						<input type="text" class="span11" placeholder="End of Event" name="end">
						</div>	
						<div class="container">
							<div class="row">
								<div class='col-sm-6'>
									<div class="form-group">
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
				</div>
				</form>
				</div>
			</div>
		</div>
	</div>

	<!--Filter by concerts, sports, house...  -->
	<div class="table">
		Filter by:
		<form action="filter" method="get">
			<input type="checkbox" name="event" value="concert" checked> Concerts<br>
			<input type="checkbox" name="event" value="sport" checked>Sports<br>
			<input type="checkbox" name="event" value="theatre" checked>Theatre<br>
			<input type="checkbox" name="event" value="house" checked>House<br>
			<input type="checkbox" name="event" value="misc" checked>Misc<br>
			<input type="submit" value="Submit">
		</form>

	</div>

	<div class="shit">
	<?php include("calendar.php"); ?>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="moment.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://theatrecompanywebsite.com/colorbox/colorbox/jquery.colorbox.js"></script>

<script>
$(document).ready(function(){
    //Examples of how to assign the ColorBox event to elements
    $(".group1").colorbox({rel:'group1'});
    $(".group2").colorbox({rel:'group2', transition:"fade"});
    $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
    $(".group4").colorbox({rel:'group4', slideshow:true});
    $(".ajax").colorbox();
    $(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
    $(".inline").colorbox({inline:true, width:"50%"});
    $(".callbacks").colorbox({
    	onOpen:function(){ alert('onOpen: colorbox is about to open'); },
    	onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
    	onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
    	onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
    	onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });

    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function(){
    	$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
    	return false;
    });
});
</script>


<link rel="stylesheet" type="text/css" href="close.css"/>
</body>	
</html>

<!-- name- theatr16_rose password- thunderlizard11 host- localhost --> 