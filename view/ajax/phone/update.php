<?php

// check request
if( isset($_POST['id_contact']) && isset($_POST['id_phone']) )
{
    $array['fields']=array('country_code', 'area_code', 'phone' );
    $array['values']=array($_POST['country_code'],$_POST['area_code'],$_POST['phone']);
    $json = json_encode($array, JSON_NUMERIC_CHECK);  
   
    $url = 'http://localhost/phonebookapi/phone/upd.php?id='.$_POST['id_phone'];
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($json))                                                                       
    );
    $result = curl_exec($ch);

}