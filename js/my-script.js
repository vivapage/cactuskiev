var $ = jQuery.noConflict();
$(document).ready(function(){
  /* For each category */
  $('ul.product-categories > li.cat-parent').each( function( index, element ){
    /* For each category if there is a subcategory */
    $(this).mouseover(function() {
      /* Adding class 'ok' on rollover mouse event */
       $(this).find('ul.children').addClass('ok');
    }).mouseout(function() {
      /* removing class 'ok' on rollout mouse event */
       $(this).find('ul.children').removeClass('ok');
    });
  });
});
