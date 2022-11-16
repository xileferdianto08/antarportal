<?php

if(!isset($_SESSION)){
    session_set_cookie_params(0);
    session_start();
}



$host = "localhost";
$username = "root";
$dbname = "newsportal";
$password = "";

$base_url = 'http://localhost/antarportal/antarportal/'; 

$db = new PDO("mysql:host=$host;dbname=$dbname;port=3306", $username, $password);