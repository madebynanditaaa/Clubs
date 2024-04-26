<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' =>'localhost',
    'path' =>'/',
    'secure' => true,
    'httponly' => true
]);

session_start();


if(isset($_SESSION["user_id"]))
{
    if(!isset($_SESSION["last_regeneration"]))
{
    regenerate_session_id_loggedin();
    $_SESSION["last_regeneration"] = time();
}
else
{
    $interval = 60 * 30;
    if(time() - $_SESSION["last_regeneration"] >= $interval)
    {
        regenerate_session_id_loggedin();
    }
}

}
else
{
    //when user is not logged into the website.
    if(!isset($_SESSION["last_regeneration"]))
    {
        regenerate_session_id();
        $_SESSION["last_regeneration"] = time();
    }
    else
    {
        $interval = 60 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval)
        {
            regenerate_session_id();
        }
    }
    
}

function regenerate_session_id_loggedin()
{
    $userId = $_SESSION["user_id"];
    session_regenerate_id(true);
        $newSessionID = session_create_id(); //this will create an entirely new id instead of regenerating the previous id......which regenerate function does.
        $sessionID = $newSessionID . '_' . $userId;
        session_id($sessionID);
    $_SESSION["last_regeneration"] = time();
}
function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}