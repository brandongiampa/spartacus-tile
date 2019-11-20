var navbar = $('#navbar-main');
var scrolling = false;

$(document).ready(setUpNavbarColoration);
$(document).ready(determineNavBarColor);
$(document).ready(determineCardContainerPadding);
$(document).ready(onResize);
$(document).ready(determineBackToTopVisibility);

function setUpNavbarColoration(){
  $(window).on('scroll', onScroll);
}
function onScroll() {
  if(!scrolling){
    scrolling = true;
    setTimeout(()=>{
      determineNavBarColor();
      determineHeroTextFade();
      moveHeroImageTop();
      determineBackToTopVisibility();
      scrolling = false;
    }), 25;
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
function determineHeroTextFade() {
  if(isIndex){
    let y = $(window).scrollTop();
    let top = $('#landing-page').position().top;
    let bottom = top + $('#landing-page').outerHeight(true);
    let opacity = y < 500 ? (500-y)/500 : 0;
    opacity *= 100;
    $('#landing-page-text').css('opacity', opacity.toString()+'%');
  }
  else {
    return false;
  }
}
function determineNavBarColor() {
  if (!isIndex) {
    navbar.css('backgroundColor', '#000000');
    return false;
  }
  let y = $(window).scrollTop();
  let top = $('#landing-page').position().top;
  let bottom = top + $('#landing-page').outerHeight(true);
  var multiplier = y/(bottom-100);

  navbar.css('backgroundColor', 'rgba(0,0,0,' + multiplier.toString() + ')');
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
function onResize() {
  $(window).on('resize', ()=>{
    determineCardContainerPadding();
    determineNavBarColor();
    determineHeroTextFade();
    determineBackToTopVisibility();
  });
}
// Initialize and add the map
function initMap() {
// The location of Uluru
var spartacusTileLocation = {lat: 42.483937, lng: -83.088911};
// The map, centered at Uluru
var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 13, center: spartacusTileLocation});
// The marker, positioned at Uluru
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
