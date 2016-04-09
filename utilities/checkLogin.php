<?php
session_start();
require_once "utilities.php";
require_once "PublicPages.php";
Utilities::checkLogin(PublicPages::$LoginPage);