<?php
require_once("jdatetime.class.php");
/**
 * Created by PhpStorm.
 * User: P.K
 * Date: 9/1/2015
 * Time: 10:16 AM
 */
class Utility
{
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public static function n_digit_random($digits)
    {
        $temp = "";

        for ($i = 0; $i < $digits; $i++) {
            $temp .= rand(0, 9);
        }

        return (int)$temp;
    }

    public static function randomPassword($count)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $count; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public static function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
    }

    public static function getCurrentDate()
    {
        $date = new jDateTime(true, true, 'Asia/Tehran');
        $currentDate=array('Y'=>intval($date->date("Y")),
            'M'=>intval($date->date("m")) ,
            'D'=>intval($date->date("j")),
            'h'=>intval($date->date("H")),
            'm'=>intval($date->date("i")));
        return $currentDate;
    }

    public static function getCurrentDateAsString()
    {
        $date = jDateTime::date("Y/m/d");
        return $date;
    }
}