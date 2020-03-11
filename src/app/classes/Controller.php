<?php

namespace DSE\classes;

class Controller {

    public function returnJson(?array $array) : string {
        header('Content-Type: application/json');      
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        
        $status = false;
        $total = 0;
        if ($array !== null) {
            $status = true;
            $total = count($array);
        }
        return  json_encode([
            'status' => $status,
            'total' => $total,
            'records' => $array
        ]);
    }

    public function returnErrorJson(?array $array, \Exception $exception) : string {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Content-Type: application/json'); 
        $code = $exception->getCode() === 0 ? 400 : $exception->getCode();
        header('Access-control-Allow-Origin: *');      
        header('Content-Type: application/json', true , $code);      
        
        

        $status = false;
        $total = 0;
        return  json_encode([
            'status' => $status,
            'total' => $total,
            'parameters' => $array,
            'error' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ]);
    }
    

}