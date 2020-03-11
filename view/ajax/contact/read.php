<?php
    
    $ch = curl_init('http://localhost/phonebookapi/contact/index.php');
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
                                                                                                                                                                                                                                       
    $result = curl_exec($ch);
    $result = json_decode($result,true);
   
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Nome</th>
                            <th>Edita</th>
                            <th>Remove</th>
                            <th>Visualiza</th>
                        </tr>';
  
    if(count($result) > 0)
    {
        $number = 1;
        foreach ($result as $row)
        {
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['name'].'</td>
                <td>
                    <button onclick="GetContactDetails('.$row['id_contact'].',\''.$row['name'].'\' )" class="btn btn-warning">E</button>
                </td>
                <td>
                    <button onclick="DeleteContact('.$row['id_contact'].')" class="btn btn-danger">x</button>
                </td>
                <td>
                    <button onclick="openPhones('.$row['id_contact'].')" class="btn btn-info">#</button>
                </td>
            </tr>';
            $number++;
        }
    }
    else
    {
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>