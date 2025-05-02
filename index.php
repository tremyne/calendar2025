<?php 
include 'config.php';
$calendar = getCalendarData();

// Handle sorting
$monthSort = $_GET['month_sort'] ?? 'asc';
sortCalendar($calendar, $monthSort);

// Handle day sorting per month
if(isset($_GET['day_sort'])) {
    $parts = explode('-', $_GET['day_sort']);
    sortMonthDays($calendar[$parts[0]], $parts[1]);
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= $theme ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 Calendar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Photo Toggle di pojok kiri atas -->
        <div class="photo-toggle" onclick="togglePhoto()">
            <span class="arrow">▼</span>
            <img src="img/1746182745352.jpg" alt="Random Photo" class="hidden-photo">
        </div>

        <header>
            <h1>2025 Calendar</h1>
            <button id="theme-toggle" class="btn">🌓 Toggle Theme</button>
        </header>

        <!-- Sorting Controls -->
        <div class="controls">
            <div class="sort-buttons">
                <button onclick="sortCalendar('asc')" class="btn">↑ Sort Bulan Asc</button>
                <button onclick="sortCalendar('desc')" class="btn">↓ Sort Bulan Desc</button>
            </div>
        </div>

        <!-- Calendar Grid -->
        <div class="calendar-grid">
            <?php foreach($calendar as $monthNum => $month): ?>
            <div class="month-card">
                <div class="month-header">
                    <h2><?= $month['name'] ?></h2>
                    <div class="day-sort">
                        <button class="btn" onclick="sortDays(<?= $monthNum ?>, 'asc')">↑</button>
                        <button class="btn" onclick="sortDays(<?= $monthNum ?>, 'desc')">↓</button>
                    </div>
                </div>
                <div class="days-grid">
                    <?php foreach($month['days'] as $day): ?>
                    <div class="day"><?= $day ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>