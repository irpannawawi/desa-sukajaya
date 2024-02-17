<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['informasi'] = 'home/information';
// public surat domisili
$route['public/surat_domisili'] = 'public/domisili_controller/index';
$route['public/add_surat_domisili'] = 'public/domisili_controller/store';

// keterangan usaha
$route['public/surat_keterangan_usaha'] = 'public/keterangan_usaha_controller/index';
$route['public/add_surat_keterangan_usaha'] = 'public/keterangan_usaha_controller/store';

// AUTHENTICATING
$route['login'] = 'authenticate/login';
$route['act_login'] = 'authenticate/act_login';

$route['logout'] = 'authenticate/logout';

$route['register'] = 'authenticate/register';
$route['register_member'] = 'authenticate/register_member';
$route['act_register'] = 'authenticate/act_register';

// ADMIN
$route['admin'] = 'admin/dashboard/index';

// master data admin
$route['admin/admin'] = 'admin/admin_controller/index';
$route['admin/add_admin'] = 'admin/admin_controller/store';
$route['admin/edit_admin'] = 'admin/admin_controller/update';
$route['admin/delete/(:num)'] = 'admin/admin_controller/delete/$1';

// master data masyarakat
$route['admin/masyarakat'] = 'admin/masyarakat_controller/index';
$route['admin/add_masyarakat'] = 'admin/masyarakat_controller/store';
$route['admin/masyarakat/(:num)'] = 'admin/masyarakat_controller/edit/$1';
$route['admin/masyarakat/update'] = 'admin/masyarakat_controller/update';
$route['admin/masyarakat/delete/(:num)'] = 'admin/masyarakat_controller/delete/$1';
$route['check_nik'] = 'Check/check_nik';



// SURAT-SURAT
// kematian
$route['admin/surat_kematian'] = 'admin/kematian_controller/index';
$route['admin/add_surat_kematian'] = 'admin/kematian_controller/store';
$route['admin/surat_kematian/(:num)'] = 'admin/kematian_controller/edit/$1';
$route['admin/surat_kematian/edit'] = 'admin/kematian_controller/update';
$route['admin/surat_kematian/delete/(:num)'] = 'admin/kematian_controller/delete/$1';
$route['admin/surat_kematian/status/terima/(:num)'] = 'admin/kematian_controller/terima/$1';
$route['admin/surat_kematian/status/tolak/(:num)'] = 'admin/kematian_controller/tolak/$1';

// domisili
$route['admin/surat_domisili'] = 'admin/domisili_controller/index';
$route['admin/add_surat_domisili'] = 'admin/domisili_controller/store';
$route['admin/surat_domisili/(:num)'] = 'admin/domisili_controller/edit/$1';
$route['admin/surat_domisili/edit'] = 'admin/domisili_controller/update';
$route['admin/surat_domisili/delete/(:num)'] = 'admin/domisili_controller/delete/$1';
$route['admin/surat_domisili/status/terima/(:num)'] = 'admin/domisili_controller/terima/$1';
$route['admin/surat_domisili/status/tolak/(:num)'] = 'admin/domisili_controller/tolak/$1';


// kelakuan baik
$route['admin/surat_kelakuan_baik'] = 'admin/kelakuan_baik_controller/index';
$route['admin/add_surat_kelakuan_baik'] = 'admin/kelakuan_baik_controller/store';
$route['admin/surat_kelakuan_baik/(:num)'] = 'admin/kelakuan_baik_controller/edit/$1';
$route['admin/surat_kelakuan_baik/edit'] = 'admin/kelakuan_baik_controller/update';
$route['admin/surat_kelakuan_baik/delete/(:num)'] = 'admin/kelakuan_baik_controller/delete/$1';
$route['admin/surat_kelakuan_baik/status/terima/(:num)'] = 'admin/kelakuan_baik_controller/terima/$1';
$route['admin/surat_kelakuan_baik/status/tolak/(:num)'] = 'admin/kelakuan_baik_controller/tolak/$1';

