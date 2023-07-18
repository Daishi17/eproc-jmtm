(function ($) {
   $(document).ready(function () {

      $('div.home-hero-title').find('h2').addClass('hero-title color-white');
      $('div.home-hero-title').find('strong').addClass('ex-bold');
      $('a.feature-card').find('h2').addClass('feature-title');
      $('div.product-hero-title').find('h2').addClass('hero-title color-white');
      $('div.product-hero-title').find('strong').addClass('ex-bold');

      $('ul#footer_menu_list li').addClass('site-footer__list-item');
      $('ul#footer_menu_list li').css('display', 'list-item');
      $('ul#footer_menu_list li a').addClass('site-footer__link');

      $('#corpovideo').find('h3').addClass('hero-title text-center');
      $('.section-number__detail').find('ul').addClass('section-number__list');
      $('ul.section-number__list').find('li').addClass('section-number__list-item');
      $('.section-archievement__list').find('p').addClass('section-archievement__subtitle');
      $('.section-project-card__wrap-text').find('ul').addClass('section-project-detail__list');
      $('.sub-sidecontent').find('ul').addClass('section-project-detail__list');
      $('ul.section-project-detail__list').find('li').addClass('section-project-detail__item');

      $('div.col-5.exp-1').find('ul').addClass('section-project-detail__list exp-list center-item');
      $('div.col-3.exp-2').find('ul').addClass('section-project-detail__list exp-list');
      $('ul.section-project-detail__list').find('li').addClass('section-project-detail__item');

      $('.project-reference').find('ul').addClass('list__bullet');
      $('.in-content').find('ul').addClass('list__bullet');

      $('div.about-hero-title').find('h2').addClass('hero-title color-white');
      $('div.about-hero-title').find('strong').addClass('ex-bold');

      $('div.abt-welcome-title').find('h2').addClass('section-about-welcome__title');

      $('h3.section-title.with-icon').find('strong').addClass('color-red');

      $('.row.section-experience__list').find('ul').addClass('section-project-detail__list exp-list center-item');
      $('.row.section-experience__list').find('li').addClass('section-project-detail__item');
      /* Slider Setting */
      $(".hero-slider").slick({
         arrows: false,
         infinite: true,
         autoplay: true,
         speed: 600,
         autoplaySpeed: 3050
      });

      $(".section-project-slider").slick({
         lazyLoad: 'ondemand',
         slidesToShow: 4,
         slidesToScroll: 1,
         dots: true,
         arrows: false,
         infinite: true,
         autoplay: true,
         speed: 600,
         autoplaySpeed: 2700
      });


      /* Modal BOD Setting */

      $modal = $(".hotspot-modal");
      $modalOverlay = $modal.find(".hotspot-modal-overlay");

      $modalOverlay.on('click', function () {
         $modal.fadeOut();

      })



      $("#team-1").on('click', function (e) {

         e.preventDefault();
         $modal.fadeIn();
         $('div.row.bod1').show();
         $('div.row.bod2').hide();
         $('div.row.bod3').hide();
         $('div.row.bod4').hide();
      });

      $("#team-2").on('click', function (e) {

         e.preventDefault();
         $modal.fadeIn();
         $('div.row.bod1').hide();
         $('div.row.bod2').show();
         $('div.row.bod3').hide();
         $('div.row.bod4').hide();
      });

      $("#team-3").on('click', function (e) {

         e.preventDefault();
         $modal.fadeIn();
         $('div.row.bod1').hide();
         $('div.row.bod2').hide();
         $('div.row.bod3').show();
         $('div.row.bod4').hide();
      });

      $("#team-4").on('click', function (e) {

         e.preventDefault();
         $modal.fadeIn();
         $('div.row.bod1').hide();
         $('div.row.bod2').hide();
         $('div.row.bod3').hide();
         $('div.row.bod4').show();
      });

   });

   $('span.page-numbers.current').addClass('page-number__item active');
   $('a.page-numbers').addClass('page-number__item');
   $('a.page-number__item').css('text-decoration', 'none');
   $('a.prev.page-numbers').removeClass('page-number__item');
   $('a.next.page-numbers').removeClass('page-number__item');

   $('div.col-md-9.career-content').find('ul').addClass('list-bullet');
   // $('a.next.page-numbers').replaceWith('<button class="page-number__btn-next">');
   // $('a.prev.page-numbers').replaceWith('<button class="page-number__btn-prev">');

   /* ---------- GALLERY POP-UP MODAL ---------- */
   $galleryModal = $(".gallery-modal");
   $galleryCloseBtn = $galleryModal.find(".gallery-modal-close");


   $galleryCloseBtn.on('click', function () {
      $galleryModal.fadeOut();
   })


   $(".gallery-popups").on('click', function (e) {

      e.preventDefault();
      $modalID = $(this).data('id');

      $(".data" + $modalID).show();

   });

   if ($(window).width() < 768) {
      $('div.card.value-card').removeAttr('style');
   }

})(jQuery);

(function ($) {
   'use strict';
   $(".ytp-pause-overlay").hide();
})(jQuery);