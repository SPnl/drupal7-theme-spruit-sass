<?php
/**
 * @file
 * Default theme implementation to display a node.
 */

// set variables for background image for leftside
$image_uri = $content['field_cta_image']['#items'][0]['uri'];
// $style = $content['field_cta_image'][0]['#item']['image_style'];
$style = 'splitscreen';
$background = image_style_url($style, $image_uri); 

?>
<div class="webformslider">
  <a href="#" class="webformslider-toggle close">x</a>
  <?php print render($content['webform']); ?>
</div>
<div class="fullscreen clearfix <?php print $classes; ?>"<?php print $attributes; ?>>
  
  <div class="leftside" style="background-image:url(<?php print $background; ?>)">
    <div class="titlewrapper">
      <div class="titleblock">
        <h1 class="sidetitle"><?php print $content['field_cta_title'][0]['#markup']; ?></h1>
        <div class="subtitle"><?php print render($content['field_cta_subtitle']); ?></div>
        <a href="#" class="btn webformslider-toggle"><?php print render($content['field_cta_button']); ?></a>
      </div>
    </div>
    <div class="leftoverlay"></div>
  </div>

  <div class="rightside">
    
    <?php print render($title_prefix); ?>
    <?php if (!$page && $title): ?>
      <header>
        <h2><?php print $title_attributes; ?><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      </header>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <section class="article-content"<?php print $content_attributes; ?>>
      <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['webform']);
        hide($content['field_cta_image']);
        hide($content['field_cta_title']);
      ?>
      <span class="time"><?php print format_date($node->created, 'custom', 'j F Y');?></span>
      <h1><?php print render($title); ?></h1>
      <article><?php print render($content); ?></article>
    </section>
    
    <footer class="footer-short">
      <p>Meer informatie, <a href="https://www.sp.nl/privacy" target="_blank">privacy voorwaarden</a> en nieuws vind je op: <a href="https://www.sp.nl/?ref=doemee-sp-nl&landing=0"><strong>www.sp.nl</strong></a><br>&copy; <a href="https://www.sp.nl" target="_blank">SP</a> Snouckaertlaan 70, 3811 MB Amersfoort.</p>
    </footer>

    <div id="stickyfooter">
        <a href="#" class="btn-invert small webformslider-toggle"><?php print render($content['field_cta_button']); ?></a>
    </div>

    <?php print render($content['links']); ?>
  </div>
</div>