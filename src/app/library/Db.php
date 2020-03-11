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
        
        switch ($table) {
            case 'Sale':
                $join = [
                    'table' => 'product',
                    'campoT1' => 'id_product',
                    'campoT2' => 'id_product',
                    'ret' =>'name'
                ];
                $sql = "
                    SELECT 
                        T1.id_sale,
                        T1.id_product,
                        T2.{$join['ret']},
                        T1.unity_value,
                        T1.tax,
                        T1.quantity,
                        T1.value,
                        T1.total
                    FROM 
                        $table as T1
                    LEFT JOIN
                        {$join['table']} as T2 ON T1.{$join['campoT1']} = T2.{$join['campoT2']} 
                    order by 1 DESC
                ";
                break;
            case 'product':
                $join = [
                    'table' => 'product_type',
                    'campoT1' => 'id_product_type',
                    'campoT2' => 'id_product_type',
                    'ret' =>'title'
                ];
    
                $sql = "
                    SELECT 
                        T1.id_product,
                        T1.id_product_type,
                        T2.{$join['ret']},
                        T1.name,
                        T1.description,
                        T1.price
                    FROM 
                        $table as T1
                    LEFT JOIN
                        {$join['table']} as T2 ON T1.{$join['campoT1']} = T2.{$join['campoT2']} 
                    order by 1 DESC
                ";
                break;
            default:
                $sql = "SELECT * FROM  $table  order by 1 DESC";
                break;
        }
        $result = $this->query($sql);
        $ret = [];
        while ($row = $result->fetchArray(true)) {
            $ret[] = $row;
        }
        return $ret;

    }
}