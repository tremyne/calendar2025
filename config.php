<?php
// Fungsi mendapatkan data kalender
function getCalendarData($year = 2025) {
    $calendar = [];
    for ($month = 1; $month <= 12; $month++) {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $calendar[$month] = [
            'name' => date('F', mktime(0, 0, 0, $month, 1, $year)),
            'days' => range(1, $daysInMonth)
        ];
    }
    return $calendar;
}

// Fungsi sorting
function sortCalendar(&$calendar, $order = 'asc') {
    $order === 'asc' ? ksort($calendar) : krsort($calendar);
}

function sortMonthDays(&$month, $order = 'asc') {
    $order === 'asc' ? sort($month['days']) : rsort($month['days']);
}

// Theme management
$theme = $_COOKIE['theme'] ?? 'light';
?>