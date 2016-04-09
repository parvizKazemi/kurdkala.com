<?php
require_once "IBaseService.php";

interface IHLGroupDetailService extends IBaseService
{
    function getDetailNameByGroupId($gid);
}