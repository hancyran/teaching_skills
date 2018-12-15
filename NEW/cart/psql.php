<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=teaching_skills";
$credentials = "user=haoxiran password=password";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "Error : Unable to open database\n";
}
/*    else {
   echo "Opened database successfully\n";
} */
