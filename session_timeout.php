<?php
function start_session($lifeTime = 0)
{ //秒
    if ($lifeTime == 0)
    {
        $lifeTime = ini_get('session.gc_maxlifetime');
    } else
    {
        ini_set('session.gc_maxlifetime', $lifeTime);
    }
    $time_stamp = time() + $lifeTime;
    if (!isset($_SESSION))
    {
        session_start();
    }
    if (ini_get("session.use_cookies"))
    {
        setcookie(session_name(), session_id(), $time_stamp, "/"); //since session_set_cookie_params($lifeTime) is not well for all browsers
    }
    $_SESSION[session_id()]["time_stamp"] = $time_stamp; //or to do to save $time_stamp, session_id() to db or file
    $_SESSION[session_id()]["session_id"] = session_id();
    return session_id() . "__" . $time_stamp;
}
//*
function session_expire()
{
    if (!isset($_SESSION))
    {
        session_start();
    }
    if (!empty($_SESSION[session_id()]["time_stamp"]) && $_SESSION[session_id()]["session_id"] === session_id() && time() >= $_SESSION[session_id()]["time_stamp"])
        //or to do to get $time_stamp, session_id() from db or file for the other PHPs
    {
        $_SESSION = array(); //reset
        //session_destroy(); //remove session_name(), session_id() and physical sessions
    }
    return session_id() . "__" . $_SESSION[session_id()]["time_stamp"];
}
//It's to check if session expired for the other PHPs*/

?>