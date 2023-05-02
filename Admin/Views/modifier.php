<?php session_start();
include '../../php/connexion.php';
$errors = array('nom' => '', 'email' => '', 'date' => '', 'classe' => '', 'comit' => '', 'lit' => '', 'chambre' => '', 'contact' => '');
$start = '2020-01-01';
$chambre = null;
$lit = null;

//commité
$sql00 = "SELECT * FROM commite";
$result = mysqli_query($conn, $sql00);
$resultats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

//classe
$sql0 = "SELECT * FROM classe";
$results = mysqli_query($conn, $sql0);
$resultatt = mysqli_fetch_all($results, MYSQLI_ASSOC);
mysqli_free_result($results);

//Mois
$sql01 = "SELECT * FROM mois";
$results0 = mysqli_query($conn, $sql01);
$resultatx = mysqli_fetch_all($results0, MYSQLI_ASSOC);
mysqli_free_result($results0);

//fidele
$id = $_GET['id'];
$req = $connexion->prepare('SELECT * FROM liste WHERE id = :id');
$req->execute(['id' => $id]);
$res = $req->fetch();

if (isset($_POST['submit'])) {
  //check nom
  if (empty($_POST['nom'])) {
    $errors['nom'] = "Entrée un nom";
  } else {
    $nom = htmlspecialchars($_POST['nom']);
    if (!preg_match('/^([a-zA-Zéèàê\s]+)(\s*[a-zA-Zéèàê\s]*)*$/', $nom)) {
      $errors['nom'] = "le nom entré n'est pas valide";
    }
  }

  //check contact
  if (empty($_POST['contact'])) {
    $errors['contact'] = "Donner votre contact";
  } elseif ((strlen($_POST['contact']) < 8) || $_POST['contact'] < 0) {
    $errors['contact'] = "le numéro entré n'est pas valide";
  } else {
    $contact = htmlspecialchars($_POST['contact']);
  }

  //check email
  if (empty($_POST['email'])) {
    $errors['email'] = "Entrée un E-MAIL";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "le mail entré n'est pas valide";
  } else {
    $email = htmlspecialchars($_POST['email']);
  }

  //check date
  if (empty($_POST['date'])) {
    $errors['date'] = "Sélectionnez un Mois";
  } else {
    $date = $_POST['date'];
  }

  //check classe
  if (empty($_POST['classe'])) {
    $errors['classe'] = "Sélectionné une classe";
  } else {
    $classe = $_POST['classe'];
  }

  //check commit
  if (empty($_POST['comit'])) {
    $errors['comit'] = "Sélectionné un comité";
  } else {
    $commit = $_POST['comit'];
  }

  //check chambre
  if ($_POST['chambre'] < 0 || $_POST['chambre'] > 80) {
    $errors['chambre'] = "le numéro de la chambre n'est pas valide";
  } else {
    $chambre = htmlspecialchars($_POST['chambre']);
  }

  //check lit
  if ($_POST['lit'] < 0 || $_POST['lit'] > 3) {
    $errors['lit'] = "le numéro de lit entré n'est pas valide";
  } else {
    $lit = htmlspecialchars($_POST['lit']);
  }

  if (array_filter($errors)) {
    //rien
  } else {
    //securité des donners
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $np = $nom . ' ' . $prenom;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $lit = mysqli_real_escape_string($conn, $_POST['lit']);
    $chambre = mysqli_real_escape_string($conn, $_POST['chambre']);
    $genre = $_POST['genre'];
    $sql = "UPDATE liste SET nomPrenom = '$nom', email = '$email', classe = '$classe', commit = '$commit', genre = '$genre', mois = '$date', contact = '$contact', chambre = '$chambre', lit = '$lit' WHERE id = '$id'";
    // save to db and check
    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: standard.php');
    } else {
      echo 'query error: ' . mysqli_error($conn);
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
  <link rel="stylesheet" href="../../fidele/Static/css/formulaire.css" />
</head>

<body>
  <div class="titles">
    <h1>Inscription Ace</h1>
  </div>
  <div class="form-2">
    <form method="POST">
      <div class="erreur">
        <?php echo $errors['nom']; ?>
      </div>
      <input type="text" name="nom" placeholder="Nom" value="<?php echo $res['nomPrenom'] ?>" /><br>
      <div class="erreur">
        <?php echo $errors['contact']; ?>
      </div>
      <input type="tel" name="contact" placeholder="Contact" value="<?php echo $res['contact'] ?>" /><br />
      <div class="erreur">
        <?php echo $errors['email']; ?>
      </div>
      <input type="email" name="email" placeholder="Entrée vôtre email" value="<?php echo $res['email'] ?>" /><br>
      <div class="erreur">
        <?php echo $errors['date']; ?>
      </div>
      <select name="date">
        <option value="">--Mois de Naissance--</option>
        <?php foreach ($resultatx as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
      </select><br>
      <div class="erreur">
        <?php echo $errors['classe']; ?>
      </div>
      <select name="classe">
        <option value="">--Selectionné vôtre classe--</option>
        <?php foreach ($resultatt as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
      </select><br>
      <input type="radio" name="genre" value="homme" id="homme" checked="checked" />
      <label for="homme">Homme</label>
      <input type="radio" name="genre" value="femme" id="femme" />
      <label for="femme">Femme</label>
      <div class="erreur">
        <?php echo $errors['comit']; ?>
      </div>
      <select name="comit">
        <option value="">--Selectionné vôtre Comité--</option>
        <?php foreach ($resultats as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
      </select><br>
      <div class="erreur">
        <?php echo $errors['chambre']; ?>
      </div>
      <label for="chambre">N° Chambre</label><br>
      <input type="number" name="chambre" min="01" max="80" id="chambre" value="<?php echo $res['chambre'] ?>" /><br>
      <div class="erreur">
        <?php echo $errors['lit']; ?>
      </div>
      <label for="lit">N° Lit</label><br>
      <input type="number" name="lit" min="1" max="3" id="lit" value="<?php echo $res['lit'] ?>" /><br>
      <button type="submit" name="submit" class="btn-hover color-11">Validé</button>
    </form>
  </div>
</body>

</html>