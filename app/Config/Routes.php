<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/gallery', 'Gallery::index');
// $routes->get('/product', 'ProductCategory::index');
// $routes->get('/about', 'About::index');
// $routes->get('/contact', 'Contact::index');



// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/dashboard', 'Admin::index');

$routes->get('/admin/page_setting', 'Admin::page_setting');
$routes->get('/admin/system_setting', 'Admin::system_setting');

// Routes Slider
$routes->get('/admin/sliders', 'Admin::sliders');
$routes->post('/admin/status_sliders', 'Admin::status_sliders');
$routes->post('/admin/save_sliders', 'Admin::save_sliders');
$routes->post('/admin/delete_sliders', 'Admin::delete_sliders');

// Routes Kategori Produk
$routes->get('/admin/products', 'Admin::products');
$routes->get('/admin/delete_products/(:num)', 'Admin::delete_products/$1');
$routes->post('/admin/delete_products/(:num)', 'Admin::delete_products/$1');
$routes->get('/admin/editproducts/(:num)', 'Admin::editproducts/$1');
$routes->post('/admin/save_products', 'Admin::save_products', ['as' => 'admin.save_products']);
$routes->get('/admin/save_products', 'Admin::save_products', ['as' => 'admin.save_products']);
$routes->post('admin/update_products', 'Admin::update_products');
$routes->post('admin/product_products', 'Admin::product_products');
$routes->get('admin/update_products/(:num)', 'Admin::update_products/$1');
$routes->post('/admin/toggleIsPopular', 'Admin::toggleIsPopular');

// Routes Galeri
$routes->get('/admin/gallery', 'Admin::gallery');
$routes->post('/admin/status_gallery', 'Admin::status_gallery');
$routes->post('/admin/showhome_gallery', 'Admin::showhome_gallery');
$routes->get('/admin/save_gallery', 'Admin::save_gallery');
$routes->post('/admin/save_gallery', 'Admin::save_gallery');
$routes->post('/admin/delete_gallery', 'Admin::delete_gallery');

// Page setting
$routes->get('/admin/page-setting', 'Admin::page_setting');
$routes->get('/admin/add_page_setting', 'Admin::add_page_setting');
$routes->post('/admin/add_page_setting', 'Admin::add_page_setting');
$routes->get('/admin/edit_page_setting/(:num)', 'Admin::edit_page_setting/$1');
$routes->post('/admin/edit_page_setting/(:num)', 'Admin::edit_page_setting/$1');
$routes->get('/admin/delete_page_setting/(:num)', 'Admin::delete_page_setting/$1');
$routes->post('/admin/delete_page_setting/(:num)', 'Admin::delete_page_setting/$1');
// $routes->post('admin/update_page_setting/(:num)', 'Admin::update_page_setting/$1');
$routes->post('/admin/update_page_setting', 'Admin::update_page_setting');
$routes->post('admin/upload_image', 'Admin::upload_image');



// System Setting
$routes->get('/admin/update_system_setting', 'Admin::update_system_setting');
$routes->post('/admin/update_system_setting', 'Admin::update_system_setting');
$routes->post('/admin/system_setting', 'Admin::system_setting');
$routes->get('/admin/upload_favicon_logo', 'Admin::upload_favicon_logo');
$routes->post('/admin/upload_favicon_logo', 'Admin::upload_favicon_logo');
