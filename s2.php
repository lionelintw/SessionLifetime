<?PHP
include("./session_timeout.php");
$dbug = session_expire();
$dbug1 = "cookie enabled: " . ini_get("session.use_cookies") . "<br />";
echo "$dbug<br />$dbug1";
print_r($_SESSION);