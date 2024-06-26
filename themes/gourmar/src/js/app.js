import MainMenu from "./mainMenu"
import Carousels from "./carousels"
import LeaftleftFindUs from "./leaftleftFindUs"

jQuery(function () {
  if (jQuery('#mainMenu').length > 0) {
    new MainMenu()
  }

  if (jQuery('.carousel_1').length > 0) {
    new Carousels().carousel1Init()
  }

  if (jQuery('.carousel2').length > 0) {
    new Carousels().carousel2Init()
  }

  if (jQuery("#findusMap").length > 0) {
    new LeaftleftFindUs();
  }
})
