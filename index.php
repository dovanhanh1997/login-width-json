<?php
include_once 'function.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="my.css"/>
</head>
<body>
<div id="content">
    <h2 style="color: navy">Register an account</h2>
    <form method="post">
        <label>User name: </label>
        <input type="text" name="name"><br><br>
        <label>Password: </label>
        <input type="text" name="password"><br><br>
        <label>Re-Password: </label>
        <input type="password" name="rePassword"><br><br>
        <button type="submit">Register</button>
        <br><br>
    </form>
    <form action="login.php">
        <button type="submit">Login</button>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $pass = $_POST['password'];
            $re_password = $_POST['rePassword'];
            if (!empty($name) && !empty($pass)) {
                if ($pass == $re_password) {
                    $acount = addAcount($name, $pass);
                    saveFileJson("data.json", $acount);
                } else { ?>
                    <span style="color: red">Password and RePassword must be same</span><?php
                }
            } else {
                ?> <span style="color: red">field cannot be empty</span><?php
            }
        }
        ?>
    </form>
</div>
</body>
</html>