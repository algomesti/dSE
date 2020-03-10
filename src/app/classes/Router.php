<?php

namespace DSE\classes;

use DSE\classes\RouterFunctions;

class Router {

    private $request;
    
    public function __construct(IRequest $request) {
        $this->request = $request;
        $this->routerFunctions = new RouterFunctions();
    }

    function call(string $verb, string $route) : void {
        
        $route = $this->formatRoute($route); 
        $arrayfunction = $this->routerFunctions->getFunction($verb, $route);
        if ($arrayfunction === null) {
            $this->defaultRequestHandler();
            die();
        }
        $modelClass = $arrayfunction[0];
        $modelMethod = $arrayfunction[1];
        
        $model = new $modelClass();
        //echo $modelMethod;
        //print_r($model);
        //die('no route');
        $model->$modelMethod($this->routerFunctions->getArgs());
    }

    private function formatRoute(string $route) : string {
        $routeArray = explode("/",$route);
        if(count($routeArray) === 1) return $routeArray[0];       
        $ret = [];
        foreach ($routeArray as $r) {
            if ( is_numeric($r) ) {
                $ret[] =  "{{id}}";
                $this->routerFunctions->setArg($r);
                continue;
            }
            $ret[] = $r;
        }
        return implode("/",$ret);
    }

    private function defaultRequestHandler() : void {
        header("{$this->request->serverProtocol} 404 Not Found");
        die();
    }
}