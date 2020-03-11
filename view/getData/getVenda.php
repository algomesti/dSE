<?php
  include 'lib/callApi.php';
  include 'lib/getTable.php';
  $get_data = callAPI('GET', 'php-apache/sale', false);
  $response = json_decode($get_data, true);
  $records = json_encode($response['records'] ?? []);
  $header  = ['ID', 'PRODUTO ID','PRODUTO', 'VALOR UNITÁRIO', 'IMPOSTO','QUANTIDADE','VALOR', 'TOTAL'];
  $actions = [
    [
        'function' => 'editVenda',
        'value' => ['id_sale','id_product','unity_value', 'quantity'],
        'title' => 'Edita',
        'class' => 'btn btn-success'
    ],
    [
        'function' => 'removeVenda',
        'value' => ['id_sale'],
        'title' => 'Remove',
        'class' => 'btn btn-danger'
    ]
];
echo getTable($records,$header,$actions);
  
  