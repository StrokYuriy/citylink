<?php

function timeValidate($timeInt)
{
    if (preg_match('/^[0-2][0-9]:[0-5][0-9]-[0-2][0-9]:[0-5][0-9]/', $timeInt)) {
        return true;
    }
    return false;
}

function timeOverlap($overlap)
{
    $list = array (
        '09:00-11:00',
        '11:00-13:00',
        '15:00-16:00',
        '17:00-20:00',
        '20:30-21:30',
        '21:30-22:30',
        '01:30-03:45',
    );

    $timeStart = strtotime(substr($overlap, 0, 5));
    $timeEnd = strtotime(substr($overlap, 6, 5));

    for ($i = 0; $i < count($list); $i++) {

        $listEnd = strtotime(substr($list[$i], 6, 5));
        $listStart = strtotime(substr($list[$i + 1], 0, 5));

        if ($listStart < $listEnd) {
            $listStart = $listStart + 86400;
        }
        if ($timeStart > $timeEnd) {
            $timeEnd = $timeEnd + 86400;
        }
        if ($timeStart > $listEnd && $timeEnd < $listStart) {
            return true;
        }
    }return false;
}

$d = timeOverlap('23:10-01:20');
var_export($d);


