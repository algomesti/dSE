<?php

namespace DSE\models;

use DSE\library\Db;
use DSE\models\Product;
use DSE\models\ProductType;
class Sale {

    private $db;

    private $fields = [
        'id_product' => 'int',
        'unity_value' => 'float',
        'quantity' => 'int'
    ];

    private $required = [
        'id_product',
        'unity_value',
        'quantity'
    ];

    public function __construct() {
        $this->db = new Db();
    }

    public function list() : ?array {      
        return  $this->db->list('Sale');
    }

    public function view(int $id) : ?array {
        $return =  $this->db->view('Sale', $id, 'id_sale');
        if (empty($return)) {
            throw new \Exception("Venda não existe", 404);
        }
        return $return;
    }

    public function delete(int $id) : ?array {
        $return =  $this->db->delete('Sale', $id, 'id_sale');
        if(null === $return) {
            throw new \Exception("Venda não existe", 404);
        }
        return $return;
    }

    public function insert(array $Sale) : ?array {
        $this->validFields($Sale);
        $this->validFieldsRequired($Sale);
        $this->checkProductExists($Sale['id_product']);
        $tax = $this->getTax($Sale['id_product']);
        $Sale = $this->formatFields($Sale);
        $Sale['tax'] = $tax;
        $Sale['value'] = $Sale['unity_value'] + ($tax * $Sale['unity_value'])/100;
        $Sale['total'] = $Sale['value'] * $Sale['quantity'];
        $return = $this->db->insert('Sale', array_keys($Sale), array_values($Sale), 'id_sale');
        return $return[0] ?? false;
    }

    public function edit(int $id, array $Sale) :?array {
        $this->validFields($Sale);
        $Sale = $this->formatFields($Sale);
        if (
            in_array('unity_value', array_keys($Sale))
            ||
            in_array('tax', array_keys($Sale))
            ||
            in_array('quantity', array_keys($Sale))
        ) {
            if(isset($Sale['id_product'])) {
                $Sale['tax']=$this->getTax($Sale['id_product']);
            }
            $Sale = $this->handleValues($id, $Sale);
        }
        $return = $this->db->edit($id, 'Sale', array_keys($Sale), array_values($Sale), 'id_sale');
        if (empty($return)) {
            throw new \Exception("Venda não existe", 404);
        }
        return $return[0];
    }

    private function handleValues($id, $params) : array {
        $Sale = ($this->db->view('Sale', $id, 'id_sale'))[0];
        if (null === $Sale) {
            throw new \Exception('Venda não existe', 404);
        }
        $params['unity_value'] = $params['unity_value'] ?? $Sale['unity_value'];
        $params['tax'] = $params['tax'] ?? $Sale['tax'];
        $params['quantity'] = $params['quantity'] ?? $Sale['quantity'];
        $params['value'] = $params['unity_value'] + ($params['tax'] * $params['unity_value'])/100;
        $params['total'] = $params['value'] * $params['quantity'];
        return $params;
    }

    private function validFields(array $Sale) : void {
        
        if (count($Sale) === 0) {
            throw new \Exception('Nenhum dado a ser alterado', 422);
        }
        foreach ($Sale as $field => $value) {
            if (false === in_array($field, array_keys($this->fields))) {
                throw new \Exception("Campo $field não é valido! ", 422);    
            }
        }
    }

    private function validFieldsRequired(array $Sale) : void {
        
        foreach ($this->required as $required) {
            if (false === in_array($required, array_keys($Sale))) {
                throw new \Exception("Campo $required obrigatório", 404);
            }
        }
    }

    private function formatFields($Sale) : array {
        $return = [];
        foreach ($Sale as $field => $value) {
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

    private function checkProductExists(int $id_product) : void {
        (new Product())->view($id_product);
    }

    private function getTax(int $id_product) : ?float {
        $product =((new Product())->view($id_product))[0];
        $id_product_type = $product['id_product_type'];
        $productType = ((new ProductType())->view((int)$id_product_type))[0];
        return (float)$productType['tax'];
    } 

}