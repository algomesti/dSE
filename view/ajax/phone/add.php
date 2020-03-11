<?php
    print_r($_POST);
    if(isset($_POST['id_contact']))
    {
        $array['fields']=array('id_contact','country_code', 'area_code', 'phone');
        $array['values']=array($_POST['id_contact'],$_POST['country_code'],$_POST['area_code'],$_POST['phone']);
        $json = json_encode($array, JSON_NUMERIC_CHECK);  
        echo $json;
        $ch = curl_init('http://localhost/phonebookapi/phone/add.php');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($json))                                                                       
        );                                                                                                                   
                                                                                                                     
        $result = curl_exec($ch);
    }
?>
