<?php

//phpinfo();
//die();
require 'vendor/autoload.php';

use DSE\classes\Request;
use DSE\classes\Router;


class MyDB extends SQLite3
{
    public function __construct()
    {
        $this->open('product.db');
    }
}
try {
  $request = new Request();
  $router = new Router(new Request);
  $router->call($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);
} catch (\Throwable $e) {
  header('Content-Type: application/json', true , 404);
  echo json_encode($e->getMessage());      
}


/*
$mydb = new MyDB();
$insert = 'INSERT INTO product(id_product_type, name, description, price, createAt, updateAt) VALUES(1, "bla", "ble", 3.5,"2020-04-03 11:11:11" , "2020-04-03 11:11:11")';
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);
$result = $mydb->exec($insert);

$result = $mydb->query('SELECT * FROM product');
var_dump($result->fetchArray());

die();
//print_r($request);
//die();
/*print_r($_REQUEST);
print_r($_SERVER['REQUEST_METHOD']);
print_r($_SERVER['REQUEST_URI']);
die();*/
/*$pdo = new \PDO("sqlite:" . 'product.db');
//var_dump($pdo);

$sql = 'INSERT INTO product(id_product_type, name, description, price, createAt, updateAt) VALUES(:id_product_type, :name, :description, :price, :createAt, :updateAt)';
$stmt = $pdo->prepare($sql);
$stmt->execute(
  [
    ':id_product_type' => 1,
    ':name' => 'blablabal',
    ':description' => 'blebleble',
    ':price' => 3.4,
    ':createAt' => '2020-04-03 11:11:11',
    ':updateAt' => '2020-04-03 11:11:11',
  ]
);
var_dump($stmt);
echo "[ ";
echo $pdo->lastInsertId();
echo " ]";
echo "      <br>AAAAAAA";

die();
var_dump($pdo);*/


