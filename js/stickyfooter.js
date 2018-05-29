(function ($) {

  $(document).ready(function(){
    console.log( "stickyfooter.js loaded" );
  });

  // shows/hides a sticky footer after y scroll
  Drupal.behaviors.StickyFooter = {
    attach: function (context, settings) {   

      $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 800) {
          // console.log("stickyfooter open");
          $("#stickyfooter").addClass("open");
        } else {
          // console.log("stickyfooter closed");
          $('#stickyfooter').removeClass("open");
        }
      });
    }
  };

})(jQuery);
