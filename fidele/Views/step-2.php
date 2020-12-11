<?php session_start();
if (!isset($_SESSION['contact'])) {
  header('Location: index.html');
  exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ace | Inscription</title>
  <link rel="stylesheet" href="../Static/css/formulaire.css" />
</head>
<body>
  <div class="titles">
    <h1>Inscription Ace</h1>
  </div>
  <div class="form-2">
    <form method="POST">
      <div class="erreur"></div>
      <input type="text" name="nom" placeholder="Nom et Prénom" /><br>
      <div class="erreur"></div>
      <input type="email" name="email" placeholder="Entrée vôtre email" /><br>
      <div class="erreur"></div>
      <label for="date">Date de Naissance</label><br />
      <input type="date" name="date" id="date" /><br>
      <div class="erreur"></div>
      <select name="classe" id="classe">
        <option value="">--Selectionné vôtre classe--</option>
      </select><br>
      <div class="erreur"></div>
      <input type="radio" name="frites" value="homme" id="homme" checked="checked" />
      <label for="homme">Homme</label>
      <input type="radio" name="frites" value="femme" id="femme" />
      <label for="femme">Femme</label>
      <div class="erreur"></div>
      <select name="classe" id="classe">
        <option value="">--Selectionné vôtre Commité--</option>
      </select><br>
      <button type="submit" name="submit" class="btn-hover color-11"><a href="./congrat.html">Validé</a></button>
    </form>
  </div>
</body>

</html>