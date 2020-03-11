<?php 

$ch = curl_init();
$headers  = [
            'x-api-key: XXXXXX',
            'Content-Type: text/plain'
        ];
$postData = [
    "id_product" => $_POST['edit_id_produto'],
    "unity_value" => $_POST['edit_valor_unitario'],
    "quantity" => $_POST['edit_quantidade']
];
curl_setopt($ch, CURLOPT_URL,'php-apache/sale/'.$_POST['edit_id_venda']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result     = curl_exec ($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
header('location: /vendas.php');