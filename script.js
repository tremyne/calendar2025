// Toggle Theme
document.getElementById('theme-toggle').addEventListener('click', () => {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', newTheme);
    document.cookie = `theme=${newTheme}; path=/; max-age=31536000`;
});

// Toggle Photo
function togglePhoto() {
    document.querySelector('.hidden-photo').classList.toggle('show');
}

// Sorting Bulan
function sortCalendar(order) {
    window.location.href = `?month_sort=${order}`;
}

// Sorting Hari per Bulan
function sortDays(monthNum, order) {
    window.location.href = `?day_sort=${monthNum}-${order}`;
}