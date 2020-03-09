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
    

}