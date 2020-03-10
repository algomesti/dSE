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
            ],'/product_type' => [
                'DSE\controllers\ProductType',
                'list'
            ],
            '/product_type/{{id}}'=>[
                'DSE\controllers\ProductType',
                'view'
            ],
            '/sale'=>[
                'DSE\controllers\Sale',
                'list'
            ],
            '/sale/{{id}}'=>[
                'DSE\controllers\Sale',
                'view'
            ]
        ],
        'PUT' => [
            '/product/{{id}}'=> [
                'DSE\controllers\Product',
                'edit'
            ],
            '/product_type/{{id}}'=> [
                'DSE\controllers\ProductType',
                'edit'
            ],
            '/sale/{{id}}'=> [
                'DSE\controllers\Sale',
                'edit'
            ]
        ],
        'POST' => [
            '/product'=> [
                'DSE\controllers\Product',
                'insert'
            ],
            '/product_type'=> [
                'DSE\controllers\ProductType',
                'insert'
            ],
            '/sale'=> [
                'DSE\controllers\Sale',
                'insert'
            ]
        ],
        'DELETE' => [
            '/product/{{id}}'=>[
                'DSE\controllers\Product',
                'delete'
            ],
            '/product_type/{{id}}'=>[
                'DSE\controllers\ProductType',
                'delete'
            ],
            '/sale/{{id}}'=>[
                'DSE\controllers\Sale',
                'delete'
            ]
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