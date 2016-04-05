<?php
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 9:23 AM
 */


interface IService
{
    function getAll();
    function getById($id);
    function getByProperties(array $prop);
    function save();
    function edit();
}