<?php
function translatesPriority($cod)
{
    $priority = '';

    switch ($cod) {
        case 1:
            $priority = 'Baixa';
            break;

        case 2:
            $priority = 'Média';
            break;

        default:
            $priority = 'Alta';
            break;
    }

    return $priority;
}

function translateDate ($date){
    if($date == '')
        return '';

    $aux = explode("/", $date);
    $newDate = "{$aux[2]}-{$aux[1]}-{$aux[0]}}";
    
    return $newDate;
}

function translateDateShow ($date){
    if($date == '' OR $date == '0000-00-00')
        return '';

    $data_object = DateTime::createFromFormat('Y-m-d', $date);
    return $data_object->format('d/m/Y');

    // $aux = explode("-", $date);
    // $newDate = "{$aux[2]}/{$aux[1]}/{$aux[0]}";
    
    // return $newDate;
}

function translateHigh($data){
    return $data == 0 ? 'Não' : 'Sim';
}
