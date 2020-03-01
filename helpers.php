<?php

function havePost()
{
    return count($_POST) > 0 ? true : false;
}


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

function translateDateDatabase($date)
{
    if ($date == '')
        return '';

    $aux = explode("/", $date);

    if (count($aux) != 3) 
        return $date;
    
    $new_date = DateTime::createFromFormat('d/m/Y', $date);
    return $new_date->format('Y-m-d');
}

function translateDateShow($date)
{
    if ($date == '' OR $date == '0000-00-00')
        return '';


    $aux = explode("-", $date);
    
    if (count($aux) != 3) {
        return $date;
    }
    
    $data_object = DateTime::createFromFormat('Y-m-d', $date);
    return $data_object->format('d/m/Y');
}

function translateHigh($data)
{
    return $data == 0 ? 'Não' : 'Sim';
}

function checkDateTerm($date)
{
    $default = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $result = preg_match($default, $date);
    
    if($result == 0){
        return false;
    }

    $data = explode('/', $date);

    $day = $data[0];
    $month = $data[1];
    $year= $data[2];

    $result = checkdate($month, $day, $year);

    return $result;
}
