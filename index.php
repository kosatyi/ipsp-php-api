<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'vendor/autoload.php';

define('IPSP_MERCHANT', 1396424 );
define('IPSP_PASSWORD', 'test' );
define('IPSP_GATEWAY', 'api.fondy.eu' );

Flight::register('client','Ipsp_Client', array(IPSP_GATEWAY,IPSP_PASSWORD,IPSP_MERCHANT) );
Flight::register('ipsp','Ipsp_Api',array( Flight::client() ));

Flight::map('notFound',array('\App\Route\Sandbox','error'));
Flight::route('/',array('\App\Route\Sandbox','index'));
Flight::route('/example',array('\App\Route\Sandbox','example'));
Flight::route('/callback',array('\App\Route\Sandbox','callback'));
Flight::route('POST /sandbox/@method',array('\App\Route\Sandbox','sandbox'));

Flight::start();