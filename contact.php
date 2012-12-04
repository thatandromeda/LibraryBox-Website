<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}
	
	//Check to make sure that the phone field is not empty
	//if(trim($_POST['phone']) == '') {
		//$hasError = true;
	//} else {
		//$phone = trim($_POST['phone']);
	//}
	
	//Check to make sure that the name field is not empty
	//if(trim($_POST['weburl']) == '') {
		//$hasError = true;
	//} else {
		//$weburl = trim($_POST['weburl']);
	//}

	//Check to make sure that the subject field is not empty
	if(trim($_POST['subject']) == '') {
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'griffey@gmail.com'; // Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nSubject: 'LibraryBox' $subject \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>LibraryBox Contact Form</title>
	<br />
<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!--[if lt IE 8]>
	  <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <![endif]-->
    <link href="css/base.css" rel="stylesheet">
	<link href="css/orange.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>
<script src="./assets/js/scripts.js" type="text/javascript"></script>

</head>

<body>
<?php include_once("./analyticstracking.php") ?>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-primary btn-dropnav" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>		
          <a class="brand" href="index.html">The Librarybox Project</a>
		  <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li><a href="./downloads.html">Downloads</a></li>
            <li><a href="./group.html">Discussion</a></li>
            <li><a href="http://jasongriffey.net/boxblog/">BoxBlog</a></li>
            <li><a href="./media.html">Media</a></li>
            <li><a href="./map.html">Map</a></li>
            <li><a href="./thanks.html">Thanks</a></li>
              <li><a href="./contact.php">Contact</a></li>
            
            </ul>
		  </div>
        </div>
      </div>
    </div>
	
	<div id="header">
	  <div class="container">  
	    <div class="row">
		  <div class="span12">
		    <h1><i class="icon-envelope"></i> Contact LibraryBox</h1>
		  </div>
		</div>
	  </div>
	</div>
	
	<div id="content">
	  <div class="container">			
	    <div class="row">
		  <div class="span8S">
	 
				<p>If you have questions for me about the LibraryBox project, feel free to use the form below.</p>
		
				<h3>LibraryBox Discussion Group</h3>
				<p>If you want to join the LibraryBox Discussion Group, you can do so by visiting the <a href="https://groups.google.com/forum/?fromgroups#!forum/librarybox">LibraryBox Google Group</a> and subscribing. Very low traffic currently, but hopefully it will pick up as people become more interested in the project.</p>
				
	</div>
	</div>
	


			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
				<fieldset>
					<legend>Talk to me!</legend>
					
					<?php if(isset($hasError)) { //If errors are found ?>
						<p class="alert-message error">Please check if you have filled all the fields with valid information and try again. Thank you.</p>
					<?php } ?>

					<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
						<div class="alert-message success">
							<p><strong>Message Successfully Sent!</strong></p>
							<p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
						</div>
					<?php } ?>
					
			
					<div class="clearfix">
						<label for="name">
							Your Name<span class="help-required">*</span>
						</label>
						<div class="input">
							<input type="text" name="contactname" id="contactname" value="" class="span6 required" role="input" aria-required="true" />
						</div>
					</div>
					
					<!--<div class="clearfix">
						<label for="phone">
							Your Phone Number<span class="help-required">*</span>
						</label>
						<div class="input">
							<input type="text" name="phone" id="phone" value="" class="span6 required" role="input" aria-required="true" />
						</div>
					</div>-->
					

					<div class="clearfix">
						<label for="email">
							Your Email<span class="help-required">*</span>
						</label>
						<div class="input">
							<input type="text" name="email" id="email" value="" class="span6 required email" role="input" aria-required="true" />
						</div>
					</div>
					
					<!--<div class="clearfix">
						<label for="weburl">
							Your Website<span class="help-required">*</span>
						</label>
						<div class="input">
							<input type="text" name="weburl" id="weburl" value="" class="span6 required url" role="input" aria-required="false" />
						</div>
					</div>-->
					

					<div class="clearfix">
						<label for="subject">
							Subject<span class="help-required">*</span>
						</label>
						<div class="input">
							<select name="subject" id="subject" class="span6 required" role="select" aria-required="true">
								<option></option>
								<option>LibraryBox Question</option>
								<option>I Want To Help!</option>
								<option>My LibraryBox Story!</option>
								<option>LibraryBox Suggestion</option>
								<option>Other LibraryBox stuff</option>
							</select>
						</div>
					</div>

					<div class="clearfix">
						<label for="message">Message<span class="help-required">*</span></label>
						<div class="input">
							<textarea rows="8" name="message" id="message" class="span10 required" role="textbox" aria-required="true"></textarea>
						</div>
					</div>
					<div class="actions">
						<input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn primary" title="Click here to submit your message!" />
						<input type="reset" value="Clear Form" class="btn" title="Remove all the data from the form." />
					</div>
				</fieldset>
			</form>
		</div>

</div>

</body>
</html>