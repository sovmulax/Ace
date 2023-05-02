<?php session_start();
include '../../../php/connexion.php';
$resultat = $_SESSION['trie']['mois'];
$i = 1;

//test
$sql00 = "SELECT * FROM liste WHERE mois = '$resultat' ORDER BY nomPrenom ASC";
$result = mysqli_query($conn, $sql00);
$resultats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Ace | Administrateur</title>
    <link rel="stylesheet" href="../../Static/style.css" />
    <link rel="stylesheet" href="/fidele/Static/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="contain">
        <h1>Liste de naissance du mois de <?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                                $req->execute(['id' => $resultat]);
                                $ress = $req->fetch();
                                echo $ress['nom']; ?></h1>
        <table>
        <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Contact</th>
          </tr>
          <?php foreach ($resultats as $resu) : ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $resu['nomPrenom']; ?></td>
            <td><?php  $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                  $req->execute(['id' => $resu['classe']]);
                  $ress = $req->fetch();
                  echo $ress['nom']; ?></td>
            <td><?php echo $resu['contact']; ?></td>
          </tr>
        <?php endforeach ?>
        </table>
        <button class="btn-hover color-11">
            <a href="../demande.php">Retour</a>
        </button>
      </div>
    </div>
  </body>
</html>
