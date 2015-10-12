/*==========================================================================
   Brett Gaynor Web Development Site Custom JS
   Author: Brett Gaynor
   Created: 10/10/15
   All Rights Reserved
   ========================================================================== */

$(document).ready(function(){												
  //Navigation Menu Slider
  $('#nav-expander').on('click',function(e){
    e.preventDefault();
    $('body').toggleClass('nav-expanded');
  });
  $('#nav-close').on('click',function(e){
    e.preventDefault();
    $('body').removeClass('nav-expanded');
  });
});

