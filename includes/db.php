<?php 

$db['db_host'] = "localhost";
$db['db_name'] = "cmsproject";
$db['db_user'] = "cmsproject";
$db['db_pass'] = "BQZjEUyRhoZ4zPEf";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);