<?php
session_start();

if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
}

if(isset($_POST["simpan"])){
    header("Location: result.php");
}

if(isset($_POST["batal"])){
    unset($_SESSION["matkul"]);
    header("Location: rmk.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
</head>
<body>
    <form action="" method="post">
    <p>Nama <?= $_SESSION["name"] ?></p>
    <input type="submit" name="logout" value="Logout">
    </form>

    <br>
    <p>Daftar Matakuliah</p>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Matakuliah</th>
        </tr>
        <?php foreach($_SESSION["matkul"][0] as $kode_mk){ ?>
            <tr>
                <td><?= $kode_mk; ?></td>
                <td>
                    <?php foreach($_SESSION["mk_db"][0] as $ls){
                        if($ls["kode"] == $kode_mk){
                            echo $ls["mk"];
                            break;
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
        <tr></tr>
    </table>
    <br>

    <form action="" method="post">
        <br><input type="submit" name="batal" value="BATALKAN PILIHAN">
        <br><input type="submit" name="simpan" value="SIMPAN">
    </form>
    
</body>
</html>