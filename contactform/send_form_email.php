<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "antonio.beiros@gmail.com";
    $email_subject = "Email do site";
 //echo $email_to. "<br /><br />";
    function died($error) {
        // your error code can go here
        echo "<br /><br />";
        echo $error."<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
		!isset($_POST['subject']) ||
        !isset($_POST['message'])) {
     
	 died('Erro no envio');       
    }
 
     
 
    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required
	
     $subject = $_POST['subject']; // required

  $message = $_POST['message']; // required
  
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
 
    $email_message = "Email enviado do site Partilha fundamental.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
    
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($subject)."\n";
    $email_message .= "Comments: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Agradecemos o seu contacto, responderemos brevemente
 
<?php
 
}
?>