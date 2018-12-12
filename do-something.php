<?php

//require_once($_SERVER['DOCUMENT_ROOT'] .'/includes/database.php');
// the previous line is for the database connection
// because there may not be a database set up for this demo
// we'll just leave this out so the demo doesn't blow up

require_once($_SERVER['DOCUMENT_ROOT'] .'/includes/utils.php');

// we are expecting some POST vars, so lets check to see if those exists first
try {
	if(!isset($_POST) || empty($_POST)){
		throw new Exception('We did not receive anything. Try again.');
	}

	// make sure we have everything we need
	$required = array('name', 'email', 'message');
	$missing = hasRequired($required, $_POST);
	if(!empty($missing)){
		throw new Exception('Not all the required fields are present - missing: '. implode(', ', $missing));
	}  
	
	// we should have what we need
	extract($_POST);
	
	// clean it up
	$name = cleanStr($name);
	$email = cleanStr($email);
	$message = cleanStr($message);
	$telephone = (isset($telephone) ? cleanStr($telephone) : '');
	
	if(empty($name)){
		throw new Exception ('No valid name received. Please try again.');
	}
	if(empty($email)){
		throw new Exception ('No valid email received. Please try again.');
	}
	if(empty($message)){
		throw new Exception ('No valid message received. Please try again.');
	}
	
	// lets save this info to a database
  // structure of DB in /includes/db.sql
  // we are also assuming this is a postgres backend
  // again, because a DB may not be set up for the demo,
  // we'll leave this commented out
  /*
  try {
    // first we see if this person has already filled out the form
    $person_id = query('INSERT INTO people (name, email, telephone) VALUES (?,?,?) ON CONFLICT (email) DO UPDATE SET name = ?, telephone = ? RETURNING id', array($name, $email, $telephone, $name, $telephone));
    
    query('INSERT INTO messages (people_id, message) VALUES (?,?)', array($person_id, $message));
  } catch (Exception $e){
    // in reality, we'd probably stop things here, but maybe we just catch the error and let the email continue?
  }
  */
    
	
	// let get an email working
	$email_subject = "Someone filled out the form"; // The Subject of the email 
	
	$email_to = 'reid@reidgivens.com'; // Who the email is too
	
	$boundary = "nextPart"; // this can be anything really, just need a unique string for multipart email
	
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "From: ".$email."\r\n";
	$headers .= "Reply-To: ".$email."\r\n"; 
	$headers .= "Content-Type: multipart/alternative; boundary = $boundary\r\n";
ob_start();
?>
--<? echo $boundary ."\n"; ?>
Content-type: text/plain; charset=iso-8859-1

Message From: <?= $name ?>,
Email: <?= $email ?>,
Phone: <?= $phone ?>
		
<?= $message ?>

<?= date("D F j, Y, g:i a") ?>
		
--<? echo $boundary ."\n"; ?>
Content-type: text/html; charset=iso-8859-1

<html><head><title>Form submission</title></head><body style="background-color:#efefef;">
<div style="width:600px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; background: #fff; border: 1px solid #ccc;">
  <table width="600" border="0" cellpadding="0" cellspacing="0">
  	<tr style="background-color:#fff;height:70px;"><td align="left" valign="top">
  		<div style="padding:10px; border-bottom: 2px solid #1484cf;">
				<h2>Someone filled out a form</h2>
			</div>
		</td></tr>
  	<tr style="background-color:#ffffff;"><td width="100%" align="left" >
  	<div style="padding:10px;">
			<p><b>Message From</b>: <?= $name ?>,<br />
			<b>Email</b>: <?= $email ?></p>
			<b>Phone</b>: <?= $phone ?></p>
					
			<p><?= nl2br($message) ?></p>
			
			<p><?= date("D F j, Y, g:i a") ?></p>
		
		</div>
		</td></tr>
</table></div></body></html>
--<? echo $boundary; ?>--

<?
	//copy current buffer contents into $message variable and delete current output buffer
	$msg = ob_get_clean();	
	
	// send the mail
	$ok = @mail($email_to, $email_subject, $msg, $headers);  
	
	// see if it sent
	if(!$ok) {     
		throw new Exception("Sorry but the message could not be sent. Please try again.");   
	}
	
	// looks like all is well, so lets let 'em know
	echo '<p class="alert-success"><span class="badge badge-success">&#10004;</span> Your message has been sent. Thanks! At least, if the mail command built into php is working it did. Typically I use SSMTP for this.</p>';

// something went wrong. We should tell the user
} catch (Exception $e){
	echo '<p class="alert-warning"><span class="badge badge-warning">!</span>'. $e->getMessage() .'</p>';
}
?>