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
        try {
            echo $this->returnJson($this->model->list());
        } catch (\Exception $e) {
            echo $this->returnErrorJson($parameters , $e);
        }
    }

    public function view($parameters) {
        try {
            echo $this->returnJson($this->model->view((int) $parameters[0]));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($parameters, $e);
        }
    }

    public function delete($parameters) {
        try {
            echo $this->returnJson($this->model->delete((int) $parameters[0]));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($parameters , $e);
        }
    }

    public function insert($parameters) {
        try {
            $json = file_get_contents('php://input');
            $product = json_decode($json, true);     
            echo $this->returnJson($this->model->insert($product));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($product , $e);
        }
    }

    public function edit($parameters) {
        try {
            $json = file_get_contents('php://input');
            $product = json_decode($json, true);     
            echo $this->returnJson($this->model->edit((int) $parameters[0], $product));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($product , $e);
        }
        
    }

}