const swiper = new Swiper('.swiper', {
    slidesPerView: 3,  // Show 3 slides at a time
    spaceBetween: 30,   // Space between slides
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
   
    loop: true,  // Optional: Enable infinite loop
});
