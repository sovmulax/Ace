<?php session_start();
include '../../php/connexion.php';
$err_classe = '';
$err_comit = '';
$err_genre = '';
$err_mois = '';
$err_seance = '';
$_SESSION['trie'] = array();

$sql00 = "SELECT * FROM dates";
$result = mysqli_query($conn, $sql00);
$resultatsx = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

//classe
$sql0 = "SELECT * FROM classe";
$results = mysqli_query($conn, $sql0);
$resultatt = mysqli_fetch_all($results, MYSQLI_ASSOC);
mysqli_free_result($results);

//commité
$sql00 = "SELECT * FROM commite";
$result = mysqli_query($conn, $sql00);
$resultats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

//Mois
$sql01 = "SELECT * FROM mois";
$results0 = mysqli_query($conn, $sql01);
$resultatx = mysqli_fetch_all($results0, MYSQLI_ASSOC);
mysqli_free_result($results0);

if (isset($_POST['submit-seance'])) {
  if (empty($_POST['seance'])) {
    $err_seance = 'Sélectionner une séance';
  } else {
    $_SESSION['trie']['seance'] = $_POST['seance'];
    header('Location: ./resultats/resultat.php');
  }
}

if (isset($_POST['submit-classe'])) {
  if (empty($_POST['classe'])) {
    $err_classe = 'Sélectionner une classe';
  } else {
    $_SESSION['trie']['classe'] = $_POST['classe'];
    header('Location: ./resultats/classe.php');
  }
}

if (isset($_POST['submit-comit'])) {
  if (empty($_POST['comit'])) {
    $err_comit = 'Sélectionner un comité';
  } else {
    $_SESSION['trie']['comit'] = $_POST['comit'];
    header('Location: ./resultats/commite.php');
  }
}

if (isset($_POST['submit-mois'])) {
  if (empty($_POST['mois'])) {
    $err_mois = 'Sélectionner un cmois';
  } else {
    $_SESSION['trie']['mois'] = $_POST['mois'];
    header('Location: ./resultats/mois.php');
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
      <li><a href="nex.php">Séance</a></li>
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
          <?php foreach ($resultatsx as $resultat) { ?>
            <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['date']; ?></option>
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
        <option value="">--Selectionné vôtre classe--</option>
        <?php foreach ($resultatt as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
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
        <option value="">--Selectionné vôtre Comité--</option>
        <?php foreach ($resultats as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
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
        <option value="">--Mois de Naissance--</option>
        <?php foreach ($resultatx as $resultat) { ?>
          <option value="<?php echo $resultat['id']; ?>"><?php echo $resultat['nom']; ?></option>
        <?php } ?>
      </select><br />
        <button type="submit" name="submit-mois" class="btn-hover color-11">
          Validé
        </button>
      </form>
    </div>
  </div>
</body>

</html>