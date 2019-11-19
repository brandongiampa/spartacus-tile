$(document).ready(function() {
  $('a[href^="#"]').on('click', function(e) {
    if (window.innerWidth > 900){
      e.preventDefault();

      var navbarHeight = $('#navbar-main').height();
      var padding = calculatePadding();

      var target;
      target = this.hash;

      var $target = $(target);

      //scroll and show hash
      $('html, body').animate({
        'scrollTop': $target.offset().top-navbarHeight-padding
      }, 1000, 'swing');
    }
  });
});

function calculatePadding() {
  var pTop = $('#navbar-main').css('paddingTop');
  var pBottom = $('#navbar-main').css('paddingBottom');

  var topInt = parseInt(pTop.substring(0, pTop.length-2));
  var bottomInt = parseInt(pTop.substring(0, pBottom.length-2));

  let padding = topInt+bottomInt;

  return padding;
}
