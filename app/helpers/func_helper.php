<?php


function getTimeDifference($scheduleTime) {
    // Convert the dates into Unix timestamps
    $today = strtotime(date('Y-m-d H:i:s'));
    $scheduked = strtotime($scheduleTime) + 3600;

    if ($today > $scheduked) {
        return true;
    }else{
        return false;
    }
}




