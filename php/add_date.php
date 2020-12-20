<?php include './connexion.php';
$date = date("Y-m-d");
$sql = "INSERT INTO dates(date) VALUE('$date')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../Admin/Views/nex.php');
    // success
} else {
    echo 'query error: ' . mysqli_error($conn);
}
