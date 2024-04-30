export default class Carousels {
  constructor() {
    this.carousel1 = '.carousel_1';

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
        el: '.swiper-pagination',
        clickable: true
      }
    })
  }

}
