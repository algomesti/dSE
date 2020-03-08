<?php

namespace DSE\models;

class Product {

    public function __construct() {
        
    }

    public function list($parameters) {
        echo "MODEL LIST";
        print_r($parameters);
    }

    public function view($parameters) {
        echo "MODEL VIEW";
        print_r($parameters);
    }

}