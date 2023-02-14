/* JavaScript */

/* Navbar toggle functionality */
const toggleButton = document.querySelector('.toggle');
const menu = document.querySelector('.menu');

toggleButton.addEventListener('click', () => {
    menu.classList.toggle('active');
    });
    /* Smooth scrolling */
    const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
        link.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));

        target.scrollIntoView({
        behavior: 'smooth'
        });
    });
});