<?php
require_once "DBEntities/PersonService.php";

if(isset($_POST["name"]) && isset($_POST["family"]))
{
    $name=$_POST["name"];
    $family=$_POST["family"];
    $email=$_POST["email"];
    $phoneNumber=$_POST["phoneNumber"];

    /*$person=new PersonService(\utilities\TableNames::$Person);
    $person->setId(1);
    $person->setName($name);
    $person->setFamily($family);
    $person->setEmail($email);
    $person->setPhoneNumber($phoneNumber);
    if($person->edit())
        echo "Registeration Completed";
    else
        echo "error in registeration";*/
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت اعضا</title>
</head>
<body>
    <form method="post" action="registerMember.php">
        <input type="text" name="name" placeholder="Name"/><br/>
        <input type="text" name="family" placeholder="family"/><br/>
        <input type="email" name="email" placeholder="email"/><br/>
        <input type="text" name="phoneNumber" placeholder="Phone Number"/><br/>
        <input type="submit" value="ثبت"/>
    </form>
</body>
</html>
