<?php

namespace DSE\controllers;

use DSE\classes\Controller;
use DSE\models\Product as ModelProduct;

class Product extends Controller{

    private $model;

    public function __construct() {
        $this->model = new ModelProduct();
    }

    public function list($parameters) {      
        echo $this->returnJson($this->model->list());
    }

    public function view($parameters) {
        echo $this->returnJson($this->model->view((int) $parameters[0]));
    }

    public function delete($parameters) {
        echo $this->returnJson($this->model->delete((int) $parameters[0]));
    }

    public function insert($parameters) {
        $json = file_get_contents('php://input');
        echo $json;
        print_r(json_decode($json));
        die();
        echo $this->returnJson($this->model->delete((int) $parameters[0]));
    }

}