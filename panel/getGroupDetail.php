<?php
require_once "../utilities/checkLogin.php";
require_once "../DBEntities/HLGroupService.php";
require_once "../utilities/TableNames.php";

//$result='<div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px; dir=rtl"><input type="text" name="model" class="form-control" placeholder="" aria-describedby="basic-addon1"></div>';

if(isset($_POST["groupId"]))
{
    $groupId=$_POST["groupId"];
    $groupDetail=new HLGroupService(\utilities\TableNames::$GroupDetail);
    $groups=$groupDetail->getDetailNameByGroupId($groupId);

    if($groups!=false) {
        foreach ($groups as $gr)
            echo '<div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">
                        <input type="text" name="'.$gr->getId().'" class="form-control subDetail" placeholder="'.$gr->getName().'" aria-describedby="basic-addon1"/>
                    </div>';
    }

}