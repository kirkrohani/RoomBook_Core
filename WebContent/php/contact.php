<?php
$receiver_mail = 'test@test.com';
$mail_title    = ( ! empty( $_POST[ 'phone' ] )) ? $_POST[ 'name' ] . ' from ' . $_POST[ 'phone' ] : ' from [WebSite]';

/* SECTION II - CODE */

if ( ! empty( $_POST[ 'name' ] ) && ! empty( $_POST [ 'email' ] ) && ! empty( $_POST [ 'message' ] ) ) {
	$email   = $_POST[ 'name' ] . '<' . $_POST[ 'email' ] . '>';
	$message = wordwrap( $_POST[ 'message' ], 70, "\r\n" );
	if(!empty($_POST[ 'phone' ]))
		$message .= "\r\n\r\n".'Phone: '.$_POST['phone'];
	$subject = $mail_title;
	$header .= 'From: '. $email . "\r\n";
	$header .= 'Reply-To: ' . $email;
	if ( mail( $receiver_mail, $subject, $message, $header ) )
		$result = 'Message successfully sent.';
	else
		$result = 'Message could not be sent.';
} else {
	$result  = 'Please fill all the fields in the form.';
}
echo $result;