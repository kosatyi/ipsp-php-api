<?php

namespace App\Route;

use \Flight as Flight;

use \App\Utils\Signature as Signature;

class Sandbox {

    public static function index(){
        $request  = Flight::request();
        Flight::render('index',array());
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
            Flight::json($response->getData());
        }
    }

    public static function test( $method ){
        $request  = Flight::request();
        $params   = $request->data->getData();
        $client   = new \Ipsp_Client($params['merchant']['id'],$params['merchant']['key'],'api.fondy.eu');
        $ipsp     = new \Ipsp_Api($client);
        $data     = array_merge(array(
            'order_desc'          => 'IPSP PHP Sandbox Test',
            'response_url'        => 'https://api.ipsp-php.com/callback',
            'server_callback_url' => 'https://api.ipsp-php.com/callback'
        ),$params['request']);
        $response = $ipsp->call($method,$data)->getResponse();
        if($response->isFailure()){
            Flight::json(array(
                'error'=>$response->getErrorCode() ,
                'message'=>$response->getErrorMessage()
            ));
        }
        else if($response->isSuccess()){
            Flight::json($response->getData());
        }
    }

    public static function example(){
        $request  = Flight::request();
        Flight::render('index',array());
    }
    public static function callback(){
        $request  = Flight::request();
        Signature::merchant(1396424);
        Signature::password('test');
        file_put_contents('/tmp/response.txt', json_encode($request->data->getData(),JSON_PRETTY_PRINT) , FILE_APPEND | LOCK_EX);
    }

    public static function error(){
        Flight::json(array('error'=>404),404);
    }
}