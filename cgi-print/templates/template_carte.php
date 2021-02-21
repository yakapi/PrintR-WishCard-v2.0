<div>
<?php

  $name_card = $_GET['card'];
  $query_get_card = $dbh->prepare('SELECT name_fichier FROM WishCard WHERE name_card = :name_card');
  $query_get_card->bindParam(':name_card', $name_card);
  if ($query_get_card->execute()) {
    $if_get_card_empty = $query_get_card->rowCount();
    if ($if_get_card_empty == 0) {
      echo "Oups veuillez nous-excusez mais le lien est mort";
    }else {
      while ($get_card = $query_get_card->fetch()) {
        require 'cgi-print/templates/modules/CarteVoeux/Cartes/'. $get_card['name_fichier'];
      }
    }
  }
?>
</div>
