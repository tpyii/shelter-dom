const swiperOptions = {
  spaceBetween: 0,
  breakpoints: {
    320: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 2
    },
    992: {
      slidesPerView: 3
    }
  },
  navigation: {
    nextEl: '.slider-button-next',
    prevEl: '.slider-button-prev',
  }
}

const swiperInit = () => new Swiper('.swiper', swiperOptions)

window.addEventListener('load', swiperInit)
