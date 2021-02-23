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
   <div id="success-form" class="success-form">
     <div class="suc">
       <div class="success-box">
         <div class="pos-exit-btn">
           <div class="encard-exit-success">
             <img src="cgi-print/templates/modules/ClientForm/remove-button.svg" alt="exit success">
           </div>
         </div>
         <p class="success-form-text">envoie reussi</p>
       </div>
     </div>
   </div>
    <div class="wish-form-box">
      <div id="wish-screen" class="wish-box-screen">
        <form id="card-form" class="card-choose form-size" action="index.php" method="post">
          <div class="card-view">
            <?php GetAllCard($dbh) ?>
          </div>
          <div class="sub-view">
            <input id="sub-image" class="btn-sub" type="submit" name="choisir-image" value="choisir">
          </div>
        </form>
        <form id="wish-form" class="wish-form form-size" action="index.php" method="post">
          <div class="wish-form-zone">
            <div class="wish-line">
              <label for="wish-prenom">Vote Prénom :</label>
              <div class="special-put">
                <input class="inputed" id="wish-prenom" type="text" name="prenom-wish">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
            <div class="wish-line">
              <label for="wish-nom">Votre Nom :</label>
              <div class="special-put">
                <input class="inputed" id="wish-nom" type="text" name="nom-wish">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
            <div class="wish-line">
              <label for="wish-mail">Votre E-mail :</label>
              <div class="special-put">
                <input class="inputed" id="wish-mail" type="text" name="email-wish">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
            <div class="wish-line">
              <label for="wish-prenomD">Prénom du  Destinataire :</label>
              <div class="special-put">
                <input class="inputed" id="wish-prenomD" type="text" name="prenom-wishD">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
            <div class="wish-line">
              <label for="wish-nomD">Nom du Destinataire :</label>
              <div class="special-put">
                <input class="inputed" id="wish-nomD" type="text" name="nom-wishD">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
            <div class="wish-line">
              <label for="wish-mailD">E-mail Destinataire :</label>
              <div class="special-put">
                <input class="inputed" id="wish-mailD" type="text" name="email-wishD" value="">
              </div>
            </div>
            <div class="error-form">
              <p class="error-form-text"></p>
            </div>
          </div>
          <input type="hidden" name="choix-carte">
          <input type="hidden" name="wish-mail">
          <input type="hidden" name="wish-mailD">
          <div class="btn-box">
            <input id="sub-wish" class="btn-sub" type="submit" name="sub-wish" value="Envoyer">
          </div>
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
          let prenom = e.target[0].value
          let nom = e.target[1].value
          let mail = e.target[2].value
          let prenomD = e.target[3].value
          let nomD = e.target[4].value
          let mailD = e.target[5].value
          let error = document.querySelectorAll('.error-form-text')
          let form_success = document.getElementById('success-form')
          let form_state = {
            prenom: false,
            nom: false,
            mail: false,
            prenomD: false,
            nomD: false,
            mailD: false
          }
          const regex = {
            name: '^[a-zA-Z]+$',
            mail: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
            phone: /^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/,
            company: '^(?!.*<[^>]+>).*'
          }
          if (e.target[0].value.match(regex.name)) {
            if (e.target[0].value != '') {
              form_state.prenom = true

            }else {
              error[0].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[0].innerHTML = 'Ceci n\'est pas un prénom correct'
          }
          if (e.target[1].value.match(regex.name)) {
            if (e.target[1].value != '') {
              form_state.nom = true

            }else {
              error[1].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[1].innerHTML = 'Ceci n\'est pas un nom correct'
          }
          if (e.target[2].value.match(regex.mail)) {
            if (e.target[2].value != '') {
              form_state.mail = true

            }else {
              error[2].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[2].innerHTML = 'Ceci n\'est pas un mail correct'
          }
          if (e.target[3].value.match(regex.name)) {
            if (e.target[3].value != '') {
              form_state.prenomD = true

            }else {
              error[3].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[3].innerHTML = 'Ceci n\'est pas un prénom correct'
          }
          if (e.target[4].value.match(regex.name)) {
            if (e.target[4].value != '') {
              form_state.nomD = true

            }else {
              error[4].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[4].innerHTML = 'Ceci n\'est pas un nom correct'
          }
          if (e.target[5].value.match(regex.mail)) {
            if (e.target[5].value != '') {
              form_state.mailD = true

            }else {
              error[5].innerHTML = 'Veuillez remplir se champs'
            }
          }else {
            error[5].innerHTML = 'Ceci n\'est pas un mail correct'
          }
          if (form_state.prenom == true && form_state.nom == true && form_state.mail == true && form_state.prenomD == true && form_state.nomD == true && form_state.mailD == true) {
            let array_mail = []
            let mailForm = e.target[2].value
            let mailFormD = e.target[5].value
            array_mail.push(mailForm)
            array_mail.push(mailFormD)
            console.log(array_mail);
            e.target[6].value = choosed_card
            e.target[7].value = array_mail[0]
            e.target[8].value = array_mail[1]

            let form_client = document.getElementById('wish-form')
            const formData = new FormData(form_client)
            fetch('cgi-print/templates/modules/ClientForm/send-wish.php',{
              method: 'post',
              body: formData
            }).then(function(result){
              if (result.ok) {
                return result.json()
              }
            }).then(json => {
              if (json.success == true) {
                for (var i = 0; i < e.target.length - 4; i++) {
                  e.target[i].value = ''
                  error[i].innerHTML = ''
                }
                form_success.classList.add('success');
                form_success.addEventListener('click', (e) => {
                  form_success.classList.remove('success')
                })
              }else {
                  alert("Erreur d'envoie")
              }
            }).catch(function (error){
              console.log('error');
            })
          }
        })
      })
      let carte_select = document.querySelectorAll('.label-carte');
      for (var i = 0; i < carte_select.length; i++) {
        carte_select[i].addEventListener('click', (e) =>{
          for (var i = 0; i < carte_select.length; i++) {
            if (carte_select[i].classList.contains('label-selected')) {
              carte_select[i].classList.remove('label-selected')
            }
          }
          e.path[2].classList.add('label-selected')
        })
      }
    </script>
   <?php
}?>
