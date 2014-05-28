<?PHP
include("./session_timeout.php");
$dbug = start_session(30);//seconds
$dbug1 = "cookie enabled: " . ini_get("session.use_cookies");
echo "$dbug<br />$dbug1";
$_SESSION[session_id()]["variable_name"] = "variable_value";
$_SESSION[variable_name1] = "variable_value1";