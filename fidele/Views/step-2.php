<?php session_start();
if (!isset($_SESSION['contact'])) {
  header('Location: index.html');
  exit();
}
include '../../php/connexion.php';
$errors = array('nom' => '', 'prenom' => '', 'email' => '', 'date' => '', 'classe' => '', 'comit' => '', 'lit' => '', 'chambre' => '');
$start = '2020-01-01';

//commité
$sql00 = "SELECT * FROM commite";
$result = mysqli_query($conn, $sql00);
$resultats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

//classe
$sql0 = "SELECT * FROM classe";
$results = mysqli_query($conn, $sql0);
$resultat = mysqli_fetch_all($results, MYSQLI_ASSOC);
mysqli_free_result($results);

if (isset($_POST['submit'])) {
  //check nom
  if (empty($_POST['nom'])) {
    $errors['nom'] = "Entrée un nom";
  } else {
    $nom = htmlspecialchars($_POST['nom']);
    if (!preg_match('/^[a-zA-Z\s]+$/', $nom)) {
      $errors['nom'] = "le nom entré n'est pas valide";
    }
  }

  //check prenom
  if (empty($_POST['prenom'])) {
    $errors['prenom'] = "Entrée un prenom";
  } else {
    $prenom = htmlspecialchars($_POST['prenom']);
    if (!preg_match('/^[a-zA-Z\s]+$/', $prenom)) {
      $errors['prenom'] = "le prenom entré n'est pas valide";
    }
  }

  //check email
  if (empty($_POST['email'])) {
    $errors['email'] = "Entrée un E-MAIL";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "le mail entré n'est pas valide";
  } else {
    $req = $connexion->prepare('SELECT id FROM liste WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if ($user) {
      $errors['email'] = "Cet email existe déjà";
    } else {
      $email = htmlspecialchars($_POST['email']);
    }
  }

  //check date
  if (empty($_POST['date'])) {
    $errors['date'] = "Entrée une date";
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
  if (empty($_POST['chambre'])) {
    //
  } else {
    if ($_POST['chambre'] < 0 || $_POST['chambre'] > 80) {
      $errors['chambre'] = "le numéro de la chambre n'est pas valide";
    } else {
      $chambre = (int) htmlspecialchars($_POST['chambre']);
    }
  }

  //check lit
  if (empty($_POST['lit'])) {
    //
  } else {
    if ($_POST['lit'] < 0 || $_POST['lit'] > 3) {
      $errors['lit'] = "le numéro de lit entré n'est pas valide";
    } else {
      $lit = (int) htmlspecialchars($_POST['lit']);
    }
  }

  if (array_filter($errors)) {
    //rien
  } else {
    //securité des donners
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $np = $nom . ' ' . $prenom;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_SESSION['contact']);
    $lit = mysqli_real_escape_string($conn, $_POST['lit']);
    $chambre = mysqli_real_escape_string($conn, $_POST['chambre']);
    $_SESSION['congrat'] = array('nom' => '', 'genre' => '');
    $_SESSION['congrat']['nom'] = $nom;
    $_SESSION['congrat']['genre'] = $genre;
    $_SESSION['valid'] = '';
    $_SESSION['valid'] = 'maintenant';
    $genre = $_POST['genre'];
    $sql = "INSERT INTO liste(nomPrenom, email, classe, commit, genre, born_date,	contact, chambre, lit) VALUES('$np', '$email', '$classe', '$commit', '$genre', '$date', '$contact', '$chambre', '$lit')";
    // save to db and check
    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: congrat.php');
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
  <link rel="stylesheet" href="../Static/css/formulaire.css" />
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
      <input type="text" name="nom" placeholder="Nom" /><br>
      <div class="erreur">
        <?php echo $errors['prenom']; ?>
      </div>
      <input type="text" name="prenom" placeholder="Prénom" /><br>
      <div class="erreur">
        <?php echo $errors['email']; ?>
      </div>
      <input type="email" name="email" placeholder="Entrée vôtre email" /><br>
      <div class="erreur">
        <?php echo $errors['date']; ?>
      </div>
      <label for="date">Date de Naissance</label><br />
      <input type="date" name="date" id="date" max="<?php echo $start; ?>"/><br>
      <div class="erreur">
        <?php echo $errors['classe']; ?>
      </div>
      <select name="classe">
        <option value="">--Selectionné vôtre classe--</option>
        <?php foreach ($resultat as $resultat) { ?>
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
      <input type="number" name="chambre" min="01" max="80" id="chambre" /><br>
      <div class="erreur">
        <?php echo $errors['lit']; ?>
      </div>
      <label for="lit">N° Lit</label><br>
      <input type="number" name="lit" min="1" max="3" id="lit" /><br>
      <button type="submit" name="submit" class="btn-hover color-11">Validé</button>
    </form>
  </div>
</body>

</html>