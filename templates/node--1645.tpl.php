<?php
/**
 * @file
 * Default theme implementation to display a node.
 */

// set variables for background image for leftside
$background_image_uri = $content['field_cta_image']['#items'][0]['uri'];
$background_image_style = 'original';
$background_image = image_style_url($background_image_style, $background_image_uri);

// get taxonomy information
$personen = isset($node->field_personen['und']) ? $node->field_personen['und'] : '';

/*
 * Check for copyright information and show it
 */
$copyright = '';
if (!empty($content['field_cta_image_copyright'][0]['#markup'])){
  $copyright = 'Foto: '.$content['field_cta_image_copyright'][0]['#markup'];
}

?>
<div class="webformslider">
  <a href="#" class="webformslider-close close">x</a>
  <?php print render($content['webform']); ?>
      <div class="footer-short">
      <p>Meer informatie, <a href="https://www.sp.nl/privacy" target="_blank">privacy voorwaarden</a> en nieuws vind je op: <a href="https://www.sp.nl/?ref=doemee-sp-nl&amp;landing=0"><strong>www.sp.nl</strong></a><br>© <a href="https://www.sp.nl" target="_blank">SP</a>Souckaertlaan 70, 3811 MB Amersfoort.</p>
    </div>
</div>
<div class="fullscreen clearfix <?php print $classes; ?>"<?php print $attributes; ?>>
  
  <div class="leftside">
    <div class="titlewrapper">
      <div class="titleblock">
        <h1 class="sidetitle"><?php //print $content['field_cta_title'][0]['#markup']; ?></h1>
        <div class="subtitle"><?php //print render($content['field_cta_subtitle']); ?></div>
        <button class="btn webformslider-open" id="cta-primary"><?php print render($content['field_cta_button']); ?></button>
        <div class="read-more mobile-only"><a href="#read-more" class="btn btn-ghost-color2 small scroll-to">Meer weten &#x21B4;</a></div>
      </div>
    </div>
    <div class="leftoverlay <?php //print $overlay; ?>">
      <div class="copyright"><?php print $copyright; ?></div>
    </div>
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
      <a id="read-more"></a>
      <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['webform']);
        hide($content['field_cta_image']);
        hide($content['field_cta_image_copyright']);
        hide($content['field_cta_title']);
        hide($content['field_cta_overlay']);
        hide($content['field_bedankt_title']);
        hide($content['field_bedankt_body']);
        hide($content['field_personen']);
      ?>
      <span class="time"><?php // enable this to show created date: print format_date($node->created, 'custom', 'j F Y');?></span>
      <h1><?php print render($title); ?></h1>
      <article><?php print render($content); ?></article>
      <?php
        if (!empty($personen)){
          print '<div id="personen-wrapper">';
            print "<h2>Betrokken SP'ers</h2>";
            foreach ($personen as $x=>$persoon){
              $persoon_image_uri = $persoon['taxonomy_term']->field_introductie_afbeelding['und'][0]['uri'];
              $persoon_image_style = 'persoon';
              $persoon_image = image_style_url($persoon_image_style, $persoon_image_uri);

              print '<div class="persoon">';
              print '<div class="afbeelding"><img src="'.$persoon_image.'"></div>';
              print '<h3>'.$persoon['taxonomy_term']->name.'</h3>';
              print '<span class="functie">'.$persoon['taxonomy_term']->field_rol_of_functie['und'][0]['value'].'</span>';
              print '</div>';
            }
          print '</div>';
        }
      ?>
    </section>
    <div class="footer-short">
    <p>Meer informatie, <a href="https://www.sp.nl/privacy" target="_blank">privacy voorwaarden</a> en nieuws vind je op: <a href="https://www.sp.nl/?ref=doemee-sp-nl&amp;landing=0"><strong>www.sp.nl</strong></a><br>© <a href="https://www.sp.nl" target="_blank">SP</a> Snouckaertlaan 70, 3811 MB Amersfoort.</p>
    </div>
    
    <div id="stickyfooter">
        <button class="btn small webformslider-open"><?php print render($content['field_cta_button']); ?></button>
    </div>

    <?php print render($content['links']); ?>
  </div>
</div>
