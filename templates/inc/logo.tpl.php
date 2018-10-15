<?php if (theme_get_setting("default_logo")) :?>
<!--[if gte IE 9]>
  <?php print file_get_contents(path_to_theme().'/logo2.svg'); ?>
<![endif]-->
<!--[if lte IE 8]>
  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
<![endif]-->
<?php else: ?>
  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
<?php endif; ?>
