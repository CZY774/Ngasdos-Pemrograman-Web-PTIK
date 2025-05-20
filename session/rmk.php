<?php
session_start();

//DATA MATKUL
$mk_db = [
    ["kode" => "A001", "mk" => "Pemrograman Web"],
    ["kode" => "A002", "mk" => "Pemrograman Service"],
    ["kode" => "A003", "mk" => "Desain Interface"],
    ["kode" => "A004", "mk" => "Manajemen Database"]
];

$_SESSION["mk_db"] = array();
array_push($_SESSION["mk_db"], $mk_db);

//LOGOUT BUTTON
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
}

//DAFTAR BUTTON
if(isset($_POST["daftar"]) && isset($_POST["mk"]) && is_array($_POST["mk"])){
    $_SESSION["matkul"] = array();
    array_push($_SESSION["matkul"], $_POST["mk"]);
    header("Location: confirm_page.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMK</title>
</head>
<body>
    <form action="" method="post">
        <p>Selamat datang <?= $_SESSION["name"] ?></p>
        <input type="submit" name="logout" value="Logout">
    </form>

    <br>
    <p>Silahkan pilih matakuliah</p>
    <form action="" method="post">
        <table border="1">
            <tr>
                <th>Kode</th>
                <th>Matakuliah</th>
                <th>Pilih</th>
            </tr>
            <?php foreach($mk_db as $ls){ ?>
                <tr>
                    <td><?= $ls["kode"] ?></td>
                    <td><?= $ls["mk"] ?></td>
                    <td>
                        <input type="checkbox" name="mk[]" value="<?= $ls["kode"]?>">
                    </td>
                </tr>
            <?php } ?>
            <tr></tr>
        </table>
        <br>
        <input type="submit" name="daftar" value="Daftar">
    </form>
    
</body>
</html>