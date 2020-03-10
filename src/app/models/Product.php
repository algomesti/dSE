<?php

namespace DSE\models;

use DSE\library\Db;
use DSE\models\ProductType;

class Product {

    private $db;

    private $fields = [
        'id_product_type' => 'int',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float'
    ];

    private $required = [
        'id_product_type',
        'name',
        'price'
    ];

    public function __construct() {
        $this->db = new Db();
    }

    public function list() : ?array {      
        return  $this->db->list('product');
    }

    public function view(int $id) : ?array {
        $return =  $this->db->view('product', $id, 'id_product');
        if (empty($return)) {
            throw new \Exception("Produto não existe", 404);
        }
        return $return;
    }

    public function delete(int $id) : ?array {
        $return =  $this->db->delete('product', $id, 'id_product');
        if(null === $return) {
            throw new \Exception("Produto não existe", 404);
        }
        return $return;
    }

    public function insert(array $product) : ?array {
        $this->validFields($product);
        $this->validFieldsRequired($product);
        $this->checkProductTypeExists($product['id_product_type']);
        $product = $this->formatFields($product);
        $return = $this->db->insert('product', array_keys($product), array_values($product), 'id_product');
        return $return[0] ?? false;
    }

    public function edit(int $id, array $product) :?array {
        $this->validFields($product);
        if (true === isset($product['id_product_type'])) {
            $this->checkProductTypeExists($product['id_product_type']);
        }
        $product = $this->formatFields($product);
        $return = $this->db->edit($id, 'product', array_keys($product), array_values($product), 'id_product');
        if (empty($return)) {
            throw new \Exception("Produto não existe", 404);
        }
        return $return[0];
    }

    private function validFields(array $product) : void {
        
        if (count($product) === 0) {
            throw new \Exception('Nenhum dado a ser alterado', 422);
        }
        foreach ($product as $field => $value) {
            if (false === in_array($field, array_keys($this->fields))) {
                throw new \Exception("Campo $field não é valido! ", 422);    
            }
        }
    }

    private function validFieldsRequired(array $product) : void {
        
        foreach ($this->required as $required) {
            if (false === in_array($required, array_keys($product))) {
                throw new \Exception("Campo $required obrigatório", 404);
            }
        }
    }

    private function formatFields($product) : array {
        $return = [];
        foreach ($product as $field => $value) {
            switch ($this->fields[$field]) {
                case 'int':
                    $return[$field] = (int) $value;
                    break;
                case 'string':
                    $return[$field] = "\"$value\"";
                    break;
                case 'float':
                    $return[$field] = (float) $value;
                    break;
            } 
        }
        return $return;
    }

    private function checkProductTypeExists(int $id_product_type) : void {
        (new ProductType())->view($id_product_type);
    }


}