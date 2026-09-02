/**
 * Main JavaScript file for Edusite CO theme
 */

document.addEventListener('DOMContentLoaded', function () {
    console.log('Edusite CO theme loaded');

    // Menú superior móvil
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Menú principal móvil
    const mainMobileMenuButton = document.getElementById('main-mobile-menu-button');
    const mainMobileMenu = document.getElementById('main-mobile-menu');

    if (mainMobileMenuButton && mainMobileMenu) {
        mainMobileMenuButton.addEventListener('click', function () {
            mainMobileMenu.classList.toggle('hidden');
        });
    }

    // Cerrar menús al hacer clic fuera
    document.addEventListener('click', function (event) {
        if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
        if (mainMobileMenu && !mainMobileMenu.contains(event.target) && !mainMobileMenuButton.contains(event.target)) {
            mainMobileMenu.classList.add('hidden');
        }
    });

    // --- Mobile menu toggle ---
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function () {
            navigation.classList.toggle('toggled');
        });
    }

    // --- Smooth scrolling for anchor links ---
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            // Asegurarse de que el targetId no sea solo '#'
            if (targetId.length > 1) {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // --- Swiper Carousel Initialization (Front Page) ---
    // Solo se inicializa si el contenedor existe y la librería Swiper está cargada

    const swiperContainer = document.querySelector('.swiper-container');
    if (swiperContainer && typeof Swiper !== 'undefined') {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // --- Dark/Light Theme Toggle ---
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;

    if (themeToggle) {
        // Verificar preferencia guardada o del sistema
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        // Aplicar tema inicial
        if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Toggle del tema
        themeToggle.addEventListener('click', function () {
            html.classList.toggle('dark');

            // Guardar preferencia
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });

        // Escuchar cambios en la preferencia del sistema
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
            if (!localStorage.getItem('theme')) {
                if (e.matches) {
                    html.classList.add('dark');
                } else {
                    html.classList.remove('dark');
                }
            }
        });
    }

    // Mejorar accesibilidad del reproductor de audio
    const audioPlayer = document.querySelector('audio');
    if (audioPlayer) {
        audioPlayer.setAttribute('title', '<?php echo esc_js(get_theme_mod("himno_audio_label", "Reproductor del Himno Institucional")); ?>');
    }

    // Animación suave al hacer scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Aplicar animación a las secciones
    document.querySelectorAll('section > div').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });

    // Mapa
    const mapContainer = document.getElementById('map');
    if (mapContainer && typeof L !== 'undefined') {
        const map = L.map('map').setView([2.4402181, -76.6078959], 15); // Coordenadas de Popayán

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 19,
            className: 'leaflet-tiles'
        }).addTo(map);

        // Agregar marcador personalizado
        const marker = L.marker([2.4402181, -76.6078959]).addTo(map);
        marker.bindPopup(
            '<div style="font-family: Plus Jakarta Sans; font-weight: 600;">' +
            '<strong>📍 IERP Popayán</strong><br>' +
            'Sede Principal<br>' +
            '<a href="tel:+573015551234">+57 301 555 1234</a>' +
            '</div>'
        ).openPopup();
    }
});