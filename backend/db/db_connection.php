
<?php
function OpenCon()
{
$dbhost = "127.0.0.1:3306";
$dbuser = "Teacher";
$dbpass = "";
$dbname = "user_star_wars_api";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>