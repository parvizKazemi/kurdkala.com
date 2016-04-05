<?php
require_once "IBaseService.php";
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 11:19 AM
 */
interface ILoginService extends IBaseService
{
    function checkLogin($uName,$pass);
}