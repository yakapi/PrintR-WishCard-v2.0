<?php

$contact_val = array("prenom" => "",
                      "nom" => "",
                      "mail" => "",
                      "prenomD" => "",
                      "nomD" => "",
                      "mailD" => "",
                      "choix-carte" => "",
                      "isSuccess" => false);
$result = array("success" => false);

if ($_SERVER["REQUEST_METHOD"] ==  "POST") {


  $contact_val["prenom"] = $_POST["prenom-wish"];
  $contact_val["nom"] = $_POST["nom-wish"];
  $contact_val["mail"] = $_POST["wish-mail"];
  $contact_val["prenomD"] = $_POST["prenom-wishD"];
  $contact_val["nomD"] = $_POST["nom-wishD"];
  $contact_val["mailD"] = $_POST["wish-mailD"];
  $contact_val["choix-carte"] = $_POST["choix-carte"];

  if (!empty($contact_val["prenom"]) && !empty($contact_val["nom"]) && !empty($contact_val["mail"]) && !empty($contact_val["prenomD"]) && !empty($contact_val["nomD"]) && !empty($contact_val["mailD"]) && !empty($contact_val["choix-carte"]) ) {

    $contact_val["isSuccess"] = true;
  }
  if ($contact_val["isSuccess"] == true) {
    $alaligne = "\n";
    $to = "victor.barlier@outlook.fr";
    $sujet = "vote PortoFolio !";
    $message = 'hello world';
    $send = mail($to, $sujet, $message);
    if ($send == true) {
      $result["success"] = true;
    }
  }
  header('Content-type: application/json');
  echo json_encode($result);



}
 ?>
