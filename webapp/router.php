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
Router::get('/',         'HomeController/index');
Router::get('home/',      'HomeController/index');
Router::get('home/index',  'HomeController/index');
Router::get('home/start',  'HomeController/start');
// Login
Router::get('home/login',  'LoginController/doLogin');
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
Router::post('admin/aeroportosAdd',   'AdminController/aeroportosAdd');
Router::get('admin/doUpdateAero',   'AdminController/doUpdateAero');
Router::post('admin/doUpdateAero',   'AdminController/doUpdateAero');
Router::get('admin/aeroUpdate',   'AdminController/aeroUpdate');
Router::get('admin/AeroEliminar',   'AdminController/AeroEliminar');
Router::get('admin/Funcionario', 'AdminController/Funcionarios');
Router::get('admin/funcioUpdate', 'AdminController/funcioUpdate');
Router::get('admin/doUpdateFuncio', 'AdminController/doUpdateFuncio');
Router::post('admin/doUpdateFuncio', 'AdminController/doUpdateFuncio');
Router::get('admin/funcionarioForm', 'AdminController/funcionarioForm');
Router::post('admin/funcioAdd', 'AdminController/funcioAdd');
Router::get('admin/funcioAdd', 'AdminController/funcioAdd');
Router::get('admin/funcioEliminar', 'AdminController/funcioEliminar');

//GestorVoo
Router::get('gestorvoo/index', 'GestorVooController/index');
Router::get('gestorvoo/gestaoVoos', 'GestorVooController/GestaoVoos');
Router::get('gestorvoo/getVoosForm',   'GestorVooController/getVoosForm');
Router::post('gestorvoo/voosAdd',   'GestorVooController/voosAdd');
Router::get('gestorvoo/doUpdatevoos',   'GestorVooController/doUpdatevoos');
Router::post('gestorvoo/doUpdatevoos',   'GestorVooController/doUpdatevoos');
Router::get('gestorvoo/voosUpdate',   'GestorVooController/voosUpdate');
Router::get('gestorvoo/voosEliminar',   'GestorVooController/voosEliminar');
Router::get('gestorvoo/gestaoAviao', 'GestorVooController/gestaoAviao');
Router::get('gestorvoo/getAviaoForm', 'GestorVooController/getAviaoForm');
Router::post('gestorvoo/aviaoAdd',   'GestorVooController/aviaoAdd');
Router::get('gestorvoo/aviaoEliminar',   'GestorVooController/aviaoEliminar');
Router::get('gestorvoo/doUpdateAviao',   'GestorVooController/doUpdateAviao');
Router::post('gestorvoo/doUpdateAviao',   'GestorVooController/doUpdateAviao');
Router::get('gestorvoo/aviaoUpdate',   'GestorVooController/aviaoUpdate');
Router::get('gestorvoo/gestaoEscalas', 'GestorVooController/gestaoEscalas');
Router::get('gestorvoo/getEscalaForm', 'GestorVooController/getEscalaForm');
Router::post('gestorvoo/escalaAdd', 'GestorVooController/escalaAdd');
Router::get('gestorvoo/escalaUpdate', 'GestorVooController/escalaUpdate');
Router::get('gestorvoo/doUpdateEscala', 'GestorVooController/doUpdateEscala');
Router::post('gestorvoo/doUpdateEscala', 'GestorVooController/doUpdateEscala');

//OpCheckIn
Router::get('opcheckin/index', 'OpCheckInController/index');

//OpMarketing
Router::get('opmarketing/index', 'OpMarketingController/index');

/************** End of URLEncoder Routing Rules ************************************/
