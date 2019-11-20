var navbar = $('#navbar-main');
var scrolling = false;

$(document).ready(onLoadOrResize);

function onLoadOrResize() {
  $(window).on('resize', onLoadOrResize);
  $(window).on('scroll', onScroll);
  setSmoothScroll();
  determineNavBarColor();
  determineCardContainerPadding();
  determineBackToTopVisibility();
  moveHeroImageTop();
}
function onScroll() {
  if(!scrolling){
    scrolling = true;
    setTimeout(()=>{
      determineNavBarColor();
      moveHeroImageTop();
      determineBackToTopVisibility();
      scrolling = false;
    }), 25;
  }
}
function moveHeroImageTop() {
  let y = $(window).scrollTop() / 3;
  if (isIndex) {
    $('#landing-page-bg').css('top', -y);
    $('#landing-page-opaque').css('top', -y);
  }
  else {
    $('.header-bg').css('top', -y);
    $('.header-opaque').css('top', -y);
  }
}
function determineBackToTopVisibility(){
  let y = $(window).scrollTop();
  if (y>=500){
    $('#back-to-top').css('visibility', 'visible');
    $('#back-to-top').css('opacity', '1');
  }
  else {
    $('#back-to-top').css('visibility', 'hidden');
    $('#back-to-top').css('opacity', '0');
  }
}
function determineCardContainerPadding() {
  let width = window.innerWidth;
  let cardContainer = $('#card-container');

  if (width<992){
    if (cardContainer.hasClass('container')){
      cardContainer.removeClass('container');
    }
    $('.card-deck').css('padding', '0');
  }
  else {
    if (!cardContainer.hasClass('container')){
      cardContainer.addClass('container');
    }
    $('.card-deck').css('padding', '24px');
  }
}
function determineNavBarColor() {
  if (!isIndex) {
    navbar.css('backgroundColor', '#000000');
    return false; //escaping function
  }
  let y = $(window).scrollTop();
  let top = $('#landing-page').position().top;
  let bottom = top + $('#landing-page').outerHeight(true);
  var multiplier = y/(bottom-100);

  navbar.css('backgroundColor', 'rgba(0,0,0,' + multiplier.toString() + ')');
}
function setSmoothScroll() {
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
}
function calculatePadding() {
  var pTop = $('#navbar-main').css('paddingTop');
  var pBottom = $('#navbar-main').css('paddingBottom');

  var topInt = parseInt(pTop.substring(0, pTop.length-2));
  var bottomInt = parseInt(pTop.substring(0, pBottom.length-2));

  let padding = topInt+bottomInt;

  return padding;
}
function initMap() {
  var spartacusTileLocation = {lat: 42.483937, lng: -83.088911};
  var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 13, center: spartacusTileLocation});
  var marker = new google.maps.Marker({position: spartacusTileLocation, map: map});
  var infoWindow = new google.maps.InfoWindow({
    content: '<h6>Spartacus Tile</h6><p>1608 E Lincoln Ave</br>Madison Heights, MI  48071</p>'
  });
  marker.addListener('mouseover', function(){
    infoWindow.open(map, marker);
  });
  marker.addListener('mouseout', function(){
    infoWindow.close(map, marker);
  });
}
