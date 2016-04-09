<?php
require_once "../utilities/checkLogin.php";
require_once "../DBEntities/GroupService.php";
require_once "../utilities/TableNames.php";

//$result='<div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px; dir=rtl"><input type="text" name="model" class="form-control" placeholder="" aria-describedby="basic-addon1"></div>';

if(isset($_POST["groupId"]))
{
    $groupId=$_POST["groupId"];
    $group=new GroupService(\utilities\TableNames::$Group);
    $groups=$group->getByProperties(array("parent_id"=>$groupId));

    if($groups!=false) {
        echo "<option value=\"0\">انتخاب کنید</option>";
        foreach ($groups as $gr)
            echo '<option value="' . $gr->getId() . '">' . $gr->getName() . '</option>';
    }
    else
    {
        $message="هیچ زیر گروهی ثبت نشده";
        echo '<option value="">' . $message . '</option>';
    }

}