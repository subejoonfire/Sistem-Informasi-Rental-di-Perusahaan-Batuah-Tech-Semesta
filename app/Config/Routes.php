<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route Authenticating Account
$routes->group('', static function ($routes) {
    $routes->get('/login', 'Authenticating::index'); // index as login
    $routes->post('/auth', 'Authenticating::auth');
    $routes->get('/register', 'Authenticating::register');
    $routes->post('/register/store', 'Authenticating::store');
});

// Route For Free User
$routes->get('/rent', 'PenyewaRental::index');
$routes->get('/rentbusana', 'PenyewaRental::dataBusana');
$routes->get('/setRental/(:num)', 'PenyewaRental::setRental/$1');
$routes->post('/rentAction/(:num)', 'PenyewaRental::rentAction/$1');


// Route Needed Authenticated
$routes->group('', ['filter' => 'Auth'], static function ($routes) {
    $routes->get('/logout', 'Authenticating::logout');

    // Authenticated Admin
    $routes->group('', ['filter' => 'Admin'], static function ($routes) {
        $routes->get('/', 'Home::index');

        $routes->group('/user', static function ($routes) {
            $routes->get('', 'Users::index');
            $routes->get('create', 'Users::create');
            $routes->post('', 'Users::store');
            $routes->get('(:num)', 'Users::edit/$1');
            $routes->put('(:num)', 'Users::update/$1');
            $routes->delete('(:num)', 'Users::destroy/$1');
        });

        $routes->group('/busana', static function ($routes) {
            $routes->get('', 'Busana::index');
            $routes->get('create', 'Busana::create');
            $routes->get('detail/(:num)', 'Busana::detail/$1');
            $routes->post('', 'Busana::store');
            $routes->put('(:num)', 'Busana::update/$1');
            $routes->delete('(:num)', 'Busana::delete/$1');
        });

        $routes->group('/paket', static function ($routes) {
            $routes->get('', 'Paket::index');
            $routes->get('edit/(:num)', 'Paket::edit/$1');
            $routes->get('create', 'Paket::create');
            $routes->post('setPaket/(:num)', 'Paket::setPaket/$1');
            $routes->post('store', 'Paket::store');
            $routes->delete('(:num)', 'Paket::delete/$1');
        });

        $routes->group('/fotobusana', static function ($routes) {
            $routes->post('(:num)', 'FotoBusana::store/$1');
            $routes->delete('(:num)', 'FotoBusana::delete/$1');
        });

        $routes->group('/ukuran', static function ($routes) {
            $routes->post('(:num)', 'Ukuran::store/$1');
            $routes->delete('(:num)', 'Ukuran::delete/$1');
        });

        $routes->group('/jenis', static function ($routes) {
            $routes->get('', 'JenisBusana::index');
            $routes->get('create', 'JenisBusana::create');
            $routes->post('store', 'JenisBusana::store');

            $routes->post('setJenisBusana/(:num)', 'JenisBusana::setJenisBusana/$1');
            $routes->get('(:num)', 'JenisBusana::edit/$1');
            $routes->put('(:num)', 'JenisBusana::update/$1');
            $routes->delete('(:num)', 'JenisBusana::delete/$1');
        });

        $routes->get('dapur', 'Dapur::index');
        $routes->get('dapur/create', 'Dapur::create');
        $routes->post('dapur/store', 'Dapur::store');
        $routes->post('dapur/setDapur/(:num)', 'Dapur::setDapur/$1');
        $routes->get('dapur/edit/(:segment)', 'Dapur::edit/$1');
        $routes->delete('dapur/(:segment)', 'Dapur::delete/$1');

        $routes->get('voucher', 'Voucher::index');
        $routes->get('voucher/create', 'Voucher::create');
        $routes->post('voucher/store', 'Voucher::store');
        $routes->get('voucher/edit/(:segment)', 'Voucher::edit/$1');
        $routes->post('voucher/setVoucher/(:segment)', 'Voucher::setVoucher/$1');
        $routes->delete('voucher/(:segment)', 'Voucher::delete/$1');

        $routes->get('pesanan', 'Pesanan::index');
        $routes->get('pesanan/create', 'Pesanan::create');
        $routes->post('pesanan/store', 'Pesanan::store');
        $routes->get('pesanan/edit/(:segment)', 'Pesanan::edit/$1');
        $routes->delete('pesanan/(:segment)', 'Pesanan::delete/$1');
        $routes->post('pesanan/setPesanan/(:segment)', 'Pesanan::setPesanan/$1');

        $routes->get('review', 'Review::index');
        $routes->get('review/create', 'Review::create');
        $routes->post('review/store', 'Review::store');
        $routes->get('review/edit/(:segment)', 'Review::edit/$1');
    });
});
