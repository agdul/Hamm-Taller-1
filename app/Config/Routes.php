<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes ->group("/", ['filter'=> 'auth_adm'], function($routes){
    //RUTAS PANEL USUARIO
    $routes->get('/panel_usuarios', 'Usuario_controller::panel_usuarios');
    $routes->post('/panel_usuarios', 'Usuario_controller::panel_usuarios');
    
    $routes->get('/editar_user', 'Usuario_controller::editar_user');
    $routes->post('/editar_user', 'Usuario_controller::editar_user');
    $routes->get('/actualizar_user', 'Usuario_controller::actualizar_user');
    $routes->post('/actualizar_user', 'Usuario_controller::actualizar_user');
    $routes->get('/eliminar_user', 'Usuario_controller::eliminar_user');
    $routes->get('/restaurar_user', 'Usuario_controller::restaurar_user');
    $routes->get('/eliminados_usuario', 'Usuario_controller::eliminados_user');
    
    $routes->get('/add_usuario', 'Usuario_controller::add_usuario');
    $routes->post('/add_usuario', 'Usuario_controller::add_usuario');

    //RUTAS PANEL PRODUCTOS
    $routes->get('/panel_productos', 'Producto_controller::panel_productos');
    $routes->post('/panel_productos', 'Producto_controller::panel_productos');
    
    $routes->get('/add_producto', 'Producto_controller::add_producto');
    $routes->post('/add_producto', 'Producto_controller::add_producto');
    
    $routes->get('/editar_producto', 'Producto_controller::editar_producto');
    
    $routes->get('/insertar_producto', 'Producto_controller::insertar_producto'); 
    $routes->post('/insertar_producto', 'Producto_controller::insertar_producto');
    
    $routes->get('/eliminar_producto', 'Producto_controller::eliminar_producto');
    $routes->get('/no_stock_productos', 'Producto_controller::no_stock_productos');
    $routes->get('/restaurar_producto', 'Producto_controller::restaurar_producto');
    
    
    $routes->get('/actualizar_producto', 'Producto_controller::actualizar_producto');
    $routes->post('/actualizar_producto', 'Producto_controller::actualizar_producto');
});


$routes ->group("/", ['filter'=> 'auth'], function($routes){
    $routes->get('dashboard', 'Usuario_controller::dashboard');
    $routes->get('dashboard_usuario', 'Usuario_controller::dashboard_usuario');
    $routes->get('logout', 'Usuario_controller::logout');
    $routes->get('/ver_carrito', 'Carrito_controller::ver_carrito');
    $routes->post('/ver_carrito', 'Carrito_controller::ver_carrito');
    //$routes->post('/vaciar_carrito', 'Carrito_controller::vaciar_carrito');
    $routes->get('/vaciar_carrito', 'Carrito_controller::vaciar_carrito');
    
    $routes->get('/eliminar_producto_carrito', 'Carrito_controller::eliminar_producto_carrito');
    $routes->post('/eliminar_carrito', 'Carrito_controller::eliminar_carrito');

    $routes->get('/quienes_somos_user', 'Usuario_controller::quienes_somos_user');
    $routes->get('/comercializacion_user', 'Usuario_controller::comercializacion_user');
    $routes->get('/terminosyusos_user', 'Usuario_controller::terminosyusos_user');
    $routes->get('/contacto_user', 'Usuario_controller::contacto_user');
    $routes->post('/contacto_user', 'Usuario_controller::contacto_user');

    $routes->get('/ver_carrito', 'Carrito_controller::ver_carrito');
    $routes->post('/ver_carrito', 'Carrito_controller::ver_carrito');

    $routes->get('/comprar', 'Ventas_controller::comprar');
    $routes->post('/comprar', 'Ventas_controller::comprar');
});

$routes->get('/', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/pedi_ya', 'Producto_controller::mostrar_productos');

$routes->get('/contacto', 'Home::contacto');
$routes->get('/loggin', 'Home::loggin');

$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminosyusos', 'Home::terminosyusos');


$routes->get('/registrarse', 'Usuario_controller::create');
$routes->post('/registrarse', 'Usuario_controller::formValidation');
/*$routes->post('/registrarse', 'Usuario_controller::formValidation');*/


//$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);

$routes->get('/loggin', 'Usuario_controller::auth');
$routes->post('/loggin', 'Usuario_controller::auth');

$routes->get('/inicio', 'Home::inicio');
$routes->get('/logout', 'Usuario_controller::logout');






//////////////////////////////////////////////////////////////PRUEBA//////////////////////////////
$routes->get('register', 'Usuario_controller::register');
$routes->post('register', 'Usuario_controller::create');
$routes->get('login', 'Usuario_controller::login');
$routes->post('login', 'Usuario_controller::loginValidate');

/////////////////////////////////////////////////////////////////////////////////////////////////////////

// $routes->get('/add_usuario', 'Usuario_controller::add_usuario');
// $routes->post('/add_usuario', 'Usuario_controller::add_usuario');



//////////////////////////////////////////
//$routes->get('/agregar_carrito', 'Carrito_controller::agregar_carrito');
//$routes->post('/agregar_carrito', 'Carrito_controller::agregar_carrito');

 $routes->get('/agregar_consulta', 'Consulta_controller::agregar_consulta');
 $routes->post('/agregar_consulta', 'Consulta_controller::agregar_consulta');

 $routes->get('/consultas', 'Consulta_controller::ver_consulta');
 $routes->post('/consultas', 'Consulta_controller::ver_consulta');

 $routes->post('/consultas_constestado', 'Consulta_controller::contestar_consulta');
 $routes->get('/consultas_constestado', 'Consulta_controller::contestar_consulta');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 


 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
