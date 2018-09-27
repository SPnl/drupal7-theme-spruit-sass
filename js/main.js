(function ($) {
  Drupal.behaviors.SiteHeaderSearchToggle = {
    attach: function (context, settings) {
      $('.site-search').hide();
      $('.search-toggle a', context).click(function(event){
      	event.preventDefault();
      	$('.site-search').slideToggle(320);
        $('body').toggleClass('site-search-on');
      });
    }
  };
  
  function fitItems(target,screen,width) {
     space = Math.floor(screen / width);
     items = $(target).length;
     if(items > space) {
        items = space;
     } 
     return items;
  }
  
  Drupal.behaviors.OwlCarousel = {
    attach: function(context,settings){
    
      $(".overview .view-content").owlCarousel({
        loop: true,
        center: true,
        width: 260,
        autoHeight: false,
	dotsEach: true,
        responsive:{
          0:{
            items:1
          },
          600:{            
            items:fitItems(".overview article",600,280)
          },
          860:{
            items:fitItems(".overview article",860,280)
          },
          1120: {
            items: fitItems(".overview article",1120,280)
          },
          1480:{
            items: fitItems(".overview article",1480,280)
          },
          2560: {
            items: fitItems(".overview article",2560,280)
          }
        }
      });
    }
  };  

  Drupal.behaviors.SiteHeaderMenuToggle = {
    attach: function (context, settings) {
      $('.menu-toggle button', context).click(function(event){
        event.preventDefault();
        $('.primary-menu').slideToggle(420);
      });
    }
  };

  Drupal.behaviors.CloseModal = {
    attach: function (context, settings) {
      $('.modal-close', context).click(function(event){
        event.preventDefault();
        $('#modal').fadeOut();
      });
    }
  };

  Drupal.behaviors.PageBack = {
    attach: function (context, settings) {
      $('a.back').click(function(){
          if(document.referrer.indexOf(window.location.hostname) != -1){
              parent.history.back();
              return false;
          }
      });
    }
  };

  Drupal.behaviors.WebformSliderOpen = {
    attach: function (context, settings) {
      // Open slide on click
      $('.webformslider-open').click(function(){
        $(".webformslider").addClass("open");
      });
      // Open slide if on 2nd step or higher. Used for multistep forms
      var checkStep = document.getElementsByName("details[page_num]")[0].value;
      if(checkStep > 1){
        $(".webformslider").addClass("open");
      }
    }
  };
  Drupal.behaviors.WebformSliderClose = {
    attach: function (context, settings) {
      $('.webformslider-close').click(function(){
        $(".webformslider").removeClass("open");
      });
    }
  };
  Drupal.behaviors.WebformSliderMessage = {
    attach: function (context, settings) {
      // Quickfix to move webform error message (or any other message) generated on page.tpl.php to node--doe-mee.tpl.php
      if ($('.webformslider')[0]) {
        $(".messages").prependTo("form");
      }
    }
  };

/*  Drupal.behaviors.SiteWaypoints = {
    attach: function(context,settings) {
      // Back to top button
      var wpSiteHeaderOffscreen = $('.site-header',context).waypoint({
        offset: '-52px',
        handler: function(direction) {
          $('.top-nav a').slideToggle("fast");
        }
      });

      $('.top-nav',context).click(function(event){
      	$("html, body").animate({ scrollTop: 0 }, 444);
      	return false;
      });
    }
  };
*/
})(jQuery);
