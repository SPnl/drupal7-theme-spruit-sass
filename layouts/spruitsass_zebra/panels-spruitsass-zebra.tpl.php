<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<?php if (!empty($content['fluid1'])) : ?>
<div class="container-fluid panel-1" <?php if (!empty($css_id)) {print "id=\"$css_id\"";} ?>>
  <div class="row">
    <?php print $content['fluid1']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container1'])) : ?>
<div class="container panel-2">
  <div class="row">
    <?php print $content['container1']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid2'])) : ?>
<div class="container-fluid panel-3">
  <div class="row">
    <?php print $content['fluid2']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container2'])) : ?>
<div class="container panel-4">
  <div class="row">
    <?php print $content['container2']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid3'])) : ?>
<div class="container-fluid panel-5">
  <div class="row">
    <?php print $content['fluid3']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container3'])) : ?>
<div class="container panel-6">
  <div class="row">
    <?php print $content['container3']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid4'])) : ?>
<div class="container-fluid panel-7">
  <div class="row">
    <?php print $content['fluid4']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container4'])) : ?>
<div class="container panel-8">
  <div class="row">
    <?php print $content['container4']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid5'])) : ?>
<div class="container-fluid panel-9">
  <div class="row">
    <?php print $content['fluid5']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container5'])) : ?>
<div class="container panel-10">
  <div class="row">
    <?php print $content['container5']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid6'])) : ?>
<div class="container-fluid panel-11">
  <div class="row">
    <?php print $content['fluid6']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container6'])) : ?>
<div class="container panel-12">
  <div class="row">
    <?php print $content['container6']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid7'])) : ?>
<div class="container-fluid panel-13">
  <div class="row">
    <?php print $content['fluid7']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container7'])) : ?>
<div class="container panel-14">
  <div class="row">
    <?php print $content['container7']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid8'])) : ?>
<div class="container-fluid panel-15">
  <div class="row">
    <?php print $content['fluid8']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container8'])) : ?>
<div class="container panel-16">
  <div class="row">
    <?php print $content['container8']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid9'])) : ?>
<div class="container-fluid panel-17">
  <div class="row">
    <?php print $content['fluid9']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container9'])) : ?>
<div class="container panel-18">
  <div class="row">
    <?php print $content['container9']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['fluid10'])) : ?>
<div class="container-fluid panel-19">
  <div class="row">
    <?php print $content['fluid10']; ?>
  </div>
</div>
<?php endif; ?>

<?php if (!empty($content['container10'])) : ?>
<div class="container panel-20">
  <div class="row">
    <?php print $content['container10']; ?>
  </div>
</div>
<?php endif; ?>

