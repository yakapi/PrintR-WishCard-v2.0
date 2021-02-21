<?php
function GetAllCard($dbh){
  $query_get_all_card = $dbh->prepare('SELECT * FROM WishCard');
  if ($query_get_all_card->execute()) {
    while ($get_all_card = $query_get_all_card->fetch()) {
      ?>
        <label class="label-carte" for="<?php echo 'carte'.$get_all_card['id'] ?>">
          <div class="encard-image-carte">
            <img src="<?php echo 'cgi-print/templates/modules/CarteVoeux/Cartes/'.$get_all_card['image_card'] ?>" alt="<?php echo 'carte'.$get_all_card['name_card'] ?>">
          </div>
        </label>
        <input class="radioput" id="<?php echo 'carte'.$get_all_card['id'] ?>" type="radio" name="wish_card" value="<?php echo $get_all_card['name_card'] ?>">
      <?php
    }
  }
}
 function ClientForm($dbh){

   ?>
    <div class="wish-form-box">
      <div id="wish-screen" class="wish-box-screen">
        <form id="card-form" class="card-choose form-size" action="index.php" method="post">
          <div class="card-view">
            <?php GetAllCard($dbh) ?>
          </div>
          <div class="sub-view">
            <input id="sub-image" type="submit" name="choisir-image" value="choisir">
          </div>
        </form>
        <form id="wish-form" class="wish-form form-size" action="index.php" method="post">
          <div class="wish-line">
            <label for="wish-prenom">Vote Prénom :</label>
            <input id="wish-prenom" type="text" name="prenom-wish" value="">
          </div>
          <div class="wish-line">
            <label for="wish-nom">Votre Nom :</label>
            <input id="wish-nom" type="text" name="nom-wish" value="">
          </div>
          <div class="wish-line">
            <label for="wish-mail">Votre E-mail :</label>
            <input id="wish-mail" type="text" name="email-wish" value="">
          </div>
          <div class="wish-line">
            <label for="wish-prenomD">Prénom du  Destinataire :</label>
            <input id="wish-prenomD" type="text" name="prenom-wishD" value="">
          </div>
          <div class="wish-line">
            <label for="wish-nomD">Nom du Destinataire :</label>
            <input id="wish-nomD" type="text" name="nom-wishD" value="">
          </div>
          <div class="wish-line">
            <label for="wish-mailD">E-mail Destinataire :</label>
            <input id="wish-mailD" type="text" name="email-wishD" value="">
          </div>
          <input id="sub-wish" type="submit" name="sub-wish" value="Envoyer">
        </form>
      </div>
    </div>
    <script type="text/javascript">
      let choose_image = document.getElementById('card-form')
      choose_image.addEventListener('submit', (e) => {
        e.preventDefault()
        let choosed_card
        let all_carte = e.target
        for (var i = 0; i < all_carte.length; i++) {
          if (all_carte[i].checked == true) {
              choosed_card = all_carte[i].defaultValue
              let wish_screen = document.getElementById('wish-screen')
              wish_screen.classList.add('translate-form')
          }
        }
        let client_form = document.getElementById('wish-form')
        client_form.addEventListener('submit', (e) => {
          e.preventDefault()
          alert(choosed_card)
          console.log(e.target[0].name);
        })
      })
      // let submit_wish = document.getElementById('sub-wish')
      // submit_wish.addEventListener('click', (e) => {
      //   e.preventDefault()
      //   let prenom = document.getElementById('wish-prenom').value
      //   let nom = document.getElementById('wish-nom').value
      //   let mail = document.getElementById('wish-mail').value
      //   let prenomD = document.getElementById('wish-prenomD').value
      //   let nomD = document.getElementById('wish-nomD').value
      //   let mailD = document.getElementById('wish-mailD').value
      //   alert(prenom+nom+mail+prenomD+nomD+mailD)
      //   console.log(e);
      //
      // })
    </script>
   <?php
}?>
