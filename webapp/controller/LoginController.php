<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Debug;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class LoginController extends \ArmoredCore\Controllers\BaseController
{
    public function getLoginForm(){
        return View::make('home.login');
    }

    public function doLogin(){

        $username = Post::get('username');
        $password = Post::get('password');
        $user = User::find_by_username_and_password($username,$password);

        if(!is_null($user))
        {
            $authmgr = new AuthManager();
            $authmgr->setLogin($user);

            $role = AuthManager::getRole();

            switch ($role)
            {

                case 'admin':
                    Redirect::toRoute('adminapp/index');
                    break;
                case 'passageiro':
                    Redirect::toRoute('passageiroapp/index');
                    break;
                case 'gestorvoo':
                    Redirect::toRoute('gestorvooapp/index');
                    break;
                case 'opcheckin':
                    Redirect::toRoute('opcheckinapp/index');
                    break;

                default:
                    Redirect::toRoute('login/login');
            }
        }else
        {
            Redirect::toRoute('home/login');
        }
    }

    public function getRegistrationForm()
    {
        return View::make('home.register');
    }

    public function doRegistration(){
        {

            $user = new User(Post::getAll());
            $user -> role='passageiro';

            if($user->is_valid()){
                $user->save();
                Redirect::toRoute('login/dologin');
            } else {
                //redirect to form with data and errors
                Redirect::flashToRoute('login/registration', ['user' => $user]);
            }
        }
    }



    public function setsession(){
        $dataObject = MetaArmCoreModel::getComponents();
        Session::set('object', $dataObject);

        Redirect::toRoute('home/worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/worksheet');
    }


}