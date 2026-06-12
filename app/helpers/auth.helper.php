<?php
class AuthHelper
{

    public static function initSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function signIn($user)
    {
        AuthHelper::initSession();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;
        $_SESSION['PASSWORD'] = $user->password;
    }

    public static function signOut()
    {
        AuthHelper::initSession();
        session_destroy();
    }
}
