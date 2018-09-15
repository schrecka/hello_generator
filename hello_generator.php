<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- CSS file -->
		<link rel="stylesheet" type="text/css" href="style.css">

		<!-- Bootstrap -->
		<meta charset="utf-8">
 	 	<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<?php
			//Shows all PHP ERRORS: 
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			
			//Select greeting language
			if(isset($_POST['language'])) {
				if($_POST['language'] == "english") {
					$greeting = "Hello ";
				}				
				else if($_POST['language'] == "french") {
					$greeting = "Bonjour ";
				}
				else if($_POST['language'] == "portuguese") {
					$greeting = "Olá ";
				} 
			}
			else if(isset($_GET['language'])) {
				if($_GET['language'] == "english") {
					$greeting = "Hello ";
				}				
				else if($_GET['language'] == "french") {
					$greeting = "Bonjour ";
				}
				else if($_GET['language'] == "portuguese") {
					$greeting = "Olá ";
				} 
			}
			else {
				$greeting = "Please select language ";
			}

			/*
			1. Create an HTML form (1 field name "name_of_person" + submit); 
			2. Submit the form to the same URL; 
			3. Submission type is POST 
			4. Logic above is changed so that it handles both GET and POST 
			(form takes precedence over url)
			*/
			if(isset($_POST['name_of_person']) && ($_POST['name_of_person'] != "")) {
				/*
				//When my dad types in his name(Paul), message comes up on screen
				if($_POST['name_of_person'] == "Paul") {
					echo '<script language="javascript">';
					echo 'alert("Your credit card has been stolen!")';
					echo '</script>';
				}
				*/
				$message = $greeting . $_POST['name_of_person'] . "!";
			} 
			else if(isset($_GET['name_of_person'])) {
				$message = $greeting . $_GET['name_of_person'] . "!";
			}	 
			else {
				$message = "Please enter name above"; 
			}
		?>
	</head>
	<body>
		<!--Title section-->
		<div class="container">
  			<div class="jumbotron">
  				<h1>Welcome to the Hello Generator</h1>
  				<p>The worldwide leader in generating hellos</p>
  			</div>
  		</div>
		
		<br>

		<!--Form section-->
		<div id="html_form">
			<form class="form-inline" method="post">
				<div class="form-group">
					<!--Name form-->
					<label for ="Enter Name:">Name:</label>
	  				<input type="text" class="form-control" required placeholder="Enter name" name="name_of_person" oninvalid="this.setCustomValidity('Please enter name')"
    				oninput="this.setCustomValidity('')">
	  				
	  				<!--Language dropdown menu-->
	  				<label for="language">Language:</label>
	  				<select name="language" class="form-control" required oninvalid="this.setCustomValidity('Please select language')" oninput="this.setCustomValidity('')">
	  					<option value="">-Select-</option>
						<option value="english">English</option>
						<option value="french">French</option>
						<option value="portuguese">Portuguese</option>
					</select>

					<!--Submit Button-->
					<button type="submit" class="btn btn-default">Submit</button>
	
	 			</div>
			</form>
		</div>

		<!--Message box-->
		<div class="container">
			<div id="str"></div>

			<!--JS for message box (found on google)-->
			<script>
				var string = "<?php echo $message; ?>";
				var str = string.split("");
				var el = document.getElementById('str');
				(function animate() {
					str.length > 0 ? el.innerHTML += str.shift() : clearTimeout(running); 
					var running = setTimeout(animate, 90);
				})();
			</script>
		</div>

	</body>
</html>