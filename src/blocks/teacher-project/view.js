document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper === 'undefined') {
        console.warn('Swiper no está cargado. Asegúrate de encolarlo en functions.php');
        return;
    }

    const swiperContainers = document.querySelectorAll('.teacher-project-gallery .myswiper');

    swiperContainers.forEach((container) => {
        new Swiper(container, {
			loop: true,
			spaceBetween: 10,
			grabCursor: true,
			
			// Responsive breakpoints
			slidesPerView: 1,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
				dynamicBullets: true,
			},
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
			 autoplay: {
			 	delay: 3000,
			 	disableOnInteraction: false,
			},
			keyboard: {
				enabled: true,
			},
			effect: 'slide',
			lazy: {
				loadPrevNext: true,
			},
			a11y: {
				enabled: true,
			},
		});
    });
});