<?php

namespace DSE\library;

class DB extends \SQLite3
{
    public function __construct()
    {
        $this->open('product.db');
    }

    public function insert(string $table, array $fields, array $values, string $key) : ?array {
      
        $stringFiels = implode(',', $fields);
        $stringValues = implode(',', $values);
        $sql = "INSERT INTO $table ($stringFiels) VALUES ($stringValues)";
        $result = $this->exec($sql);
        $id = $this->lastInsertRowID();
        return $this->view($table, $id, $key);
       
    }

    public function edit(int $id, string $table, array $fields, array $values, string $key) : ?array {
        $fieldsFormated = [];
        for($i = 0; $i < count($fields); $i++) {
            $fieldsFormated[] = $fields[$i] . " = " .$values[$i];
        }
        $fieldsFormated[] = 'updateAt = "'.date('Y-m-d h:i:s').'"';
        $stringFiels = implode(',', $fieldsFormated);
        $stringValues = implode(',', $values);
        $sql = "UPDATE $table SET  $stringFiels WHERE $key = $id";
        $result = $this->exec($sql);
        return $this->view($table, $id, $key);
    } 

    public function delete(string $table, int $id, string $key) : ?array {
        
        $sql = " DELETE FROM $table where $key = $id";
        $result = $this->exec($sql);
        $ret = [
            [
                $key => $id,
                'status' => 'deleted'
            ]
        ];
        if (0 === $this->changes()) {
            return null;
        }
        return $ret;
    }

    public function view(string $table, int $id, string $key) : ?array {

        $sql = " SELECT * FROM $table where $key = $id";
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