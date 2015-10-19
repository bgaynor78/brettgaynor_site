/*==========================================================================
   Brett Gaynor Web Development Site Custom JS
   Author: Brett Gaynor
   Created: 10/10/15
   All Rights Reserved
   ========================================================================== */

$(document).ready(function(){
  //Fade Page Transitions
  $(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    loading: true,
    loadingParentElement: 'body',
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
  
  
  //Navigation Menu Slider
  $('#nav-expander').on('click',function(e){
    e.preventDefault();
    $('body').toggleClass('nav-expanded');
  });
  $('#nav-close').on('click',function(e){
    e.preventDefault();
    $('body').removeClass('nav-expanded');
  });
  
  //Hide/Show Title of Work Banners
  $('.bg-portfolio-item-link').on('mouseover', function(e){
    $(this).children().addClass('fadeOut');
  });
  $('.bg-portfolio-item-link').on('mouseout', function(e){
    $(this).children().removeClass('fadeOut');
  });
});

