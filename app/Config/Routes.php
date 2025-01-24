<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('mahasiswa', 'mahasiswa::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('/', 'Auth::index');
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->post('mahasiswa/update', 'Mahasiswa::update');
$routes->post('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->post('mahasiswa/cari', 'Mahasiswa::cari');
