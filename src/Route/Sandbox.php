<?php

namespace App\Route;

use \Flight as Flight;

class Sandbox {
    public static function index(){
        $request  = Flight::request();
        $response = $request->data->getData();
        Flight::json(array(
            'message'  => 'IPSP PHP Sandbox',
            'response' => $response
        ),200);
    }
    public static function sandbox($method){
        $request  = Flight::request();
        $response = Flight::ipsp()->call($method,$request->data->getData());
        Flight::json(
            $response->getResponse()->getData()
        );
    }
    public static function error(){
        Flight::json(array('error'=>404),404);
    }
}