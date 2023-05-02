<?php
include '../../php/connexion.php';
$i = 0;
$j = 0;
$k = 0;
$o = 0;
$p = 0;
$q = 0;
$resultat = $connexion->query('SELECT * FROM liste WHERE classe = 1 OR classe = 2 OR classe = 3 OR classe = 4 OR classe = 5 AND commit != 8');
$resultat0 = $connexion->query('SELECT * FROM liste WHERE classe = 6 OR classe = 7 OR classe = 8 OR classe = 9 AND commit != 8');
$resultat1 = $connexion->query('SELECT * FROM liste WHERE classe = 10  AND commit != 8');
$resultat2 = $connexion->query('SELECT * FROM liste WHERE classe = 11  AND commit != 8');
$resultat11 = $connexion->query('SELECT * FROM liste WHERE commit = 7 AND classe = 16');
$resultat3 = $connexion->query('SELECT * FROM liste WHERE classe = 12 OR classe = 13 OR classe = 14 OR classe = 15 AND commit != 8');
$comit = $connexion->query('SELECT * FROM liste WHERE commit =  1 ');
$comit0 = $connexion->query('SELECT * FROM liste WHERE commit = 2 ');
$comit1 = $connexion->query('SELECT * FROM liste WHERE commit = 3 ');
$comit2 = $connexion->query('SELECT * FROM liste WHERE commit = 4 ');
$comit3 = $connexion->query('SELECT * FROM liste WHERE commit = 5 ');
$comit4 = $connexion->query('SELECT * FROM liste WHERE commit = 6 ');
$genre = $connexion->query('SELECT * FROM liste WHERE genre = "femme"  AND commit != 8');
$genre0 = $connexion->query('SELECT * FROM liste WHERE genre = "homme"  AND commit != 8');
$genre01 = $connexion->query('SELECT * FROM liste WHERE commit = 8');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Ace | Administrateur</title>
  <link rel="stylesheet" href="../Static/style.css" />
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Statiques Générale</a></li>
      <li><a href="standard.php">les listes Standard</a></li>
      <li><a href="demande.php">Liste trié</a></li>
      <li><a href="nex.php">Séance</a></li>
    </ul>
  </nav>
  <div class="container">
    <h1>Licences</h1>
    <hr />
    <div class="contain">
      <div class="stat">
        <h2>Nombre de Licence 1</h2>
        <p><?php 
          while($res = $resultat->fetch()){
            $i++;
          } echo $i;
        ?></p>
      </div>
      <div class="stat">
        <h2>Nombre de Licence 2</h2>
        <p><?php 
          while($res = $resultat0->fetch()){
            $k++;
          } echo $k;
        ?></p>
      </div>
      <div class="stat">
        <h2>Nombre de Licence 3</h2>
        <p><?php 
          while($res = $resultat3->fetch()){
            $o++;
          } echo $o;
        ?></p>
      </div>
    </div>
    <h1>Master et Anciens</h1>
    <hr />
    <div class="contain">
      <div class="stat">
        <h2>Nombre de Master 1</h2>
        <p><?php 
          while($res = $resultat1->fetch()){
            $p++;
          } echo $p;
        ?></p>
      </div>
      <div class="stat">
        <h2>Nombre de Master 2</h2>
        <p><?php 
          while($res = $resultat2->fetch()){
            $q++;
          } echo $q;
        ?></p>
      </div>
      <div class="stat">
        <h2>Nombre d'anciens</h2>
        <p><?php $p=0;
          while($res = $resultat11->fetch()){
            $p++;
          } echo $p;
        ?></p>
      </div>
    </div>

    <!--comité-->
    <h1>Comité</h1>
    <hr />
    <div class="contain">
      <div class="stat">
        <h2>Chantre</h2>
        <p><?php $i = 0;
          while($res = $comit->fetch()){
            
            $i++;
          } echo $i;
        ?></p>
      </div>
      <div class="stat">
        <h2>Prière</h2>
        <p><?php $k=0;
          while($res = $comit0->fetch()){
            
            $k++;
          } echo $k;
        ?></p>
      </div>
      <div class="stat">
        <h2 style="font-size: 1.5em;">Evangélisation</h2>
        <p><?php $o=0;
          while($res = $comit1->fetch()){
            $o++;
          } echo $o;
        ?></p>
      </div>
      <div class="stat">
        <h2 style="font-size: 1.5em;">Communication</h2>
        <p><?php $o=0;
          while($res = $comit2->fetch()){
            $o++;
          } echo $o;
        ?></p>
      </div>
      <div class="stat">
        <h2>Organisation</h2>
        <p><?php $o=0;
          while($res = $comit3->fetch()){
            $o++;
          } echo $o;
        ?></p>
      </div>
      <div class="stat">
        <h2>Trésorerie</h2>
        <p><?php $o=0;
          while($res = $comit4->fetch()){
            $o++;
          } echo $o;
        ?></p>
      </div>
    </div>

    <!--sexe-->
    <h1>Genre</h1>
    <hr />
    <div class="contain">
      <div class="stat">
        <h2>Femme</h2>
        <p><?php $p=0;
          while($res = $genre->fetch()){
            $p++;
          } echo $p;
        ?></p>
      </div>
      <div class="stat">
        <h2>Homme</h2>
        <p><?php $q=0;
          while($res = $genre0->fetch()){
            $q++;
          } echo $q;
        ?></p>
      </div>
    </div>

    <!--Invité-->
    <h1>Invité</h1>
    <hr />
    <div class="contain">
      <div class="stat">
        <h2>Invité </h2>
        <p><?php $q=0;
          while($res = $genre01->fetch()){
            $q++;
          } echo $q;
        ?></p>
      </div>
    </div>
  </div>
</body>

</html>