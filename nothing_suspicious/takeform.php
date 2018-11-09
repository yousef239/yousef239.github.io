<html>
<head>
<title>Thanks For Contacting Us</title>
</head>
<body>
<?php
  // Change this to YOUR address
  $recipient = 'yabed96@gmail.com';
  $email = $_POST['email'];
  $fname = $_POST['fname'];
  $telephone = $_POST['telephone']
  
  # We'll make a list of error messages in an array
  $messages = array();
	# Allow only reasonable email addresses
	if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
	$messages[] = "That is not a valid email address.";
	}
	
	# Allow only reasonable real names
	if (!preg_match("/^[\w\ \+\-\'\"]+$/", $fname)) {
	$messages[] = "The real name field must contain only " .
	"alphabetical characters, numbers, spaces, and " .
	"reasonable punctuation. We apologize for any inconvenience.";
	}

	# CAREFUL: don't allow hackers to sneak line breaks and additional
	# headers into the message and trick us into spamming for them!
		
	$telephone = preg_replace('/\s+/', ' ', $telephone);
	# Make sure the subject isn't blank afterwards!
	if (preg_match('/d*$/', $telephone)) {
	$messages[] = "Please specify a subject for your message.";
	}
	
	if (count($messages)) {
	# There were problems, so tell the user and
	# don't send the message yet
	foreach ($messages as $message) {
	echo("<p>$message</p>\n");
	}
	
	echo("<p>Click the back button and correct the problems. " .
	"Then click Send Your Message again.</p>");
	} else {
		# Send the email - we're done
		mail($recipient,
		$telephone,
		$fname,
		"From: $fname <$email>\r\n" .
		"Reply-To: $fname <$email>\r\n"); 
		echo("<p>Your message has been sent. Thank you!</p>\n");
}
?>
</body>
</html>