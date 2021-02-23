<?php

$EmailFrom = "contact@trusthendersons.co.uk";
$EmailTo = "hello@2owls.co.uk";
$Subject = "online form";
$Name = Trim(stripslashes($_POST['Name']));
$Phone = Trim(stripslashes($_POST['Phone']));
$Email = Trim(stripslashes($_POST['Email']));
$Message = Trim(stripslashes($_POST['Message']));
$privacycheck = Trim(stripslashes($_POST['privacycheck']));
if (isset($_POST['privacycheck'])) {
  $privacycheck = "yes";
} else {
  $privacycheck = "no";
}

// validation
$validationOK=true;
if (!$validationOK) {
  echo "please check your details";
  header("Location: http://yourdommain.co.uk/contact.php");
  exit;
}


// prepare email body text

$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";
$Body .= "Privacy: ";
$Body .= $privacycheck;
$Body .= "\n";



// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"1;URL=contact-received.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"1;URL=index.html\">";
}
?>