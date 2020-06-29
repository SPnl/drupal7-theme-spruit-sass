(function($) {
    Drupal.behaviors.SiteHeaderSearchToggle = {
        attach: function(context, settings) {
            $('.site-search').hide();
            $('.search-toggle a', context).click(function(event) {
                event.preventDefault();
                $('.site-search').slideToggle(320);
                $('body').toggleClass('site-search-on');
            });
        }
    };

    function fitItems(target, screen, width) {
        space = Math.floor(screen / width);
        items = $(target).length;
        if (items > space) {
            items = space;
        }
        return items;
    }
    /* currently not used
    Drupal.behaviors.OwlCarousel = {
        attach: function(context, settings) {
            $(".overview .view-content").owlCarousel({
                loop: true,
                center: true,
                width: 260,
                autoHeight: false,
                dotsEach: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: fitItems(".overview article", 600, 280)
                    },
                    860: {
                        items: fitItems(".overview article", 860, 280)
                    },
                    1120: {
                        items: fitItems(".overview article", 1120, 280)
                    },
                    1480: {
                        items: fitItems(".overview article", 1480, 280)
                    },
                    2560: {
                        items: fitItems(".overview article", 2560, 280)
                    }
                }
            });
        }
    };
    */
    Drupal.behaviors.SiteHeaderMenuToggle = {
        attach: function(context, settings) {
            $('.menu-toggle button', context).click(function(event) {
                event.preventDefault();
                $('.primary-menu').slideToggle(420);
            });
        }
    };
    Drupal.behaviors.CloseModal = {
        attach: function(context, settings) {
            $('.modal-close', context).click(function(event) {
                event.preventDefault();
                $('#modal').fadeOut();
            });
        }
    };
    Drupal.behaviors.PageBack = {
        attach: function(context, settings) {
            $('a.back').click(function() {
                if (document.referrer.indexOf(window.location.hostname) != -1) {
                    parent.history.back();
                    return false;
                }
            });
        }
    };
    Drupal.behaviors.WebformSliderOpen = {
        attach: function(context, settings) {
            // Open slide on click
            $('.webformslider-open').click(function() {
                $(".webformslider").addClass("open");
            });
            // Open slide if on 2nd step or higher. Used for multistep forms
            if ($('input[name="details[page_num]"]').length) {
                var checkStep = document.getElementsByName("details[page_num]")[0].value;
                if (checkStep > 1) {
                    $(".webformslider").addClass("open-instant");
                }
            }
            // SIMPLE BROWSER STATISTICS FOR SPLIT WEBFORM
            // enable and adjust to wishes
            // make sure to add matching fields in webform to store the information
            /*
            $('.webformslider-open-left').click(function() {
                document.getElementsByName("submitted[track]")[0].value = "left";
                var breed = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
                var hoog = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                document.getElementsByName("submitted[breed]")[0].value = breed;
                document.getElementsByName("submitted[hoog]")[0].value = hoog;

            });
            $('.webformslider-open-right').click(function() {
                document.getElementsByName("submitted[track]")[0].value = "right";
                var breed = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
                var hoog = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                document.getElementsByName("submitted[breed]")[0].value = breed;
                document.getElementsByName("submitted[hoog]")[0].value = hoog;

            });
            */
        }
    };
    Drupal.behaviors.WebformSliderClose = {
        attach: function(context, settings) {
            $('.webformslider-close').click(function() {
                $(".webformslider").removeClass("open");
                $(".webformslider").removeClass("open-instant");
            });
        }
    };
    Drupal.behaviors.WebformSliderMessage = {
        attach: function(context, settings) {
            // Quickfix to move webform error message (or any other message) generated on page.tpl.php to node--doe-mee.tpl.php
            if ($('.webformslider')[0]) {
                $(".messages").prependTo("form");
            }
        }
    };
    Drupal.behaviors.smoothScroll = {
        attach: function(context, settings) {
            $(".scroll-to").click(function(event) {
                event.preventDefault();
                $([document.documentElement, document.body]).animate({
                    scrollTop: $($(this).attr('href')).offset().top - 16
                }, 720);
            });
        }
    };
    Drupal.behaviors.scrollToError = {
        attach: function(context, settings) {
            // on pageload scroll to first .error class
            if (typeof $(".error") === 'defined') {
                $('html, body').animate({
                    scrollTop: $(".error").offset().top
                }, 100);
            }
        }
    };
    Drupal.behaviors.trimEmailField = {
        // Remove spaces in email on change
        // The jquery clientside validation plugin doesn't allow trailing spaces for email input and responds with 'invalid email'.
        // The user can be unaware of the space and unable to continue the form
        attach: function(context, settings) {
            $("input[type=email]").change(function(e) {
                emailTrimmed = $(this).val().replace(/ /g, '');
                $(this).val(emailTrimmed);
            });
        }
    };
    Drupal.behaviors.hideCookieBar = {
        // QUICKFIX: Hides cookiebar if user adds input before accepting cookies
        // This prevents user losing input after accepting terms
        attach: function(context, settings) {
            $(".webform-client-form input").focus(function() {
                // Hide slidingbar
                $('#sliding-popup').addClass("hidden");
            });
        }
    };
    /*
    Drupal.behaviors.removeInvalidCharsTextarea = {
        // QUICKFIX: Remove invalid chars (such as emoji) from text & textarea on change until UTF8mb4 support
        attach: function(context, settings) {
            $('input[type=text], textarea').change(function(e) {
                // SET RANGE (using javascript UTF-16 code units)
                var ranges = [
                  '[\ue000-\uf8ff]',
                  '[\u2011-\u26ff]',
                  '\ud83c[\udf00-\udfff]', // U+1F300 to U+1F3FF
                  '\ud83d[\udc00-\udfff]', // U+1F400 to U+1F64F
                  '\ud83d[\ude80-\udeff]', // U+1F680 to U+1F6FF
                  '\ud83e[\udd10-\uddff]'
                ];             
                // REMOVE INVALID CHARS
                textCleaned = $(this).val().replace(new RegExp(ranges.join('|'), 'g'), ' ');
                $(this).val(textCleaned);
            });
        }
    };
    */
    Drupal.behaviors.accordion = {
        // Add a simple JS accordion (see w3)
        attach: function(context, settings) {
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                  panel.style.display = "none";
                } else {
                  panel.style.display = "block";
                }
              });
            }
        }
    };

})(jQuery);
