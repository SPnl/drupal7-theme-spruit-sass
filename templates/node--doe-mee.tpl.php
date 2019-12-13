<?php
/**
 * @file
 * Default theme implementation to display a node.
 */

// set variables for background image for leftside
$background_image_uri = $content['field_cta_image']['#items'][0]['uri'];
$background_image = image_style_url('splitscreen', $background_image_uri);

$state = drupal_get_query_parameters(['state']);


// retrieve overlay setting from node and add as css class later
$i = $content['field_cta_overlay'][0]['#markup'];
$overlay = '';
switch ($i){
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

// Get taxonomy information
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
</div>

<div class="fullscreen clearfix <?php print $classes; ?>"<?php print $attributes; ?>>
  
  <div class="leftside" style="background-image:url(<?php print $background_image; ?>)">
    <div class="titlewrapper">
      <div class="titleblock">
        <h1 class="sidetitle"><?php if(isset($content['field_cta_title'][0]['#markup'])) { print $content['field_cta_title'][0]['#markup']; } ?></h1>
        <div class="subtitle"><?php if(isset($content['field_cta_subtitle'])) { print render($content['field_cta_subtitle']);} ?></div>
        <button class="btn webformslider-open webformslider-open-left" id="cta-primary"><?php if (isset($content['field_cta_button'])) { print render($content['field_cta_button']); }?></button>
        <div class="read-more mobile-only"><a href="#read-more" class="btn btn-ghost-color2 small scroll-to">Meer weten &#x21B4;</a></div>
      </div>
    </div>
    <div class="leftoverlay <?php print $overlay; ?>">
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
      <h1><?php print render($title); ?></h1>
      
      <?php $counter_format = field_get_items('node', $node, 'field_counter_format'); ?>
        
        <?php if (!empty($counter_format[0]['value'])) {
           include('inc/doe-mee-counter.tpl.php');
        }
        ?>

      <article><?php print render($content['body']); ?></article>
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
      <p>De gegevens die je op deze site invult worden veilig opgeslagen door de SP. Meer informatie over het gebruik lees je in onze <a href="https://www.sp.nl/privacy" target="_blank">privacy voorwaarden</a></p>
      <p>&copy; <a href="https://www.sp.nl" target="_blank">SP</a> Snouckaertlaan 70, 3811 MB Amersfoort</p>
    </div>
  </div>
</div>
