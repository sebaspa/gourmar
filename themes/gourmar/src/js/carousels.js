export default class Carousels {
  constructor() {
    this.carousel1 = '.carousel_1';
    this.carousel2 = '.carousel2';

  }

  carousel1Init() {
    new Swiper(this.carousel1, {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination-carousel1',
        clickable: true
      }
    })
  }

  carousel2Init() {
    new Swiper(this.carousel2, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination-carousel2',
        clickable: true
      }
    })
  }

}
