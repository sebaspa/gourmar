<footer class="py-6 lg:py-14 w-full bg-primary-500">
  <div class="container max-w-7xl ">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 lg:col-span-7">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" alt="gourmar" loading="lazy"
          width="250" height="68" />
        <p class="text-white text-xs font-adelica-brush mt-1 mb-5 md:mb-0">Seguridad y calidad son nuestra prioridad</p>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu-footer',
          )
        );
        ?>
      </div>
      <div class="col-span-12 lg:col-span-5">
        <h4 class="text-white font-lato uppercase text-lg mb-5">Información de contacto</h4>
        <ul class="text-white text-base [&>li]:mb-3 [&>li]:flex [&>li]:items-center">
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 mr-2 text-secondary-500">
              <path fill="currentColor"
                d="M64 32C46.3 32 32 46.3 32 64V304v48 80c0 26.5 21.5 48 48 48H496c26.5 0 48-21.5 48-48V304 152.2c0-18.2-19.4-29.7-35.4-21.1L352 215.4V152.2c0-18.2-19.4-29.7-35.4-21.1L160 215.4V64c0-17.7-14.3-32-32-32H64z" />
            </svg>
            <p>Villa Cecilia, Pedregal, Panamá</p>
          </li>
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2 text-secondary-500">
              <path fill="currentColor"
                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
            </svg>
            <p>+ (507) 220-5720</p>
          </li>
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2 text-secondary-500">
              <path fill="currentColor"
                d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
            </svg>
            <p>info@gourmar.com</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-9 order-2 md:order-1">
        <div class="flex flex-col lg:flex-row lg:items-center gap-2 text-white text-xs md:text-base text-left">
          <p class="">
            Copyright <?php echo date('Y'); ?>
          </p>
          <p>GOURMAR. Todos los derechos reservados</p>
          <span class="hidden lg:block">|</span>
          <div class="flex items-center gap-2">
            <p>Desarrollado por: </p>
            <a href="https://bluetide.dev/" target="_blank" rel="noopener noreferrer" title="BlueTide">BlueTide</a>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-3 order-1 md:order-2">
        <div class="flex items-center gap-4 justify-center md:justify-end text-white">
          <!--
          <a href="#" target="_blank" rel="noopener noreferrer" title="Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none">
              <path fill="currentColor"
                d="M16.723 2.635h3.034l-6.626 7.57 7.795 10.305h-6.102l-4.782-6.248-5.466 6.248H1.538l7.086-8.1-7.472-9.775h6.256l4.318 5.71 4.997-5.71Zm-1.065 16.062h1.68L6.493 4.354H4.688l10.97 14.343Z" />
            </svg>
          </a>
          <a href="#" target="_blank" rel="noopener noreferrer" title="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none">
              <path fill="currentColor"
                d="M21.656 11.322c0 5.328-3.91 9.754-9.023 10.528v-7.434h2.492l.473-3.094h-2.965V9.346c0-.86.43-1.676 1.762-1.676h1.332V5.049s-1.204-.215-2.407-.215c-2.406 0-3.996 1.504-3.996 4.168v2.32H6.617v3.094h2.707v7.434c-5.113-.774-8.98-5.2-8.98-10.528C.344 5.436 5.114.666 11 .666c5.887 0 10.656 4.77 10.656 10.656Z" />
            </svg>
          </a>
      -->
          <a href="https://www.instagram.com/gourmarsalmon?igsh=MTQzOTd2dzUyOTRueg==" target="_blank"
            rel="noopener noreferrer" title="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="none">
              <path fill="currentColor"
                d="M10.625 5.38c2.707 0 4.941 2.235 4.941 4.942a4.942 4.942 0 0 1-4.941 4.942 4.915 4.915 0 0 1-4.941-4.942 4.942 4.942 0 0 1 4.941-4.941Zm0 8.165c1.762 0 3.18-1.418 3.18-3.223a3.173 3.173 0 0 0-3.18-3.18c-1.805 0-3.223 1.419-3.223 3.18a3.218 3.218 0 0 0 3.223 3.223Zm6.273-8.336c0-.645-.515-1.16-1.16-1.16-.644 0-1.16.515-1.16 1.16 0 .645.516 1.16 1.16 1.16.645 0 1.16-.515 1.16-1.16Zm3.266 1.16c.086 1.59.086 6.36 0 7.95-.086 1.546-.43 2.878-1.547 4.038-1.117 1.118-2.492 1.461-4.039 1.547-1.59.086-6.36.086-7.95 0-1.546-.086-2.878-.43-4.038-1.547-1.117-1.16-1.461-2.492-1.547-4.039-.086-1.59-.086-6.359 0-7.949.086-1.547.43-2.922 1.547-4.039C3.75 1.213 5.082.87 6.629.783c1.59-.086 6.36-.086 7.95 0 1.546.086 2.921.43 4.038 1.547 1.117 1.117 1.461 2.492 1.547 4.04Zm-2.062 9.625c.515-1.246.386-4.254.386-5.672 0-1.375.13-4.383-.386-5.672-.344-.816-.989-1.504-1.805-1.804-1.29-.516-4.297-.387-5.672-.387-1.418 0-4.426-.129-5.672.387A3.314 3.314 0 0 0 3.105 4.65c-.515 1.29-.386 4.297-.386 5.672 0 1.418-.13 4.426.386 5.672.344.86.989 1.504 1.848 1.848 1.246.515 4.254.387 5.672.387 1.375 0 4.383.128 5.672-.387.816-.344 1.504-.988 1.805-1.848Z" />
            </svg>
          </a>
          <a href="https://www.youtube.com/@Gourmarsalmon" target="_blank" rel="noopener noreferrer" title="Youtube">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="17" fill="none">
              <path fill="currentColor"
                d="M23.59 2.693c.515 1.805.515 5.672.515 5.672s0 3.825-.515 5.672a2.866 2.866 0 0 1-2.063 2.063c-1.847.472-9.152.472-9.152.472s-7.348 0-9.195-.472a2.866 2.866 0 0 1-2.063-2.063C.602 12.19.602 8.365.602 8.365s0-3.867.515-5.672C1.375 1.663 2.191.846 3.18.588 5.027.072 12.375.072 12.375.072s7.305 0 9.152.516c.989.258 1.805 1.074 2.063 2.105ZM9.969 11.846l6.101-3.48L9.97 4.884v6.96Z" />
            </svg>
          </a>
          <a href="https://www.tiktok.com/@gourmar.salmon" target="_blank" rel="noopener noreferrer" title="Tiktok">
            <svg width="25" height="25" viewBox="0 0 24 24" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M16.8218 5.1344C16.0887 4.29394 15.648 3.19805 15.648 2H14.7293C14.9659 3.3095 15.7454 4.43326 16.8218 5.1344Z"
                fill="#FFF" />
              <path
                d="M8.3218 11.9048C6.73038 11.9048 5.43591 13.2004 5.43591 14.7931C5.43591 15.903 6.06691 16.8688 6.98556 17.3517C6.64223 16.8781 6.43808 16.2977 6.43808 15.6661C6.43808 14.0734 7.73255 12.7778 9.324 12.7778C9.62093 12.7778 9.90856 12.8288 10.1777 12.9124V9.40192C9.89927 9.36473 9.61628 9.34149 9.324 9.34149C9.27294 9.34149 9.22654 9.34614 9.1755 9.34614V12.0394C8.90176 11.9558 8.61873 11.9048 8.3218 11.9048Z"
                fill="#FFF" />
              <path
                d="M19.4245 6.67608V9.34614C17.6429 9.34614 15.9912 8.77501 14.6456 7.80911V14.7977C14.6456 18.2851 11.8108 21.127 8.32172 21.127C6.97621 21.127 5.7235 20.6998 4.69812 19.98C5.8534 21.2198 7.50049 22 9.32392 22C12.8083 22 15.6478 19.1627 15.6478 15.6707V8.68211C16.9933 9.64801 18.645 10.2191 20.4267 10.2191V6.78293C20.0787 6.78293 19.7446 6.74574 19.4245 6.67608Z"
                fill="#FFF" />
              <path
                d="M14.6456 14.7977V7.80911C15.9912 8.77501 17.6429 9.34614 19.4245 9.34614V6.67608C18.3945 6.45788 17.4899 5.90063 16.8218 5.1344C15.7454 4.43326 14.9704 3.3095 14.7245 2H12.2098L12.2051 15.7775C12.1495 17.3192 10.8782 18.5591 9.32393 18.5591C8.35884 18.5591 7.50977 18.0808 6.98085 17.3564C6.06219 16.8688 5.4312 15.9076 5.4312 14.7977C5.4312 13.205 6.72567 11.9094 8.31708 11.9094C8.61402 11.9094 8.90168 11.9605 9.17079 12.0441V9.35079C5.75598 9.42509 3 12.2298 3 15.6707C3 17.3331 3.64492 18.847 4.69812 19.98C5.7235 20.6998 6.97621 21.127 8.32172 21.127C11.8061 21.127 14.6456 18.2851 14.6456 14.7977Z"
                fill="#FFF" />
            </svg>
          </a>
          <a href="https://www.facebook.com/gourmarsa" target="_blank" rel="noopener noreferrer" title="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" fill="#FFF"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
              <path
                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>