<?php
  
  $counterCount = 0;

  if (function_exists('webform_get_submission_count')) {
    $counterCount = webform_get_submission_count($node->nid);
  }
  
  if($counterCount > 0 && $counter_format[0]['value'] == 'goals' ) {
    $counterTarget = (int) substr($counterCount, 0, 1);
    $counterTarget++;

    if (strlen($counterCount) == 2) {
      $counterTarget = 100;
    }
    if (strlen($counterCount) == 3) {
      $counterTarget = $counterTarget * 100;
    }
    if (strlen($counterCount) == 4) {
      $counterTarget = $counterTarget * 1000;
    }
    if (strlen($counterCount) == 5) {
      $counterTarget = $counterTarget * 10000;
    }
    if (strlen($counterCount) == 6) {
      $counterTarget = $counterTarget * 100000;
    }

    $counterProgress = round(($counterCount * 100) / $counterTarget);
    if($counterProgress == 100) {
      $counterProgress = 99; // Leave some space if nearly a hundred
    }

    // Strings for rendering
    $counterTarget = number_format($counterTarget, 0, ',', '.');
  }

  $counterCount  = number_format($counterCount, 0, ',', '.');
  ?>

<div class="counter counter--<?php print $counter_format[0]['value']; ?>">
  <div class="counter--count"><?php print $counterCount; ?></div>
  <?php if($counter_format[0]['value'] == 'goals') : ?>
  <div class="counter--progress-wrapper">
    <div class="counter--progress">
      <div class="progress--progress" style="width: <?php print $counterProgress;?>%;"></div>
    </div>
  </div>
  <div class="counter--target"><?php print $counterTarget;?></div>
<?php endif;?>
</div>