<?php

namespace DSE\classes;

class RouterFunctions {
    
    private $args = [];
    
    private $routes = [
        'GET' => [
            '/' => [
                'DSE\controllers\Product',
                'list'
            ],
            '/product' => [
                'DSE\controllers\Product',
                'list'
            ],
            '/product/{{id}}'=>[
                'DSE\controllers\Product',
                'view'
            ],
            '/product_type' => 'productTypeList',
            '/product_type/{{id}}'=>'productTypeView',
            '/stock' => 'stockList',
            '/stock/{{id}}'=>'stockView',
            '/sale' => 'saleList',
            '/sale/{{id}}'=>'saleView',
        ],
        'PUT' => [
            '/product/{{id}}'=>'productEdit',
            '/product_type/{{id}}'=>'productTypeEdit',
            '/stock/{{id}}'=>'stockEdit',
            '/sale/{{id}}'=>'saleEdit',
        ],
        'POST' => [
            '/product'=> [
                'DSE\controllers\Product',
                'insert'
            ],
            'productInsert',
            '/product_type'=>'productTypeInsert',
            '/stock'=>'stockInsert',
            '/sale'=>'saleInsert',
        ],
        'DELETE' => [
            '/product/{{id}}'=>[
                'DSE\controllers\Product',
                'delete'
            ],
            '/product_type/{{id}}'=>'productTypeRemove',
            '/stock/{{id}}'=>'stockRemove',
            '/sale/{{id}}'=>'saleRemove',
        ]
    ];

    public function getFunction(string $verb, string $route) : ?array {
        return $this->routes[strtoupper($verb)][$route] ?? null;
    }

    public function setArg($arg) {
        $this->args[] = $arg;
    }

    public function getArgs() {
        return $this->args;
    }
}