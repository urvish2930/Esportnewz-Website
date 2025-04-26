<?php
$to = "yasshpatel1463@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: esnewzzofficial@gmailcom" . "\r\n" .
"CC: yasshpatel1463@gmail.com";

if (mail($to, $subject, $txt, $headers)) {
  echo "Mail has been sent";
} else {
  echo "Sending error";
}
?>
