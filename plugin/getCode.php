<?php
//require "database.php";
//require_once('sdk/twitteroauth.php');
//require_once('sdk/config.php');
///header('Content-type:text/plain; charset=utf-8');

$mail = $_POST['mail'];
//データの挿入
echo md5($mail);

?>