<?php
session_start();
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
  <title>Ace | Congratulation !</title>
  <link rel="stylesheet" href="../Static/css/formulaire.css" />
</head>

<body>
  <?php if($_SESSION['congrat']['genre'] == 'femme' && $_SESSION['valid'] = 'maintenant'): ?>
  <div class="congrat">
    <h1>Bienvenu dans la Famille Ace <br> Soeur <?php echo $_SESSION['congrat']['nom']; ?></h1>
    <button class="btn-hover color-11">
      <a href="./index.html">Retour</a>
    </button>
  </div>
  <?php elseif($_SESSION['congrat']['genre'] == 'homme' && $_SESSION['valid'] = 'maintenant'): ?>
    <div class="congrat">
    <h1>Bienvenu dans la Famille Ace <br> frère <?php echo $_SESSION['congrat']['nom']; ?></h1>
    <button class="btn-hover color-11">
      <a href="./index.html">Retour</a>
    </button>
  </div>
  <?php elseif($_SESSION['valid'] = 'deja'): ?>
    <div class="congrat">
    <h1>Vous avez été Marquer Présent</h1>
    <button class="btn-hover color-11">
      <a href="./index.html">Retour</a>
    </button>
  </div>
  <?php endif ?>
</body>

</html>