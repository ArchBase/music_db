// Toggle form visibility
document.getElementById('show-search-link').addEventListener('click', function(event) {
    event.preventDefault();
    const form = document.getElementById('search-form');
    form.style.display = form.style.display === 'none' ? 'flex' : 'none';
});

document.getElementById('show-form-link').addEventListener('click', function(event) {
    event.preventDefault();
    const form = document.getElementById('playlist-form');
    form.style.display = form.style.display === 'none' ? 'flex' : 'none';
});
