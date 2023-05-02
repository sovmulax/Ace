<?php
include '../../php/connexion.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Ace | Administrateur</title>
  <link rel="stylesheet" href="../Static/style.css" />
  <link rel="stylesheet" href="/fidele/Static/css/formulaire.css">
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
    <div class="block">
      <p class="text">Crée une Nouvelle Liste de présence</p>
      <button class="btn-hover color-11">
        <a href="../../php/add_date.php">Crée</a>
      </button>
    </div>
  </div>
</body>

</html>