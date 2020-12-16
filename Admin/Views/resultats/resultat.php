<?php session_start();
include '../../../php/connexion.php';
$resultat = $_SESSION['trie']['seance'];
$yes = 'oui';
$req = $connexion->prepare('SELECT * FROM :id WHERE presents = :oui');
$req->execute(['id' => $resultat, 'oui' => $yes]);
$tre = $req->fetch();
$result = $connexion->query('SELECT * FROM liste WHERE id = \'' . $tre . '\' ');
$i = 0;
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
      <h1>Liste de la Séance du ...</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Contact</th>
          <th>Chambre-Lit</th>
        </tr>
        <?php while ($resu = $result->fetch()) : ?>
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
        <?php endwhile ?>
      </table>
      <button class="btn-hover color-11">
        <a href="../demande.php">Retour</a>
      </button>
    </div>
  </div>
</body>

</html>