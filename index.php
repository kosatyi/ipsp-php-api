<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

define('IPSP_MERCHANT', 1396424 );
define('IPSP_PASSWORD', 'test' );
define('IPSP_GATEWAY', 'api.fondy.eu' );

Flight::register('client','Ipsp_Client', array(IPSP_MERCHANT,IPSP_PASSWORD,IPSP_GATEWAY) );
Flight::register('ipsp','Ipsp_Api',array( Flight::client() ));

Flight::map('notFound',array('\App\Route\Sandbox','error'));
Flight::route('/',array('\App\Route\Sandbox','index'));
Flight::route('/callback',array('\App\Route\Sandbox','callback'));
Flight::route('POST /sandbox/@method',array('\App\Route\Sandbox','sandbox'));
Flight::route('POST /test/@method',array('\App\Route\Sandbox','test'));

Flight::start();