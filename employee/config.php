<?php
/**
 * Created by PhpStorm.
 * User: Chaitanya.Padamati
 * Date: 4/8/2018
 * Time: 3:10 PM
 */

$username="root";
$password="";
$database="meshteam";
$server="localhost";
$conn= new PDO("mysql::host=$server;dbname=$database",$username,$password);
//$conn = mysqli_connect($server, $username, $password, $database);
