<?php
 $url = "http://localhost/phonebookapi/contact/view.php?id=".$_GET['id'];  
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
 $result = curl_exec($ch);
   