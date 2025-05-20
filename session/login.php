<?php
if(isset($_POST["submit"])){
    if($_POST["us"] == '672022204' && $_POST["pw"] == 'password'){
        session_start();
        $_SESSION["name"] = "Jovian Obie";
        header("Location: rmk.php");
    } else {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        Username: <input type="text" name="us"><br><br>
        Password: <input type="password" name="pw"><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>