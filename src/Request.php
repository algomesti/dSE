<?php

namespace DSE;

use DSE\IRequest;

class Request implements IRequest {
    
    public function __construct() {
        $this->bootstrapSelf();
    }

    private function bootstrapSelf() : void {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase(string $string) : string {   
        $result = strtolower($string);
        preg_match_all('/_[a-z]/', $result, $matches);
        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }

    public function getBody() : ?array {
        if ($this->requestMethod === "GET") {
            return null;
        }
        if ($this->requestMethod == "POST") {
            $body = array();
            foreach($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
    }
}