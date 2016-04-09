<?php

class Utilities
{
    public static function redirect($page)
    {
        header("Location: ".$page);
        die();
    }

    public static function checkLogin($page)
    {
        if(!isset($_SESSION["user"]))
        {
            Utilities::redirect($page);
        }
    }
}

?>