<?php

function bg_color($status)
{
    $badge_color = '';
    if ($status == 'proses') {
        $badge_color = 'info';
    } elseif ($status == 'selesai') {
        $badge_color = 'success';
    } elseif ($status == 'ditolak') {
        $badge_color = 'danger';
    }
    return $badge_color;
}
