<?php
session_start();
require "App/Models/User.php";
if (array_key_exists("username", $_SESSION)) {
    $username = $_SESSION["username"];
    $id = $_SESSION["id"];
} else {
    $username = "Guest";
}
if (isset($_POST["score"])) {
    $User = new User();
    $User->updateScore($id, $_POST["score"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice game</title>
    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time() ?>">
</head>

<body>
    <header>
        <h1>Dice game</h1>
        <a href="./View/logout.php">Logout</a>
    </header>
    <div class="container">
        <div class="game">
            <div class="user-info">
                <h2><?php echo $username ?></h2>
                <h2 class="total">0</h2>
            </div>
            <img class="dice" src="./public/imgs/1.svg">
            <div class="buttons">
                <button class="roll">Roll</button>
                <button class="save">Save</button>
            </div>
        </div>
        <div class="dashboard">

        </div>
    </div>
    <script src="./public/js/script.js?v=<?php echo time() ?>"></script>
</body>

</html>