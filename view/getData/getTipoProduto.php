<?php
  include 'lib/callApi.php';
  include 'lib/getTable.php';
  $get_data = callAPI('GET', 'php-apache/product_type', false);
  $response = json_decode($get_data, true);
  $records = json_encode($response['records'] ?? []);
  $header  = ['ID', 'TÍTULO','DESCRIÇÃO', 'IMPOSTO','CRIADO EM ', 'ATUALIZADO EM'];
  $actions = [
    [
        'function' => 'editProdutoTipo',
        'value' => ['id_product_type', 'title', 'description', 'tax'],
        'title' => 'Edita',
        'class' => 'btn btn-success'
    ],
    [
        'function' => 'removeProdutoTipo',
        'value' => ['id_product_type'],
        'title' => 'Remove',
        'class' => 'btn btn-danger'
    ]
];
echo getTable($records,$header,$actions);
  
  