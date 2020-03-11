<?php
    
    if(isset($_POST['name']))
    {
        $array['fields']=array('name');
        $array['values']=array($_POST['name']);
        $json = json_encode($array);  
        
        $ch = curl_init('http://localhost/phonebookapi/contact/add.php');
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
