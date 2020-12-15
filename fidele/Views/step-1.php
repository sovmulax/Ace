<?php session_start();
include '../../php/connexion.php';
$errors = array('contact' => '');
$bool = null;
if (isset($_POST['submit'])) {
  if (empty($_POST['contact'])) {
    $errors['contact'] = "Donner vôtre contact";
  } elseif ((strlen($_POST['contact']) > 8) || $_POST['contact'] < 0) {
    $errors['contact'] = "le numéro entré n'est pas valide";
  } else {
    $req = $connexion->prepare('SELECT * FROM liste WHERE contact = ?');
    $req->execute([$_POST['contact']]);
    $user = $req->fetch();
    if ($user == true) {
      $id = $user['id'];
      $reqs = $connexion->prepare('SELECT * FROM 2020_12_11 WHERE id_membre = ?');
      $reqs->execute([$id]);
      $users = $reqs->fetch();
      if ($users) {
        $errors['contact'] = "Vous avez déjà été marquer présent";
      } else {
        //marquer présent
        $sql = "INSERT INTO 2020_12_11(id_membre, presents, absents) VALUES('$id', 'oui', 'non')";
        if (mysqli_query($conn, $sql)) {
          // success
          $_SESSION['valid'] = '';
          $_SESSION['valid'] = 'deja';
          header('Location: congrat.php');
        } else {
          echo 'query error: ' . mysqli_error($conn);
        }
      }
    } else {
      $_SESSION['contact'] = htmlspecialchars($_POST['contact']);
      header('Location: step-2.php');
    }
  }
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
        <?php echo $errors['contact']; ?>
      </div>
      <input type="tel" name="contact" placeholder="Contact" /><br />
      <button type="submit" name="submit" class="btn-hover color-11">
        Validé
      </button>
    </form>
  </div>
</body>

</html>