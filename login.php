
<?php
include_once 'function.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css"/>
</head>
<body>
<div id="content" style="width: 450px; margin: 0px auto; padding: 0px 20px 20px; border: 2px solid navy;height: 200px;">
    <h2 style="color: red">Login</h2>
    <form method="post">
        <label>User name: </label>
        <label>
            <input type="text" name="loginName" style="float: right;"/>
        </label><br><br>
        <label>Password</label>
        <label>
            <input type="text" name="loginPass" style="float: right;"/>
        </label><br><br>
        <button type="submit" style="float: right;">Login</button>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loginName = $_POST['loginName'];
            $loginPass = $_POST['loginPass'];
            if (!empty($loginName) && !empty($loginPass)) {
                if (checkLogin($loginName, $loginPass,'data.json')) {
                    ?>
                    <label><h4>LOGIN SUCCESSFULLY: HELLO <SPAN
                                style="color: red "><?php echo checkLogin($loginName, $loginPass,'data.json') ?> </SPAN></h4>
                    </label>
                    <?php
                } else {
                    ?>
                    <label><h4>LOGIN <span style="color: red ">ERROR</span></h4></label>
                    <?php
                }
            } else {
                ?>
                <label><h4>LOGIN ERROR: <span style="color: red ">The Field can not be empty</span></h4></label>
                <?php
            }
        }
        ?>
    </form>
</div>


</body>
</html>