<?php

require 'vendor/autoload.php';

Flight::register('client','Ipsp_Client', array(1396424,'test','api.fondy.eu') );
Flight::register('ipsp','Ipsp_Api',array( Flight::client() ));

Flight::map('notFound',array('\App\Route\Sandbox','error'));
Flight::route('/',array('\App\Route\Sandbox','index'));
Flight::route('/sandbox/@method', array('\App\Route\Sandbox','sandbox'));

Flight::start();