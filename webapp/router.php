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

//Admin
Router::get('admin/index', 'AdminController/index');
Router::get('admin/GestaoAero', 'AdminController/GestaoAero');
Router::get('admin/aeroportos',   'AdminController/getAeroportoForm');
Router::get('admin/doUpdateAero',   'AdminController/doUpdateAero');
Router::post('admin/doUpdateAero',   'AdminController/doUpdateAero');
Router::get('admin/aeroUpdate',   'AdminController/aeroUpdate');

Router::get('admin/Funcionario', 'AdminController/Funcionarios');
Router::get('admin/funcioUpdate', 'AdminController/funcioUpdate');
Router::get('admin/doUpdateFuncio', 'AdminController/doUpdateFuncio');
Router::post('admin/doUpdateFuncio', 'AdminController/doUpdateFuncio');

//GestorVoo

Router::get('gestorvoo/index', 'GestorVooController/index');

//OpCheckIn

Router::get('opcheckin/index', 'OpCheckInController/index');






/************** End of URLEncoder Routing Rules ************************************/