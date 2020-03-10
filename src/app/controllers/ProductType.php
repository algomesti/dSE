<?php

namespace DSE\controllers;

use DSE\classes\Controller;
use DSE\models\ProductType as ModelProductType;

class ProductType extends Controller{

    private $model;

    public function __construct() {
        $this->model = new ModelProductType();
    }

    public function list($parameters) {      
        try {
            echo $this->returnJson($this->model->list());
        } catch (\Exception $e) {
            echo $this->returnErrorJson($parameters, $e);
        }
    }

    public function view($parameters) {
        try {
            echo $this->returnJson($this->model->view((int) $parameters[0]));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($parameters , $e);
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
            $productType = json_decode($json, true);     
            echo $this->returnJson($this->model->insert($productType));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($productType, $e);
        }
    }

    public function edit($parameters) {
        try {
            $json = file_get_contents('php://input');
            $productType = json_decode($json, true);     
            echo $this->returnJson($this->model->edit((int) $parameters[0], $productType));
        } catch (\Exception $e) {
            echo $this->returnErrorJson($productType, $e);
        }
    }

}