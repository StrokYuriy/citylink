let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

function closeMenu() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.classList.remove('active');
}

function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

window.onclick = function (event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        closeModal();
    }
};
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.feedback-form input');

    inputs.forEach(input => {
        const container = input.closest('.input-container');

        input.addEventListener('input', function() {
            if (input.value.trim() !== '') {
                container.classList.add('filled');
            } else {
                container.classList.remove('filled');
            }
        });

        input.addEventListener('focus', function() {
            container.classList.add('filled');
        });

        input.addEventListener('blur', function() {
            if (input.value.trim() === '') {
                container.classList.remove('filled');
            }
        });
    });
});

function toggleMenu() {
    console.log('Меню открыто/закрыто');
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.classList.toggle('active');
}

document.querySelector('.feedback-form form').addEventListener('submit', function(event) {
    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');

    if (nameInput.value.trim() === '' || phoneInput.value.trim() === '') {
        event.preventDefault(); // Остановить отправку формы
        alert('Пожалуйста, заполните все поля.');
    }
});

showSlide(currentSlide);
