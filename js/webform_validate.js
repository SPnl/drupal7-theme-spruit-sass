(function ($) {

  // scrolls to first webform error
  Drupal.behaviors.ScrolltoError = {
    attach: function (context, settings) {   

      if ($(".error")[0]){
        // open slide for splitscreen webform
        $(".webformslider").addClass("open");
      }
      
    }
  };

})(jQuery);