// keterangan usaha
$route['admin/surat_keterangan_usaha'] = 'admin/keterangan_usaha_controller/index';
$route['admin/add_surat_keterangan_usaha'] = 'admin/keterangan_usaha_controller/store';
$route['admin/surat_keterangan_usaha/(:num)'] = 'admin/keterangan_usaha_controller/edit/$1';
$route['admin/surat_keterangan_usaha/edit'] = 'admin/keterangan_usaha_controller/update';
$route['admin/surat_keterangan_usaha/delete/(:num)'] = 'admin/keterangan_usaha_controller/delete/$1';
$route['admin/surat_keterangan_usaha/status/terima/(:num)'] = 'admin/keterangan_usaha_controller/terima/$1';
$route['admin/surat_keterangan_usaha/status/tolak/(:num)'] = 'admin/keterangan_usaha_controller/tolak/$1';

// EXPORT / DOWNLOAD SURAT
$route['download/surat_kematian/(:num)'] = 'Exporter_controller/surat_kematian/$1';
$route['download/surat_domisili/(:num)'] = 'Exporter_controller/surat_domisili/$1';
$route['download/surat_kelakuan_baik/(:num)'] = 'Exporter_controller/surat_kelakuan_baik/$1';
$route['download/surat_keterangan_usaha/(:num)'] = 'Exporter_controller/surat_keterangan_usaha/$1';


// PENGGUNA
$route['pengguna'] = 'pengguna/dashboard/index';

// keluarga 
$route['pengguna/masyarakat'] = 'pengguna/masyarakat_controller/index';

// SURAT-SURAT
// kematian
$route['pengguna/surat_kematian'] = 'pengguna/kematian_controller/index';
$route['pengguna/add_surat_kematian'] = 'pengguna/kematian_controller/store';
$route['pengguna/surat_kematian/(:num)'] = 'pengguna/kematian_controller/edit/$1';
$route['pengguna/surat_kematian/edit'] = 'pengguna/kematian_controller/update';
$route['pengguna/surat_kematian/delete/(:num)'] = 'pengguna/kematian_controller/delete/$1';

// domisili
$route['pengguna/surat_domisili'] = 'pengguna/domisili_controller/index';
$route['pengguna/add_surat_domisili'] = 'pengguna/domisili_controller/store';
$route['pengguna/surat_domisili/(:num)'] = 'pengguna/domisili_controller/edit/$1';
$route['pengguna/surat_domisili/edit'] = 'pengguna/domisili_controller/update';
$route['pengguna/surat_domisili/delete/(:num)'] = 'pengguna/domisili_controller/delete/$1';


// kelakuan baik
$route['pengguna/surat_kelakuan_baik'] = 'pengguna/kelakuan_baik_controller/index';
$route['pengguna/add_surat_kelakuan_baik'] = 'pengguna/kelakuan_baik_controller/store';
$route['pengguna/surat_kelakuan_baik/(:num)'] = 'pengguna/kelakuan_baik_controller/edit/$1';
$route['pengguna/surat_kelakuan_baik/edit'] = 'pengguna/kelakuan_baik_controller/update';
$route['pengguna/surat_kelakuan_baik/delete/(:num)'] = 'pengguna/kelakuan_baik_controller/delete/$1';


// keterangan usaha
$route['pengguna/surat_keterangan_usaha'] = 'pengguna/keterangan_usaha_controller/index';
$route['pengguna/add_surat_keterangan_usaha'] = 'pengguna/keterangan_usaha_controller/store';
$route['pengguna/surat_keterangan_usaha/(:num)'] = 'pengguna/keterangan_usaha_controller/edit/$1';
$route['pengguna/surat_keterangan_usaha/edit'] = 'pengguna/keterangan_usaha_controller/update';
$route['pengguna/surat_keterangan_usaha/delete/(:num)'] = 'pengguna/keterangan_usaha_controller/delete/$1';

