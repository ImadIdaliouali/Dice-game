<?php
session_start();
require "../App/Models/User.php";
if (array_key_exists("username", $_SESSION))
    header("location:../index.php");
if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $User = new User();
        $users = $User->getAllUsers();
        // print_r($users);
        foreach ($users as $u) {
            if ($u["username"] == $_POST["username"] && $u["password"] == $_POST["password"]) {
                $_SESSION["username"] = $_POST["username"];
                header("location:../index.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <form action="./login.php" method="post">
        <label for="username"><i class="fa-solid fa-user"></i></label>
        <input type="text" name="username" placeholder="username"><br>
        <label for="password"><i class="fa-solid fa-lock"></i></label>
        <input type="password" name="password" placeholder="****"><br>
        <input type="submit" name="submit" value="login">
    </form>
</body>

</html>