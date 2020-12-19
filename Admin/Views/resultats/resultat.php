<?php session_start();
include '../../../php/connexion.php';
$resultat = $_SESSION['trie']['seance'];
$yes = 'oui';
$i = 1;

//test
$sql00 = "SELECT id_presence FROM seances WHERE presents = 'oui' AND id_date = '$resultat'";
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
      <h1>Liste de la Séance du <?php $req = $connexion->prepare('SELECT * FROM dates WHERE id = :id');
                                $req->execute(['id' => $resultat]);
                                $ress = $req->fetch();
                                echo $ress['date']; ?></h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Contact</th>
          <th>Chambre-Lit</th>
        </tr>
        <?php foreach ($resultats as $res) :
          $ress = $res['id_presence'];
          $sql0 = "SELECT * FROM liste WHERE id = '$ress'";
          $result = mysqli_query($conn, $sql0);
          $resultat = mysqli_fetch_all($result, MYSQLI_ASSOC);
          mysqli_free_result($result);
        ?>

          <?php foreach ($resultat as $resu) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $resu['nomPrenom']; ?></td>
              <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                  $req->execute(['id' => $resu['classe']]);
                  $ress = $req->fetch();
                  echo $ress['nom']; ?></td>
              <td><?php echo $resu['contact']; ?></td>
              <td><?php echo $resu['chambre'] . '-' . $resu['lit']; ?></td>
            </tr>
          <?php endforeach ?>
        <?php endforeach ?>
      </table>
      <button class="btn-hover color-11">
        <a href="../demande.php">Retour</a>
      </button>
    </div>
  </div>
</body>

</html>