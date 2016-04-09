<?php
//require_once "utilities/checkLogin.php";
require_once "DBEntities/PersonService.php";
require_once "DBEntities/LoginEntity.php";
require_once "utilities/TableNames.php";

/**
 * @param $email user email address
 * @param $password user login password
 * @param $userName user name
 * @param $personId person id
 * @return true or false for registeration
 */
function registerLogin($email, $password, $userName, $personId)
{
    $login = new LoginEntity(\utilities\TableNames::$Login);
    $login->setEmail($email);
    $login->setPass($password);
    $login->setUName($userName);
    $login->setPersonId($personId);
    $login->setIsActive(false);
    if($login->save())
        return true;

    return false;
}

$progressMessage="";

if(isset($_POST["name"]) && isset($_POST["family"]))
{
    $name=$_POST["name"];
    $family=$_POST["family"];
    $email=$_POST["email"];
    $phoneNumber=$_POST["phoneNumber"];
    $password=$_POST["pass"];
    $userName=$_POST["uName"];

    $person=new PersonService(\utilities\TableNames::$Person);
    $person->setName($name);
    $person->setFamily($family);
    $person->setPhoneNumber($phoneNumber);

    $progressMessage="error in registeration";
    if($person->save())
    {
        if(registerLogin($email, $password, $userName, $person->getId()))
            $progressMessage= "Registeration Completed";
        else
            $person->delete();
    }
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت اعضا</title>
</head>
<body>
    <p><?php echo $progressMessage;?></p>
    <form method="post" action="registerMember.php">
        <input type="text" name="name" placeholder="Name"/><br/>
        <input type="text" name="family" placeholder="family"/><br/>
        <input type="text" name="phoneNumber" placeholder="Phone Number"/><br/>
        <input type="text" name="uName" placeholder="user name"/><br/>
        <input type="email" name="email" placeholder="email"/><br/>
        <input type="password" name="pass" placeholder="password"/><br/>
        <input type="submit" value="ثبت"/>
    </form>
</body>
</html>
