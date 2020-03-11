<?php

// check request
if( isset($_POST['id']) && isset($_POST['name']) )
{
    //print_r($_POST);
    $array['fields']=array('name');
    $array['values']=array($_POST['name']);
    $json = json_encode($array);  
    $url = 'http://localhost/phonebookapi/contact/upd.php?id='.$_POST['id'];
    $ch = curl_init($url);
    
    //echo $json; 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($json))                                                                       
    );
    $result = curl_exec($ch);

}