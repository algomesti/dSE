<?php 
$ch = curl_init();
$headers  = [
            'x-api-key: XXXXXX',
            'Content-Type: text/plain'
        ];
$postData = [
    "id_product_type" => $_POST['edit_id_produto_tipo'],
    "name" => $_POST['edit_titulo'],
    "description" => $_POST['edit_descricao'],
    "price" => $_POST['edit_preco'],

];
curl_setopt($ch, CURLOPT_URL,'php-apache/product/'.$_POST['edit_id_produto']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result     = curl_exec ($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
header('location: /produto.php');