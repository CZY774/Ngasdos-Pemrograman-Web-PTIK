<?php
session_start();

if(isset($_POST["done"])){
    session_destroy();
    header("Location: login.php");
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
    <p>Nama <?= $_SESSION["name"] ?></p>
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
        <br><input type="submit" name="done" value="DONE">
    </form>
    
</body>
</html>