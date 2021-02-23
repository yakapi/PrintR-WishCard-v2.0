<?php
require 'cgi-print/templates/modules/ClientForm/functions_ClientForm.php';
 ?>
<div class="home-screen">
  <div class="wish-bar">
    <div class="enc-logo">
      <img src="cgi-print/templates/asset/img/tc-logo.svg" alt="logo troll card">
    </div>
    <div class="title-site-bar">
      <h1>TrollCard</h1>
      <p>Envoie de carte troll personnalisé et animé par email</p>
    </div>
    <div class="social-media">
      <p>fb</p>
      <p>insta</p>
    </div>
  </div>
  <div class="left-bar">
    <div class="left-zone">
      <div class="comming-box">
          <h3>User Board</h3>
          <p>Comming Soon</p>
      </div>
    </div>
  </div>
    <div class="viewslate">
      <div class="white-line-box">
        <div class="white-line"></div>
      </div>
      <div class="engine-screen">
        <div class="engine-text-zone">
          <ul>
            <li>1: Choisit ton image</li>
            <li>2: Remplit le formulaire d'envoie</li>
            <li>3: Ton amis recoit la carte dans sa boite mail</li>
            <li>4: Troll réussis</li>
          </ul>
        </div>
        <?php
        // Carrousel('demo');
        ClientForm($dbh);
        ?>
      </div>
      <div class="white-line-box">
        <div class="white-line"></div>
      </div>
      <div class="wish-foot">
        <p>Copyright 2021</p>
      </div>
    </div>
</div>
