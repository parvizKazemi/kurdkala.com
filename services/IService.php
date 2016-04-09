<?php

interface IService
{
    function getAll();
    function getById($id);
    function getByProperties(array $prop);
    function getOneByProperties(array $prop);
    function save();
    function edit();
    function delete();
}