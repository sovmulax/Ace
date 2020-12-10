<?php 
include '../../php/connexion.php';
$errors = array('nom' => '');

if(isset($_POST['submit'])){
  
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
    <div class="form-1">
      <form method="POST">
        <div class="erreur">
          <?php echo $errors['nom']; ?>
        </div>
        <input type="text" name="nom" placeholder="Nom et Prénom" /><br />
        <button type="submit" name="submit" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
  </body>
</html>