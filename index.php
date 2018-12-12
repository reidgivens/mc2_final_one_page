<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="some, keywords, go, here" >
    <meta name="description" content="this is a simple landing page" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>MC2 Final One Page - Reid Givens</title>
  </head>
  <body>
    <header>
    	<h1><a href="/">Logo<span></span></a></h1>
    </header>
    
    <section class="highlight">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-sm mr-sm-4">
	    			<h2>Heading</h2>
	    			<p>Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui.
	    			In malesuada enim in dolor euismod, id commodo mi consectetur.
	    			Curabitur at vestibulum nisi. Nullam vehicula nisi velit.
	    			Mauris turpis nisl, molestie ut ipsum et, suscipit vehicula odio.
	    			Vestibulum interdum vestibulum felis ac molestie.
	    			Praesent aliquet quam et libero dictum, vitae dignissim leo eleifend.
	    			In in turpis turpis.</p>
	    			<h3><img src="/assets/icon-phone.png" class="spin" /> Call us today at (530) 555-5555</h3>
	    		</div><!--//col-->
	    		<div class="col-sm ml-sm-4">
	    			<form method="post" id="call-to-action" action="do-something.php">
	  					<legend class="text-center">Call To Action</legend>
	  					<div class="form-group">
	    					<input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
	  					</div>
	  					<div class="form-group">
	    					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
	  					</div>
	  					<div class="form-group">
	    					<input type="tel" class="form-control" name="telephone" id="telephone" placeholder="Phone Number" />
	  					</div>
	  					<div class="form-group">
	    					<textarea class="form-control" name="message" id="message" placeholder="Message" required></textarea>
	  					</div>
	  					<div class="form-group">
	    					<input type="submit" name="submit-button" id="submit" class="btn btn-primary btn-block" value="Submit" />
	  					</div>
	    			</form>
	    			<div id="result"></div>
	    		</div><!--//col-->
	    	</div><!--//row-->
	    </div><!--//container-->
	   </section><!--//highlight-->
    
    <section>
    <div class="container">
    	<h2 class="text-center mb-4">Meet Our Team</h2>
    	<div class="row  no-gutters text-center">
    	<?php for($i = 1; $i < 6; $i++){ ?>
    		<div class="col-sm">
    			<img src="/assets/headshot-<?= $i ?>.png" alt="headshot-<?= $i ?>" class="img-fluid team-photo" />
    			<p class="team-name">Name</p>
    			<p class="team-title">Job Title</p>
    		</div><!--//col-->
    	<?php } ?>
    	</div><!--//row-->
    </div><!--//container-->
    </section>
    
    <section>
    <div class="container">
    	<div class="row">
    		<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/71266671" allowfullscreen></iframe>
				</div><!--//embed-responsive-->
    	</div><!--//row-->
    </div><!--//container-->
    </section>
    
    <footer>
    	<p>&copy; 2018 Company, Inc <span class="separator">|</span> (530) 555-5555 </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
				
		$(function() {
						
			// footer newseltter form
			$("#call-to-action").validate({
				rules: {
					email: {
						email: true
					}
				},
				submitHandler: function(form) {
					var url = $(form).attr('action');
					var data = $(form).serialize();
					$.post(url, data, function(reply){
						$('#result').html(reply);
					});
					return false;
				}
			});
	  	
	  });
	</script>
  </body>
</html>