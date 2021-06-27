<?php
use ArmoredCore\WebObjects\Redirect;

class BaseAuthController extends \ArmoredCore\Controllers\BaseController
{
    public function loginFilter()
    {
        if(!AuthManager::isUserLogged())
        {
            Redirect::toRoute('login/login');

            //tem de estar autenticado para aceder a essa funcionalidade
        }
    }

    public function loginFilterByRole($role)
    {
        if(AuthManager::isUserLogged()) {
            if ($role != AuthManager::getRole()) {
                Redirect::toRoute('login/login');
                // nao tem permissoes para aceder a essa funcionalidade
            }
        }
        else{
            Redirect::toRoute('login/login');
            //tem de estar autenticado para aceder a essa funcionalidade
        }
    }
}