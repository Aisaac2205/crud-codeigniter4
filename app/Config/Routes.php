<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AlumnoController::index');

// Rutas para Alumnos
$routes->get('/alumnos', 'AlumnoController::index');
$routes->get('/alumnos/create', 'AlumnoController::create');
$routes->post('/alumnos/store', 'AlumnoController::store');
$routes->get('/alumnos/edit/(:num)', 'AlumnoController::edit/$1');
$routes->post('/alumnos/update/(:num)', 'AlumnoController::update/$1');
$routes->post('/alumnos/delete/(:num)', 'AlumnoController::delete/$1');

// Rutas para Cursos
$routes->get('/cursos', 'CursoController::index');
$routes->get('/cursos/create', 'CursoController::create');
$routes->post('/cursos/store', 'CursoController::store');
$routes->get('/cursos/edit/(:num)', 'CursoController::edit/$1');
$routes->post('/cursos/update/(:num)', 'CursoController::update/$1');
$routes->post('/cursos/delete/(:num)', 'CursoController::delete/$1');

// Rutas para Asignaciones
$routes->get('/asignacion/getCursosDisponibles/(:num)', 'AsignacionController::getCursosDisponibles/$1');
$routes->get('/asignacion/getCursosAsignados/(:num)', 'AsignacionController::getCursosAsignados/$1');
$routes->post('/asignacion/asignarCurso', 'AsignacionController::asignarCurso');
$routes->post('/asignacion/desasignarCurso', 'AsignacionController::desasignarCurso');