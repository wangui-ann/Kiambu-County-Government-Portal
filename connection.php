<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = ";";
$dbname  = "kiambucounty";

if(!$con = mysql_connect($dbhost,$dbusername,$dbpassword,$dbname))
{
	die("failed to connect!")
}
