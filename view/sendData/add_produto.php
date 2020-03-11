<?php 
$ch = curl_init();
$headers  = [
            'x-api-key: XXXXXX',
            'Content-Type: text/plain'
        ];
$postData = [
    "id_product_type" => $_POST['id_produto_tipo'],
    "name" => $_POST['titulo'],
    "description" => $_POST['descricao'],
    "price" => $_POST['preco'],
];
curl_setopt($ch, CURLOPT_URL,'php-apache/product');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result     = curl_exec ($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
header('location: /produto.php');