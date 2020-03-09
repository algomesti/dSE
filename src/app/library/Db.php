<?php

namespace DSE\library;

class DB extends \SQLite3
{
    public function __construct()
    {
        $this->open('product.db');
    }

    public function insert(string $table, array $fields, array $values) : ?array {
        
        $stringFiels = implode(',', $fields);
        $stringValues = implode(',', $values);
        $sql = "INSERT INTO $table ($stringFiels) VALUES ($stringValues)";
        $result = $this->exec($sql);
        $id = $this->lastInsertRowID();
        return $this->view($table, $id);
        
    }

    public function update(string $table, array $fields, array $values) : ?array {

    } 

    public function delete(string $table, int $id) : ?array {
        
        $sql = " DELETE FROM $table where id_product = $id";
        $result = $this->exec($sql);
        $ret = [
            [
                'id_product' => $id,
                'status' => 'deleted'
            ]
        ];
        return $ret; 
    }

    public function view(string $table, int $id) : ?array {

        $sql = " SELECT * FROM $table where id_product = $id";
        $result = $this->query($sql);
        $ret = [];
        while ($row = $result->fetchArray(true)) {
            $ret[] = $row;
        }
        return $ret;

    }

    public function list(string $table) : ?array {
        
        $sql = " SELECT * FROM $table";
        $result = $this->query($sql);
        $ret = [];
        while ($row = $result->fetchArray(true)) {
            $ret[] = $row;
        }
        return $ret;

    }

}