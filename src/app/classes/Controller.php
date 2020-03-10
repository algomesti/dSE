<?php

namespace DSE\classes;

class Controller {

    public function returnJson(?array $array) : string {
        header('Content-Type: application/json');      
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
        $code = $exception->getCode() === 0 ? 400 : $exception->getCode();
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