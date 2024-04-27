export default class Carousels {
  constructor() {
    this.carousel1 = '.carousel_1';

  }

  carousel1Init() {
    new Swiper(this.carousel1, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    })
  }

}
