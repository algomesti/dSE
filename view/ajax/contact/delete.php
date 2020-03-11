<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    echo $url = "http://localhost/phonebookapi/contact/del.php?id=".$_POST['id']; 
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                                                                                       
    
    $result = curl_exec($ch);
    
}  
?>