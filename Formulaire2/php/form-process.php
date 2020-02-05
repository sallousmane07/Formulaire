<?php
function RenseignerChamp($champ){
    $message="";
    foreach ($champ as $c) {
        if(empty($c))
            $message.="Le champ".$c."doit être renseigné";
    }
    return $message;

}
$champ  = [
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "message" => $_POST['message']
];
$errorMSG = RenseignerChamp($champ);

$EmailTo = "elho.sall97@gmail.com";
$Subject = "Nouveau Message";
$EmailSource="ouz199607@gmail.com";     

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $champ['name']."\n";
$Body .= "Email: ";
$Body .= $champ['email']."\n";
$Body .= "Message: ";
$Body .= $champ['message']."\n";
$Body.="Provenance du message :";
$Body .= $champ['email']."\n";


// send email
$success = mail($champ['email'], $Subject, $Body, "From:".$EmailSource);
//$success = mail($EmailTo, $Subject, $Body, "From:".$EmailSource);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}
else{
    if($errorMSG == ""){
        echo "Quelque chose n'a pas marché";
    } else {
        echo $errorMSG;
                                                                                                
    }
}





// NAME
/*if (empty($_POST["name"])) {
    $errorMSG = "Le champ".$$_POST["name"]."doit être renseigné";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
*/
?>