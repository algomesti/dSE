<?php

namespace DSE\models;

use DSE\library\Db;

class ProductType {

    private $db;

    private $fields = [
        'title' => 'string',
        'description' => 'string',
        'tax' => 'float'
    ];

    private $required = [
        'title',
        'tax'
    ];

    public function __construct() {
        $this->db = new Db();
    }

    public function list() : ?array {      
        return  $this->db->list('product_type');
    }

    public function view(int $id) : ?array {
        $return =  $this->db->view('product_type', $id, 'id_product_type');
        if (empty($return)) {
            throw new \Exception("Tipo de produto não existe", 404);
        }
        return $return;
    }

    public function delete(int $id) : ?array {
        $return =  $this->db->delete('product_type', $id, 'id_product_type');
        if(null === $return) {
            throw new \Exception("Tipo de produto não existe", 404);
        }
        return $return;
    }

    public function insert(array $productType) : ?array {
        $this->validFields($productType);
        $this->validFieldsRequired($productType);
        $productType = $this->formatFields($productType);
        $return = $this->db->insert('product_type', array_keys($productType), array_values($productType), 'id_product_type');
        return $return[0] ?? false;
    }

    public function edit(int $id, array $productType) :?array {
        $this->validFields($productType);
        $productType = $this->formatFields($productType);
        $return = $this->db->edit($id, 'product_type', array_keys($productType), array_values($productType), 'id_product_type');
        if (empty($return)) {
            throw new \Exception("Tipo de produto não existe", 404);
        }
        return $return[0];
    }

    private function validFields(array $productType) : void {
        
        if (count($productType) === 0) {
            throw new \Exception('Nenhum dado a ser alterado', 422);
        }
        foreach ($productType as $field => $value) {
            if (false === in_array($field, array_keys($this->fields))) {
                throw new \Exception("Campo $field não é valido! ", 422);    
            }
        }
    }

    private function validFieldsRequired(array $productType) : void {
        
        foreach ($this->required as $required) {
            if (false === in_array($required, array_keys($productType))) {
                throw new \Exception("Campo $required obrigatório", 404);
            }
        }
    }

    private function formatFields($productType) : array {
        $return = [];
        foreach ($productType as $field => $value) {
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

}