(function ($) {
  Drupal.behaviors.Vids = {
    attach: function (context, settings) {

      $("#vid1").click(function(){
        $("#voorelkaar-video iframe").attr("src","https://player.vimeo.com/video/260048948?autoplay=1?title=0&byline=0&portrait=0");
      });

      $("#vid2").click(function(){
          $("#voorelkaar-video iframe").attr("src","https://player.vimeo.com/video/260049127?autoplay=1?title=0&byline=0&portrait=0");
      });

      $("#vid3").click(function(){
          $("#voorelkaar-video iframe").attr("src","https://player.vimeo.com/video/260049050?autoplay=1?title=0&byline=0&portrait=0");
      });

    }
  }

})(jQuery);

