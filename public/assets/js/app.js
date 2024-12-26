const forms = document.querySelectorAll('form');
const loader = document.getElementById('loader');

forms.forEach(form => {
    form.addEventListener('submit', function (event) {
        loader.classList.remove('d-none');
        loader.classList.add('d-flex');
    });
});