<?php

$dbServer="localhost";
$dbName="member_system";
$dbUser="root";
$dbPass="cheng9595";
 
if(! @mysql_connect($dbServer, $dbUser, $dbPass))
{
    die("cannot connect to server");
    
}

mysql_query("SET NAMES utf8");

if(! @mysql_select_db($dbName))
{
    die("cannot use databases");
    
}
?>
