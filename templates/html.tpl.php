<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single Drupal page.
 */ ?>
<!doctype html>
<html class="no-js" lang="nl-NL">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
  <?php if(isset($_COOKIE['sp_tc']) && $_COOKIE['sp_tc'] == 2) :?>
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '454884558037853');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=454884558037853&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->
  <?php endif; ?>

  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <nav class="skip-link invisible">
      <a href="#primary-content"><?php print t('Skip to content'); ?></a>
    </nav>
    <!--[if lt IE 9]>
      <p class="browser-upgrade">Je gebruikt <strong>een hele oude</strong> browser. Op <a href="http://browsehappy.com/">browsehappy.com</a> vind je veilige en moderne browsers.</p>
    <![endif]-->
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>
