<?php
include '../../php/connexion.php';
$i = 1;
$j = 1;
$o = 1;
$p = 1;
$q = 1;
$result = $connexion->query('SELECT * FROM liste WHERE classe = 1 OR classe = 2 OR classe = 3 OR classe = 4 OR classe = 5 OR classe = 19 AND commit != 8 AND commit != 7 ORDER BY nomPrenom ASC');
$result0 = $connexion->query('SELECT * FROM liste WHERE classe = 6 OR classe = 7 OR classe = 8 OR classe = 9 AND commit != 8 AND commit != 7 ORDER BY nomPrenom ASC');
$result1 = $connexion->query('SELECT * FROM liste WHERE classe = 10 AND commit != 8 AND commit != 7 ORDER BY nomPrenom ASC');
$result2 = $connexion->query('SELECT * FROM liste WHERE classe = 11 AND commit != 8 AND commit != 7 ORDER BY nomPrenom ASC');
$result3 = $connexion->query('SELECT * FROM liste WHERE classe = 12 AND commit != 8 AND commit != 7 OR classe = 13 OR classe = 14 OR classe = 15 ORDER BY nomPrenom ASC');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Ace | Administrateur</title>
  <link rel="stylesheet" href="../Static/style.css" />
</head>
<script>
  function cacher() {
    let licence1 = document.getElementById('licence1');
    //
    let l1 = document.getElementById('l1');

    //
    l1.onClick = licence1.style.display = 'block';
    l2.onClick = licence2.style.display = 'none';
    l3.onClick = licence3.style.display = 'none';
    m1.onClick = master1.style.display = 'none';
    m2.onClick = master2.style.display = 'none';
  }

  function cacher0() {
    let licence2 = document.getElementById('licence2');
    //
    let l2 = document.getElementById('l2');
    //

    l1.onClick = licence1.style.display = 'none';
    l2.onClick = licence2.style.display = 'block';
    l3.onClick = licence3.style.display = 'none';
    m1.onClick = master1.style.display = 'none';
    m2.onClick = master2.style.display = 'none';
  }  

  function cacher1() {
    let licence3 = document.getElementById('licence3');
    //
    let l3 = document.getElementById('l3');
    //

    l1.onClick = licence1.style.display = 'none';
    l2.onClick = licence2.style.display = 'none';
    l3.onClick = licence3.style.display = 'block';
    m1.onClick = master1.style.display = 'none';
    m2.onClick = master2.style.display = 'none';
  }  

  function cacher2() {
    let master1 = document.getElementById('master1');
    //
    let m1 = document.getElementById('m1');
    //

    l1.onClick = licence1.style.display = 'none';
    l2.onClick = licence2.style.display = 'none';
    l3.onClick = licence3.style.display = 'none';
    m1.onClick = master1.style.display = 'block';
    m2.onClick = master2.style.display = 'none';
  }  

  function cacher3() {
    let master2 = document.getElementById('master2');
    //
    let m2 = document.getElementById('m2');
    //

    l1.onClick = licence1.style.display = 'none';
    l2.onClick = licence2.style.display = 'none';
    l3.onClick = licence3.style.display = 'none';
    m1.onClick = master1.style.display = 'none';
    m2.onClick = master2.style.display = 'block';
  }  
</script>

<body onload="cacher">
  <nav>
    <ul>
      <li><a href="index.php">Statiques Générale</a></li>
      <li><a href="standard.php">les listes Standard</a></li>
      <li><a href="demande.php">Liste Trié</a></li>
      <li><a href="nex.php">Séance</a></li>
    </ul>
  </nav>
  <div class="tableau">
    <p class="show">
      <input type="radio" name="s" id="l1" checked="checked" onclick="cacher()" />
      <label for="l1">Licence 1</label>
      <input type="radio" name="s" id="l2" onclick="cacher0()"/>
      <label for="l2">Licence 2</label>
      <input type="radio" name="s" id="l3" onclick="cacher1()"/>
      <label for="l3">Licence 3</label>
      <input type="radio" name="s" id="m1" onclick="cacher2()"/>
      <label for="m1">Master 1</label>
      <input type="radio" name="s" id="m2" onclick="cacher3()"/>
      <label for="m2">Master 2</label>
    </p>
    <div class="containt" id="licence1" style="display: none;">
      <h1>Licence 1</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Mois de naissance</th>
          <th>Contact</th>
          <th>Modifiez</th>
        </tr>
        <?php while ($res = $result->fetch()) : ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                $req->execute(['id' => $res['classe']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                $req->execute(['id' => $res['mois']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php echo $res['contact']; ?></td>
            <td><a href="./modifier.php?id=<?php echo $res['id']; ?>">modifier</a></td>
          </tr>
        <?php endwhile ?>
      </table>
    </div>

    <div class="containt" id="licence2" style="display: none;">
      <h1>Licence 2</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Mois de naissance</th>
          <th>Contact</th>
          <th>Modifiez</th>
        </tr>
        <?php while ($res = $result0->fetch()) : ?>
          <tr>
            <td><?php echo $j++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                $req->execute(['id' => $res['classe']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                $req->execute(['id' => $res['mois']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php echo $res['contact']; ?></td>
            <td><a href="./modifier.php?id=<?php echo $res['id']; ?>">modifier</a></td>
          </tr>
        <?php endwhile ?>
      </table>
    </div>

    <div class="containt" id="licence3" style="display: none;">
      <h1>Licence 3</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Mois de naissance</th>
          <th>Contact</th>
          <th>Modifiez</th>
        </tr>
        <?php while ($res = $result3->fetch()) : ?>
          <tr>
            <td><?php echo $o++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                $req->execute(['id' => $res['classe']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                $req->execute(['id' => $res['mois']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php echo $res['contact']; ?></td>
            <td><a href="./modifier.php?id=<?php echo $res['id']; ?>">modifier</a></td>
          </tr>
        <?php endwhile ?>
      </table>
    </div>

    <div class="containt" id="master1" style="display: none;">
      <h1>Master 1</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Mois de naissance</th>
          <th>Contact</th>
          <th>Modifiez</th>
        </tr>
        <?php while ($res = $result1->fetch()) : ?>
          <tr>
            <td><?php echo $p++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                $req->execute(['id' => $res['classe']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                $req->execute(['id' => $res['mois']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php echo $res['contact']; ?></td>
            <td><a href="./modifier.php?id=<?php echo $res['id']; ?>">modifier</a></td>
          </tr>
        <?php endwhile ?>
      </table>
    </div>

    <div class="containt" id="master2" style="display: none;">
      <h1>Master 2</h1>
      <table>
        <tr>
          <th>N°</th>
          <th>Nom et Prénom</th>
          <th>Classe</th>
          <th>Mois de naissance</th>
          <th>Contact</th>
          <th>Modifiez</th>
        </tr>
        <?php while ($res = $result2->fetch()) : ?>
          <tr>
            <td><?php echo $q++; ?></td>
            <td><?php echo $res['nomPrenom'] ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM classe WHERE id = :id');
                $req->execute(['id' => $res['classe']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php $req = $connexion->prepare('SELECT * FROM mois WHERE id = :id');
                $req->execute(['id' => $res['mois']]);
                $ress = $req->fetch();
                echo $ress['nom']; ?></td>
            <td><?php echo $res['contact']; ?></td>
            <td><a href="./modifier.php?id=<?php echo $res['id']; ?>">modifier</a></td>
          </tr>
        <?php endwhile ?>
      </table>
    </div>
  </div>
</body>

</html>