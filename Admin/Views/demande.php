<?php session_start();
include '../../php/connexion.php';
$err_classe = '';
$err_comit = '';
$err_genre = '';
$err_mois = '';
$err_seance = '';
$_SESSION['trie'] = array();

$sql00 = "SELECT * FROM seances";
$result = mysqli_query($conn, $sql00);
$resultats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

if (isset($_POST['submit-seance'])) {
  if (empty($_POST['seance'])) {
    $err_seance = 'Sélectionner une séance';
  } else {
    $_SESSION['trie']['seance'] = $_POST['seance'];
    header('Location: ./resultats/resultat.php');
  }
}

if (!empty($_POST['submit-classe'])) {
  if (empty($_POST['classe'])) {
    $err_classe = 'Sélectionner une classe';
  } else {
    $_SESSION['trie']['classe'] = $_POST['classe'];
    header('Location: ./resultats/classe.php');
  }
}

if (!empty($_POST['submit-comit'])) {
  if (empty($_POST['comit'])) {
    $err_comit = 'Sélectionner un comité';
  } else {
    $_SESSION['trie']['comit'] = $_POST['comit'];
    header('Location: ./resultats/commite.php');
  }
}

if (!empty($_POST['submit-mois'])) {
  if (empty($_POST['mois'])) {
    $err_mois = 'Sélectionner un cmois';
  } else {
    $_SESSION['trie']['mois'] = $_POST['mois'];
    header('Location: ./resultats/mois.php');
  }
}

if (!empty($_POST['submit-genre'])) {
  if (empty($_POST['genre'])) {
    $err_genre = 'Sélectionner un genre';
  } else {
    $_SESSION['trie']['genre'] = $_POST['genre'];
    header('Location: ./resultats/genre.php');
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Ace | Administrateur</title>
  <link rel="stylesheet" href="../Static/style.css" />
  <link rel="stylesheet" href="/fidele/Static/css/formulaire.css" />
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Statiques Générale</a></li>
      <li><a href="standard.php">les listes Standard</a></li>
      <li><a href="demande.php">Liste trié</a></li>
    </ul>
  </nav>
  <div class="container">
    <h1>Par séance</h1>
    <hr />
    <div class="contain">
      <form method="POST">
        <div class="erreur">
          <?php echo $err_seance; ?>
        </div>
        <select name="seance">
          <option value="">--Selectionné la Séance--</option>
          <?php foreach ($resultats as $resultat) { ?>
            <option value="<?php echo $resultat['date']; ?>"><?php echo $resultat['date']; ?></option>
          <?php } ?>
        </select><br />
        <button type="submit" name="submit-seance" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
    <h1>Par Classe</h1>
    <hr />
    <div class="contain">
      <form method="POST">
        <div class="erreur"></div>
        <select name="classe">
          <option value="">--Selectionné la classe--</option>
        </select><br />
        <button type="submit" name="submit-classe" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
    <h1>Par Commité</h1>
    <hr />
    <div class="contain">
      <form method="POST">
        <div class="erreur"></div>
        <select name="comit">
          <option value="">--Selectionné le Commité--</option>
        </select><br />
        <button type="submit" name="submit-comit" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
    <h1>Par Mois de Naissance</h1>
    <hr />
    <div class="contain">
      <form method="POST">
        <div class="erreur"></div>
        <select name="mois">
          <option value="">--Selectionné le Mois--</option>
        </select><br />
        <button type="submit" name="submit-mois" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
    <h1>Par Genre</h1>
    <hr />
    <div class="contain">
      <form method="POST">
        <div class="erreur"></div>
        <select name="genre">
          <option value="">--Selectionné le Genre--</option>
        </select><br />
        <button type="submit" name="submit-genre" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
  </div>
</body>

</html>