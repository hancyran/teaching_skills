<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=test_db";
$credentials = "user=postgres password=123456";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "Error : Unable to open database\n";
}
/*    else {
   echo "Opened database successfully\n";
} */
