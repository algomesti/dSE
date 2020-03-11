<?php
    $ch = curl_init('http://localhost/phonebookapi/phone/index.php?id='.$_GET['id']);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
                                                                                                                                                                                                                                       
    $result = curl_exec($ch);
    $result = json_decode($result,true);
   
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Código do País</th>
                            <th>Código do Área</th>
                            <th>Número</th>
                            <th>Edita</th>
                            <th>Remove</th>
                            <th>Discar</th>
                        </tr>';
  
    if(count($result) > 0)
    {
        $number = 1;
        foreach ($result as $row)
        {
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['country_code'].'</td>
                <td>'.$row['area_code'].'</td>
                <td>'.$row['phone'].'</td>
                <td>
                    <button onclick="GetPhoneDetails('.$row['id_phone'].','.$row['country_code'].','.$row['area_code'].','.$row['phone'].' )" class="btn btn-warning">E</button>
                </td>
                <td>
                    <button onclick="DeletePhone('.$row['id_phone'].')" class="btn btn-danger">x</button>
                </td>
                <td>
                    <button onclick="DialPhone('.$row['country_code'].','.$row['area_code'].','.$row['phone'].' )" class="btn btn-info">#</button>
                </td>
            </tr>';
            $number++;
        }
    }
    else
    {
        $data .= '<tr><td colspan="7">Nenhum telefone cadastrado!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>