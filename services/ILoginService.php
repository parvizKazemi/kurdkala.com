<?php
require_once "IService.php";
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 11:19 AM
 */
interface ILoginService extends IService
{
    function checkLogin($uName,$pass);
}