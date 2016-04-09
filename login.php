<?php
require_once "DBEntities/LoginEntity.php";
require_once "utilities/TableNames.php";

if(isset($_POST["email"]) && isset($_POST["pass"]))
{
    $login=new LoginEntity(\utilities\TableNames::$Login);
    $person=$login->checkLogin($_POST["uName"],$_POST["pass"]);

    if($person!=false)
        echo "your login id is ".$person->getId();
    else
        echo "problem in geting";
    /*if($person!=false)
    {
        echo "you logined   ".$person->getUName();
    }*/
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="uName" placeholder="user Name"/><br/>
        <input type="password" name="pass" placeholder="Password"/><br/>
        <input type="submit" value="Check"/>
    </form>
</body>
</html>
