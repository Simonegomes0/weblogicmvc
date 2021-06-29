<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName/methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');

// Login
Router::get('home/login',	'LoginController/doLogin');
Router::get('login/login',          'LoginController/getLoginForm');
Router::get('login/registration',   'LoginController/getRegistrationForm');
Router::get('login/logout',         'LoginController/destroySession');
Router::post('login/doregistration', 'LoginController/doRegistration');
Router::post('login/dologin',       'LoginController/doLogin');

// Cliente

Router::get('cliente/bilhete', 'ClienteController/VerVoos');
Router::post('cliente/bilhete', 'ClienteController/VerVoos');
Router::get('cliente/index', 'ClienteController/index');
Router::get('cliente/comprar', 'ClienteController/Comprar');
Router::post('cliente/pagar', 'ClienteController/Pagar');
Router::get('cliente/mostrar', 'ClienteController/Mostrar');











/************** End of URLEncoder Routing Rules ************************************/