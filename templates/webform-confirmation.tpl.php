<?php

/**
 * @file
 * Customize confirmation screen after successful submission.
 *
 * This file may be renamed "webform-confirmation-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-confirmation.tpl.php" to affect all webform confirmations on your
 * site.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $progressbar: The progress bar 100% filled (if configured). This may not
 *   print out anything if a progress bar is not enabled for this node.
 * - $confirmation_message: The confirmation message input by the webform
 *   author.
 * - $sid: The unique submission ID of this submission.
 * - $url: The URL of the form (or for in-block confirmations, the same page).
 */
?>
<?php print $progressbar; ?>

<div class="webform-confirmation">
  <?php if ($confirmation_message): ?>
    <?php print $confirmation_message ?>
  <?php else: ?>
  	<h1>Bedankt!</h1>
    <p>Bedankt voor je steun voor onze actie. We nemen snel contact met je op.</p>
  <?php endif; ?>
  <h3>Privacy</h3>
      <p>Je gegevens worden opgeslagen door de SP en enkel gebruikt voor deze actie, tenzij je zelf op het formulier iets anders hebt aangegeven. Als je vragen hebt over hoe we omgaan met je gegevens, lees ons <a href="https://www.sp.nl/privacy">privacy statement</a> of neem contact op met <a href="mailto:privacy@sp.nl">privacy@sp.nl</a>

<?php dpm($node); ?>

</div>

<div class="links">
  <a href="<?php print $url; ?>"><?php print t('Go back to the form') ?></a>
</div>
