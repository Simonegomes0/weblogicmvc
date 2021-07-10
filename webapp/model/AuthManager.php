<?php

use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\Redirect;

class AuthManager implements IAuthManager
{
    static public function isUserLogged()
    {
        if (Session::has('APPuserid')) {
            return true;
        } else {
            return false;
        }
    }

    static  public function logout()
    {
        if (self::isUserLogged()) {
            Session::destroy();
        }
    }

    public function setLogin($user)
    {
        Session::set('APPuserid', $user->id);
        Session::set('APPuserrole', $user->role);
    }

    static public function getRole()
    {
        if (Session::has('APPuserid')) {
            return Session::get('APPuserrole');
        } else {
            return null;
        }
    }

    static public function getId()
    {
        if (Session::has('APPuserid')) {
            return Session::get('APPuserid');
        } else {
            return null;
        }
    }

    static public function isUserLoggedIn()
    {
        return Session::has('APP_USER_ID');
    }

    static public function getLogginId()
    {
        if(self::isUserLoggedIn())
        {
            return Session::get('APP_USER_ID');
        }
    }
}