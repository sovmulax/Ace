<?php 
include '../../php/connexion.php';
$i = 1;
$j = 1;
$o = 1;
$p = 1;
$q = 1;
$result = $connexion->query('SELECT * FROM liste WHERE classe = 1 OR classe = 2 OR classe = 3 OR classe = 4 OR classe = 5');
$result0 = $connexion->query('SELECT * FROM liste WHERE classe = 6 OR classe = 7 OR classe = 8 OR classe = 9');
$result1 = $connexion->query('SELECT * FROM liste WHERE classe = 10 ');
$result2 = $connexion->query('SELECT * FROM liste WHERE classe = 11 ');
$result3 = $connexion->query('SELECT * FROM liste WHERE classe = 12 OR classe = 13 OR classe = 14 OR classe = 15');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Ace | Administrateur</title>
    <link rel="stylesheet" href="../Static/style.css" />
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="index.php">Statiques Générale</a></li>
        <li><a href="standard.php">les listes Standard</a></li>
        <li><a href="demande.php">Liste Trié</a></li>
      </ul>
    </nav>
    <div class="tableau">
      <div class="containt" id="licence1">
        <h1>Licence 1</h1>
        <table>
          <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Date de naissance</th>
            <th>Contact</th>
          </tr>
          <?php while($res = $result->fetch()): ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                                            $req->execute(['id' => $res['classe']]);
                                            $ress = $req->fetch();
                                            echo $ress['nom']; ?></td>
            <td><?php echo $res['born_date']; ?></td>
            <td><?php echo $res['contact']; ?></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
      <div class="containt" id="licence2">
        <h1>Licence 2</h1>
        <table>
          <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Date de naissance</th>
            <th>Contact</th>
          </tr>
          <?php while($res = $result0->fetch()): ?>
          <tr>
            <td><?php echo $j++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                                            $req->execute(['id' => $res['classe']]);
                                            $ress = $req->fetch();
                                            echo $ress['nom']; ?></td>
            <td><?php echo $res['born_date']; ?></td>
            <td><?php echo $res['contact']; ?></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
      <div class="containt" id="licence3">
        <h1>Licence 3</h1>
        <table>
          <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Date de naissance</th>
            <th>Contact</th>
          </tr>
          <?php while($res = $result3->fetch()): ?>
          <tr>
            <td><?php echo $o++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                                            $req->execute(['id' => $res['classe']]);
                                            $ress = $req->fetch();
                                            echo $ress['nom']; ?></td>
            <td><?php echo $res['born_date']; ?></td>
            <td><?php echo $res['contact']; ?></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
      <div class="containt" id="master1">
        <h1>Master 1</h1>
        <table>
          <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Date de naissance</th>
            <th>Contact</th>
          </tr>
          <?php while($res = $result1->fetch()): ?>
          <tr>
            <td><?php echo $p++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                                            $req->execute(['id' => $res['classe']]);
                                            $ress = $req->fetch();
                                            echo $ress['nom']; ?></td>
            <td><?php echo $res['born_date']; ?></td>
            <td><?php echo $res['contact']; ?></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
      <div class="containt" id="master2">
        <h1>Master 2</h1>
        <table>
          <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Classe</th>
            <th>Date de naissance</th>
            <th>Contact</th>
          </tr>
          <?php while($res = $result2->fetch()): ?>
          <tr>
            <td><?php echo $q++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                                            $req->execute(['id' => $res['classe']]);
                                            $ress = $req->fetch();
                                            echo $ress['nom']; ?></td>
            <td><?php echo $res['born_date']; ?></td>
            <td><?php echo $res['contact']; ?></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
    </div>
  </body>
</html>
