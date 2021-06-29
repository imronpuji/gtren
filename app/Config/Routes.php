<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Commerce');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

 $routes->get('/', 'Product::commerce');
// $routes->get('cart', 'User::cart', ['filter' => 'login']);
$routes->get('account', 'User::account', ['filter' => 'login']);
$routes->get('orders', 'User::orders', ['filter' => 'login']);
$routes->get('tracking', 'User::tracking', ['filter' => 'login']);
$routes->get('address', 'User::address', ['filter' => 'login']);
$routes->get('profile', 'User::profile', ['filter' => 'login']);
$routes->get('upgrade', 'User::upgrade', ['filter' => 'login']);
$routes->post('upgrade', 'User::upgrade', ['filter' => 'login']);
// $routes->post('track', 'User::Track', ['filter' => 'login']);
// $routes->get('checkout', 'User::Checkout', ['filter' => 'login']);
$routes->get('contact', 'Commerce::Contact');
$routes->get('about', 'Commerce::About');
$routes->get('product/(:any)', 'Product::detail/$1');
$routes->post('updateproduk/(:any)', 'Product::update/$1');
$routes->get('products/delete_photo/(:num)/(:any)', 'Product::delete_photo/$1/$2');
$routes->get('products/delete_category/(:num)/(:any)', 'Product::delete_category/$1/$2');
// $routes->get('test', 'Testing::index');
// $routes->post('testfoto', 'Testing::testfoto');

// Bills
// $routes->get('bills', 'Bill::index');
// $routes->post('bills', 'Bill::index');
// $routes->get('bills/add', 'Bill::add');
// $routes->get('bills/edit/(:num)', 'Bill::edit/$1');
// $routes->post('bills/update/(:num)', 'Bill::update/$1');
// $routes->get('bills/delete/(:num)', 'Bill::delete/$1');



$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'AuthController::attemptReset');
});


// $routes->get('/login', 'Myth\Auth\Controllers\AuthController::login');
$routes->group('/auth', ['namespace' => 'Myth\Auth\Controllers'], function($routes) {

	$routes->get('login', 'Auth::login');
	$routes->get('register', 'Auth::register');
});

$routes->get('/dashboard', 'Dashboard::index');


$routes->group('', function($routes)
{
	// produk
	$routes->get('tambahproduk', 'Product::tambah_produk');
	$routes->post('tambahproduk', 'Product::save');
	$routes->get('saveproduk', 'Product::save');
	$routes->get('products/delete/(:num)', 'Product::delete/$1');
	$routes->get('products/edit/(:num)', 'Product::edit/$1');
	$routes->get('products', 'Product::index');
	$routes->post('products/search', 'Product::search');

	// kategori
 //    $routes->get('kategori/(:alpha)/(:num)', 'Admin::kategori/$1/$2');
	// $routes->get('kategori', 'Admin::kategori');
    $routes->get('category', 'Category::index');
    $routes->get('category/edit/(:num)', 'Category::edit/$1');
    // $routes->post('kategori/save', 'Category::save/$1');
    // $routes->get('kategori/edit/(:num)', 'Category::edit/$1');
    // $routes->resource('kategori', 'Category');

	// order
	$routes->get('order', 'Admin::order');
	$routes->get('orderdetail', 'Admin::order_detail');

	// member g-tren
	$routes->get('member', 'Member::index', ['as' => 'member']);
	$routes->post('member/search', 'Member::search');

}
);

$routes->group('', function($routes)
{
	$routes->get('tambahproduk', 'Finance::index');
	$routes->get('products', 'Product::index');

	// kategori
	$routes->get('kategori', 'Finance::kategori');

	

	// order
	$routes->get('order', 'Finance::order');
	$routes->get('orderdetail', 'Finance::order_detail');
}
);

$routes->group('', function($routes)
{
	$routes->get('tambahproduk', 'Stokis::index');
	$routes->get('produk', 'Stokis::produk_list');

	// kategori
	$routes->get('kategori', 'Stokis::kategori');

	// order
	$routes->get('order', 'Stokis::order');
	$routes->get('orderdetail', 'Stokis::order_detail');
}
);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
