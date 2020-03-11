<?php
function getTable($json, $header, $actions)
{
    $array = json_decode($json, true);
    $html  = "<table class='table'>";
    $html .= "<thead>";
    $html .= "<th>".implode("</th><th>", $header)."</th><th>AÇÕES</th>";
    $html .= "</thead>";
    $html .= "<tbody>";
    foreach ($array as $item) {
        $html .= "<tr>";
        foreach ($item as $campo) {
            $html .= "<td>".$campo."</td>";
        }
        $html_actions = '';
        foreach ($actions as $action) {
            
            $class= $action['class'];
            $values = $action['value'];
            $val = [];
            
            foreach ($values as $value) {
                $val[] = $item[$value];
            }
            $stringVal = implode('","', $val);
            
            $funcao = $action['function'] . '("'.$stringVal.'");';
            
            
            $html_actions .= "<button class='".$class."' onclick='".$funcao. "'>".$action['title']."</button>";
        }
        $html .= "<td>$html_actions</td>";

        $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";
    return $html;
}
