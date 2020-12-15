<?php 
include '../../php/connexion.php';
$err_classe = null;
$err_comit = null;
$err_genre = null;
$err_mois = null;
$err_result = null;

if(!empty($_POST['submit-séance'])){

}

if(!empty($_POST['submit-séance'])){
  
}

if(!empty($_POST['submit-séance'])){
  
}

if(!empty($_POST['submit-séance'])){
  
}

if(!empty($_POST['submit-séance'])){
  
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
          <div class="erreur"></div>
          <select name="seance">
            <option value="">--Selectionné la Séance--</option></select
          ><br />
          <button type="submit" name="submit-séance" class="btn-hover color-11">
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
            <option value="">--Selectionné la classe--</option></select
          ><br />
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
          <select name="commit">
            <option value="">--Selectionné le Commité--</option></select
          ><br />
          <button type="submit" name="submit-commit" class="btn-hover color-11">
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
            <option value="">--Selectionné le Mois--</option></select
          ><br />
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
            <option value="">--Selectionné le Genre--</option></select
          ><br />
          <button type="submit" name="submit-genre" class="btn-hover color-11">
            Validé
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
