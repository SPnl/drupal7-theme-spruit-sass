(function($) {
    // shows/hides a sticky footer when primary cta gets out of viewport
    Drupal.behaviors.StickyFooter = {
        attach: function(context, settings) {
            $(window).on('DOMContentLoaded load resize scroll', function() {
                if (!inViewport('#cta-primary')) {
                    $("#stickyfooter").addClass("open");
                } else {
                    $('#stickyfooter').removeClass("open")
                }
            });
        }
    };

    function inViewport(element) {
        //special bonus for those using jQuery
        element = $(element);
        var rect = element[0].getBoundingClientRect();
        return (rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth));
    }
})(jQuery);