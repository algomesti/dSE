<?php

namespace DSE\models;

use DSE\library\Db;

class Product {

    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function list() {      
        return  $this->db->list('product');
    }

    public function view(int $id) {
        return  $this->db->view('product', $id);
    }

    public function delete(int $id) {
        return  $this->db->delete('product', $id);
    }

    public function insert(array $fields, array $values) {
        return  $this->db->insert('product', $fields, $values);
    }

}