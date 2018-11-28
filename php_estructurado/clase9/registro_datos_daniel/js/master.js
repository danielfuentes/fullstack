//Esto que está aquí es lo que les enseñaré cuando 
//con el favor de Dios estemos en JavaScript - JQuery
// jQuery para hacer el scrolling 
$(function() {
   $('a.page-scroll').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
         scrollTop: $($anchor.attr('href')).offset().top
      }, 1500, 'easeInOutExpo');
      event.preventDefault();
   });
});


$('body').scrollspy({
   target: '.navbar-fixed-top'
})


$('.navbar-collapse ul li a').click(function() {
   $('.navbar-toggle:visible').click();
});



function sticky_relocate() {
   var window_top = $(window).scrollTop();
   var anchor = $('.nav-marker').offset().top;
   if($(window).width() >= 768){
      if (window_top > anchor) {
      $('.navbar-default').addClass('bg-nav');
   } else {
      $('.navbar-default').removeClass('bg-nav');
   }
   }
}

$(function(){
   $(window).scroll(sticky_relocate);
   sticky_relocate();
});
