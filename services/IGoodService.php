<?php
require_once "IBaseService.php";

interface IGoodService extends IBaseService
{
    function getLastInsertedGoods($count);
}