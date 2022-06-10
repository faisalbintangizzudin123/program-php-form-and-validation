<?php

session_start();

$nameErr = $nimErr = $emailErr = $dateErr = $genderErr = $hobbyErr = $descriptionErr = "";
$name = $nim = $email = $date = $gender = $hobby = $description = false;

$_error = "is required";

$check_hobby1 = $check_hobby2 = $check_hobby3 = "";

$_check = "checked";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Nama " . $_error;
    } else {
        $name = true;
    }

    if (empty($_POST["nim"])) {
        $nimErr = "NIM " . $_error;
    } else {
        $nim = true;
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email " . $_error;
    } else {
        $email = true;
    }

    if (empty($_POST["date"])) {
        $dateErr = "Date " . $_error;
    } else {
        $date = true;
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Jenis Kelamin " . $_error;
    } else {
        $gender = true;
    }

    if (empty($_POST["hobby"])) {
        $hobbyErr = "Hobby " . $_error;
    } else {
        foreach ($_POST["hobby"] as $h) {
            if (!empty($h) && $h == "Hobi 1") $check_hobby1 = $_check;
            if (!empty($h) && $h == "Hobi 2") $check_hobby2 = $_check;
            if (!empty($h) && $h == "Hobi 3") $check_hobby3 = $_check;
        }
        $hobby = true;
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Description " . $_error;
    } else {
        $description = true;
    }
}

if ($name && $nim && $email && $date && $gender && $hobby && $description) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["nim"] = $_POST["nim"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["gender"] = $_POST["gender"];
    $_SESSION["hobby"] = $_POST["hobby"];
    $_SESSION["description"] = $_POST["description"];
    header("location: validation.php");
    exit();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/06e0fcae35.js" crossorigin="anonymous"></script>
    <title>TITTLE</title>
</head>

<body>


    <!-- START ALL CONTENT SECTION -->
    <div class="container">
        <div class="row">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- NEWS CONTENT -->
            <div class="col-12">
                <div class="row">
                    <div class="card card-light card-berita">
                        <div class="col-12 mt-1">
                            <!-- <p><span class="error">* required field</span></p> -->
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <table border="1">
                                    <tr>
                                        <td colspan="2" style="text-align: center;">
                                            <font size="6"><b>Form Mahasiswa</b></font>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>
                                            <input type="text" autofocus id="name" name="name" value="<?= isset($_POST["name"]) ? $_POST["name"] : ""; ?>">
                                            <span class="error"><?= $nameErr; ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>NIM</td>
                                        <td>
                                            <input type="text" name="nim" value="<?= isset($_POST["nim"]) ? $_POST["nim"] : ""; ?>">
                                            <span class="error"><?= $nimErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type="email" name="email" value="<?= isset($_POST["email"]) ? $_POST["email"] : ""; ?>">
                                            <span class="error"><?php echo $emailErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>
                                            <input type="date" name="date" value="<?= isset($_POST["date"]) ? $_POST["date"] : ""; ?>">
                                            <span class="error"><?php echo $dateErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <input type="radio" name="gender" value="Laki-laki" <?php if (isset($gender) && $gender == "Laki-laki") echo "checked";
                                                                                                ?>>Laki-laki
                                            <input type="radio" name="gender" value="Perempuan" <?php if (isset($gender) && $gender == "Perempuan") echo "checked";
                                                                                                ?>>Perempuan
                                            <span class="error"><?php echo $genderErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Hobi</td>
                                        <td>
                                            <input type="checkbox" name="hobby[]" value="Hobi 1" <?= $check_hobby1 ?>>Hobi 1
                                            <input type="checkbox" name="hobby[]" value="Hobi 2" <?= $check_hobby2 ?>>Hobi 2
                                            <input type="checkbox" name="hobby[]" value="Hobi 3" <?= $check_hobby3 ?>>Hobi 3
                                            <span class="error"><?php echo $hobbyErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>

                                            <textarea cols="49" rows="10" name="description" placeholder="Input description.."><?= isset($_POST["description"]) ? $_POST["description"] : ""; ?></textarea>
                                            <span class="error"><?php echo $descriptionErr ?></span>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td>

                                        </td>
                                        <td>
                                            <button disabled id="button-clear" class="btn btn-danger">
                                                <b>Reset </b><i class="fas fa-trash"></i></button>
                                            <button type="submit" id="button-clear" name="submit" class="btn btn-success">
                                                <b>Submit </b><i class="fas fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--END ALL CONTENT SECTION-->
</body>

</html>