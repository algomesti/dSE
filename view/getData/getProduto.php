<?php
  include 'lib/callApi.php';
  include 'lib/getTable.php';
  $get_data = callAPI('GET', 'php-apache/product', false);
  $response = json_decode($get_data, true);
  $records = json_encode($response['records'] ?? []); 
  $header  = ['ID', 'TIPO_ID', 'TIPO', 'TÍTULO','DESCRIÇÃO', 'PREÇO'];
  $actions = [
    [
        'function' => 'editProduto',
        'value' => ['id_product', 'id_product_type', 'name', 'description', 'price'],
        'title' => 'Edita',
        'class' => 'btn btn-success'
    ],
    [
        'function' => 'removeProduto',
        'value' => ['id_product'],
        'title' => 'Remove',
        'class' => 'btn btn-danger'
    ]
];
echo getTable($records,$header,$actions);
  
  