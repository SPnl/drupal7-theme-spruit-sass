<?php
/**
 * @file
 * Default theme implementation to display a node.
 */

// set variables for background image for leftside
$background_image_uri = $content['field_cta_image']['#items'][0]['uri'];
$background_image_style = 'splitscreen';
$background_image = image_style_url($background_image_style, $background_image_uri); 

// retrieve overlay setting from node and add as css class later
$i = $content['field_cta_overlay'][0]['#markup'];
switch ($i){
  case '0%':
    $overlay = '';
    break;
  case '10%':
    $overlay = 'overlay-10';
    break;
  case '20%':
    $overlay = 'overlay-20';
    break;
  case '30%':
    $overlay = 'overlay-30';
    break;
  case '40%':
    $overlay = 'overlay-40';
    break;
  case '50%':
    $overlay = 'overlay-50';
    break;
  case '60%':
    $overlay = 'overlay-60';
    break;
  case '70%':
    $overlay = 'overlay-70';
    break;
}

// get taxonomy information
$personen = $node->field_personen['und'];
dpm($personen);

?>
<div class="webformslider">
  <a href="#" class="webformslider-toggle close">x</a>
  <?php print render($content['webform']); ?>
</div>
<div class="fullscreen clearfix <?php print $classes; ?>"<?php print $attributes; ?>>
  
  <div class="leftside" style="background-image:url(<?php print $background_image; ?>)">
    <div class="titlewrapper">
      <div class="titleblock">
        <h1 class="sidetitle"><?php print $content['field_cta_title'][0]['#markup']; ?></h1>
        <div class="subtitle"><?php print render($content['field_cta_subtitle']); ?></div>
        <button class="btn webformslider-toggle"><?php print render($content['field_cta_button']); ?></button>
      </div>
    </div>
    <div class="leftoverlay <?php print $overlay; ?>"></div>
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
    
    <footer class="footer-short">
      <p>Meer informatie, <a href="https://www.sp.nl/privacy" target="_blank">privacy voorwaarden</a> en nieuws vind je op: <a href="https://www.sp.nl/?ref=doemee-sp-nl&landing=0"><strong>www.sp.nl</strong></a><br>&copy; <a href="https://www.sp.nl" target="_blank">SP</a> Snouckaertlaan 70, 3811 MB Amersfoort.</p>
    </footer>

    <div id="stickyfooter">
        <button class="btn small webformslider-toggle"><?php print render($content['field_cta_button']); ?></button>
    </div>

    <?php print render($content['links']); ?>
  </div>
</div>