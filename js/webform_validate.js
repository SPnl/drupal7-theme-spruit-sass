(function ($) {

  // scrolls to first webform error
  Drupal.behaviors.ScrolltoError = {
    attach: function (context, settings) {   

      if ($(".error")[0]){
        // opens slide for splitscreen webform
        // document.getElementsByClassName('webformslider')[0].classList = 'webformslider open';
        $(".webformslider").addClass("open");
      }
      
    }
  };

})(jQuery);
