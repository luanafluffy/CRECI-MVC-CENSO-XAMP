<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

/* Se a primeira data é menor que a segunda */
function isBefore($date1, $date2) {
    $inputDate1 = getDateAsDateTime($date1); 
    $inputDate2 = getDateAsDateTime($date2); 
    return $inputDate1 <= $inputDate2;
}

/* Dia anterior */ 
function pegarProximoDia($date) {
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('-1 day');
    return $inputDate;
}