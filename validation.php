<?php

session_start();
// $name = $_POST['name'];
// $nim = $_POST['nim'];
// $email = $_POST['email'];
// $date = $_POST['date'];
// $gender = $_POST['gender'];
// $hobby = $_POST['hobby'];
// $description = $_POST['description'];

// if ($name == "") {
//     header("location:../../form?name=");
// } else if ($nim == "") {
//     header("location:../../form?nim=");
// } else if ($email == "") {
//     header("location:../../form?email=");
// } else if ($date == "") {
//     header("location:../../form?date=");
// } else if ($gender == "") {
//     header("location:../../form?gender=");
// } else if ($hobby == "") {
//     header("location:../../form?hobby=");
// } else if ($description == "") {
//     header("location:../../form?description=");
// }

// session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Hasil Input Form</h1>
    <h4>Nama : <?= $_SESSION["name"] ?></h4>

    <h4>NIM : <?= $_SESSION["nim"] ?></h4>

    <h4>Email : <?= $_SESSION["email"] ?></h4>

    <h4>Tanggal Lahir : <?= $_SESSION["date"] ?></h4>

    <h4>Jenis Kelamin : <?= $_SESSION["gender"] ?></h4>

    <h4>Hobi : <?php foreach ($_SESSION["hobby"] as $hobby) : ?><?= $hobby; ?><?php endforeach; ?></h4>

    <h4>Deskripsi : <?= $_SESSION["description"] ?></h4>

    <br>
</body>

</html>

<a href="../form/"><b>Kembali </b></a> ke halaman sebelumnya