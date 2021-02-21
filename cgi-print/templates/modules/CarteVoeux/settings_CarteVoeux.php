<?php
$nom_du_service = $_POST["module_name"];
 require 'DBI/db.php';
 require 'DBI/dbi.php';
 $pdo = $dbh;
 $table = "WishCard";
 function tableExists($pdo, $table) {
   try {
     $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
   } catch (Exception $e) {
     return FALSE;
   }
   return $result !== FALSE;
 }

 $test = tableExists($pdo, $table);
 if ($test == false) {
   echo "pas de db";
   $create = $pdo->prepare("CREATE TABLE WishCard (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name_card VARCHAR(30) NOT NULL,
 name_fichier VARCHAR(255) NOT NULL,
 image_card VARCHAR(255) NOT NULL,
 reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 )");
 $create->execute();
 }
if ($_POST['state-crea-wish'] == true) {
  if (isset($_POST['cr-wish-name'])) {
    if (!empty($_POST['cr-wish-name'])) {
      $query_exist_wishcard = $pdo->prepare('SELECT name_card FROM WishCard');
      if ($query_exist_wishcard->execute()) {
        $test_exist_wishcard = true;
        while ($if_exist_wishcard = $query_exist_wishcard->fetch()) {
          if ($if_exist_wishcard['name_card'] == $_POST['cr-wish-name']) {
          $test_exist_wishcard = false;
          }
        }
        if ($test_exist_wishcard == true) {
          if (isset($_FILES['wishFile'])) {
            $extensions = array('.php', '.geek');
            $extension = strrchr($_FILES['wishFile']['name'], '.');
            if (!in_array($extension, $extensions)) {
              echo 'vous dever uploader un fichier php';
            }else {
              $dir_upload = 'templates/modules/CarteVoeux/Cartes/';
              $fichier = basename($_FILES['wishFile']['name']);
              if (move_uploaded_file($_FILES['wishFile']['tmp_name'], $dir_upload . $fichier)) {
                if (isset($_FILES['wishIMG'])) {
                  $extensions2 = array('.png', '.jpg', '.jpeg' , '.gif');
                  $extension2 = strrchr($_FILES['wishIMG']['name'], '.');
                  if (!in_array($extension2, $extensions2)) {
                    echo 'Vous devez uploader un fichier de type png gif ou jpeg';
                  }else {
                    $dir_upload2 = 'templates/modules/CarteVoeux/Cartes/';
                    $fichier2 = basename($_FILES['wishIMG']['name']);
                    if (move_uploaded_file($_FILES['wishIMG']['tmp_name'], $dir_upload2 . $fichier2)) {
                      $query_upload_card = $pdo->prepare('INSERT INTO WishCard (name_card, name_fichier, image_card) VALUES (?,?,?)');
                      $name_fichier = $_FILES['wishFile']['name'];
                      $image_card = $_FILES['wishIMG']['name'];
                      if ($query_upload_card->execute([$_POST['cr-wish-name'], $name_fichier, $image_card])) {
                        echo "Carte Ajouter";
                      }else {
                        echo "Failed Upload";
                      }
                    }
                  }
                }

              }
            }
          }
        }else {
          echo 'nom déja pris';
        }
      }
    }
  }
}
 ?>
<div class="CarteVoeux-screen">
  <h1>Les Cartes de voeux</h1>
  <p>Outil de création et de gestion des cartes de voeux pour administrateur.</p>
  <div class="create-wishes">
    <h2>Ajouter Carte</h2>
    <form class="create-wishes-form" action="printboard.php" method="post" enctype="multipart/form-data">
      <div class="cr-wish-line">
        <label for="cr-wish-name">Nom de la carte :</label>
        <input id="cr-wish-name" class="specput" type="text" name="cr-wish-name" value="">
      </div>
      <div class="cr-wish-line">
        <label for="cr-wish-file">Ajouter fichier carte :</label>
        <input id="cr-wish-file" type="file" name="wishFile">
      </div>
      <div class="cr-wish-line">
        <label for="cr-wish-img">Image descriptive :</label>
        <input id="cr-wish-img" type="file" name="wishIMG">
      </div>
      <input type="submit" class="subcea" name="cr-wish-sub" value="Créer">
      <input type="hidden" name="module_name" value="<?php echo $nom_du_service ?>">
      <input type="hidden" name="state-crea-wish" value="true">
    </form>
  </div>
</div>
