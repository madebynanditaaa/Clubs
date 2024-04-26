<?php
declare (strict_types= 1);

function is_username_wrong(bool|array $results)
{
    if(!$results)
    {
        return true;
    }
    else{
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedPwd)
{
    if(password_verify($pwd, $hashedPwd))
    {
        return false;
    }
    else{
        return true;
    }
}

function is_username_empty(String $username, String $pwd)
{
    if(empty($username) || empty($pwd))
    {
        return true;
    }
    else
    {
        return false;
    }
}