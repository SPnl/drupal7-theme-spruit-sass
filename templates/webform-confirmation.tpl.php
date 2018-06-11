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



// pm(get_defined_vars());
dpm($variables['node']);

// check if node type == doe mee
if ($node->type == 'doe_mee'){
	$options = ['absolute'=> TRUE];
	$link = urlencode(url("node/$node->nid", $options));
	$node_title = htmlspecialchars($node->title);
	$cta_title = urlencode($node->field_cta_title['und'][0]['value']);
	$cta_subtitle = urlencode($node->field_cta_subtitle['und'][0]['value']);
	$facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$link;
	$og_description = urlencode($node->metatags['nl']['og:description']['value']);
	$twitter = 'https://twitter.com/home?status='.$og_description.' - Ga naar: '.$link;
	$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.$link.'&title='.$cta_title.'&summary=&source=';
	$email_body = rawurlencode($node->metatags['nl']['og:description']['value'].'<br>Meld je ook aan via: ').url("node/$node->nid", $options).'?ref=share-mail';
}

?>
<style>
/* quickfix */
header.content-header {
	display: none!important;
}
.page {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    flex-direction: column;
    justify-content: space-between;
    display: flex;
    overflow: auto;
}
</style>

<?php print $progressbar; ?>

<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-8 text-center">
			<div class="webform-confirmation">
			  	<?php if ($confirmation_message): ?>
			    	<?php print $confirmation_message ?>
			  	<?php elseif ($node->type == 'doe_mee'): ?>
				  	<h1 class="title"><?php print $node->field_bedankt_title['und'][0]['value'];?></h1>
				    <p><?php print $node->field_bedankt_body['und'][0]['value'];?></p>
				    <h2>Help mee door deze actie te delen</h2>
				    <ul class="share">
					  <li><a target="_blank" class="btn small facebook" href="<?php print $facebook; ?>">Facebook</a></li>
					  <li><a target="_blank" class="btn small twitter" href="<?php print $twitter; ?>">Twitter</a></li>
					  <li><a target="_blank" class="btn small linkedin" href="<?php print $linkedin; ?>">Linkedin</a></li>
					  <li><a class="btn small email" href="mailto: ?&subject=<?php print $node_title ?>&body=<?php print $email_body; ?>">E-mail</a></li>
					</ul>
				<?php else: ?>
					<h1 class="title">Bedankt!</h1>
				    <p>Bedankt voor je steun voor onze actie. We nemen snel contact met je op.</p>
			  	<?php endif; ?>
			</div>
			<div class="webform-privacy-statement text-center">
				<p>Je gegevens worden opgeslagen door de SP en enkel gebruikt voor deze actie, tenzij je zelf op het formulier iets anders hebt aangegeven. Als je vragen hebt over hoe we omgaan met je gegevens, lees ons <a href="https://www.sp.nl/privacy">privacy statement</a> of neem contact op met <a href="mailto:privacy@sp.nl">privacy@sp.nl</a></p>
			</div>
		</div>
	</div>
</div>

<div class="links">
  <a href="<?php print $url; ?>"><?php print t('Go back to the form') ?></a>
</div>
