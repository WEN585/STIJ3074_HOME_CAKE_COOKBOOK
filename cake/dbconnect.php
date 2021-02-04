<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','icebeary_cake');
define('DB_PASS','wX-OfCjak{d{');
define('DB_NAME','icebeary_cakes');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>