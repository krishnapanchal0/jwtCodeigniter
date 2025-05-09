<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/auth/register', 'AuthController::showRegisterForm');
$routes->post('/auth/saveRegister', 'AuthController::saveRegister');
$routes->get('/auth/login', 'AuthController::showLoginForm');
$routes->post('/auth/doLogin', 'AuthController::doLogin');
