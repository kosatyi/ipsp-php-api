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

    public static function sandbox( $method ){
        $request  = Flight::request();
        $params   = $request->data->getData();
        $response = Flight::ipsp()->call($method,$params)->getResponse();
        if($response->isFailure()){
            Flight::json(array(
                'error'=>$response->getErrorCode() ,
                'message'=>$response->getErrorMessage()
            ));
        }
        else if($response->isSuccess()){
            Flight::json(array('test'));
        }
    }

    public static function example(){
        $request  = Flight::request();
        Flight::render('index',array());
    }
    public static function callback(){
        $request  = Flight::request();
        Flight::json($request->data->getData());
    }

    public static function error(){
        Flight::json(array('error'=>404),404);
    }
}