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




	$options = ['absolute'=> TRUE];
        $share_url = url("pensioenbijeenkomst", $options);
	$link = urlencode($share_url);
	$node_title = htmlspecialchars('Praat mee over onze pensioenen');
	$cta_title = 'Praat mee over onze pensioenen';
	$cta_subtitle = '';
	$facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$link;
	$og_description = urlencode('Wij gaan graag met u in gesprek over wat er volgens u moet gebeuren om te zorgen dat iedereen op tijd kan genieten van een zeker pensioen. Daarom willen wij u graag uitnodigen voor één van onze drie online bijeenkomsten.');
	$twitter = 'https://twitter.com/intent/tweet?text='.$og_description.urlencode(' - Ga naar: ').$link;
	$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.$link.'&title='.$cta_title.'&summary=&source=';
	$email_body = rawurlencode('<p>Bijna een jaar geleden werd er een pensioenakkoord gesloten door vakbonden, werkgevers en politici. Op dit moment worden er door die partijen verdere afspraken gemaakt over hoe het nieuwe pensioenakkoord er precies uit moet gaan zien. Veel mensen maken zich zorgen over hun pensioen. Nieuws over de gevolgen van de Corona crisis voor pensioenfondsen en de berichten die uitlekken over de onderhandelingen stellen niet gerust. Verlagingen van pensioenen dreigen en indexatie lijkt al helemaal niet meer in beeld. En doordat de AOW-leeftijd blijft stijgen is op tijd kunnen stoppen met werken nog helemaal niet geregeld. Dat moet anders!</p><p>De SP gaat graag met u in gesprek over wat u vind dat er moet gebeuren om te zorgen dat iedereen op tijd kan genieten van een zeker pensioen. Meld u daarom ook aan voor één van de drie online bijeenkomsten</p><p>Ik heb me al aangemeld, meld u zich ook aan? ').$share_url.'?ref=share-mail';

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
				  	<h1 class="title"><?php print $node->field_bedankt_title['und'][0]['value'];?></h1>
				    <p><?php print $node->field_bedankt_body['und'][0]['value'];?></p>
				    <h2>Nodig ook je vrienden uit</h2>
				    <ul class="share">
					  <li><a target="_blank" class="btn small facebook" href="<?php print $facebook; ?>">Facebook</a></li>
					  <li><a target="_blank" class="btn small twitter" href="<?php print $twitter; ?>">Twitter</a></li>
					  <li><a target="_blank" class="btn small linkedin" href="<?php print $linkedin; ?>">Linkedin</a></li>
					  <li><a class="btn small email" href="mailto: ?&subject=<?php print $node_title ?>&body=<?php print $email_body; ?>">E-mail</a></li>
					</ul>
				<?php else: ?>
					<h1 class="title">Bedankt!</h1>
				    <p>Bedankt voor je steun. We nemen snel contact met je op.</p>
			  	<?php endif; ?>
			</div>
			<div class="webform-privacy-statement text-center">
				<p>Uw gegevens worden opgeslagen door de SP en enkel gebruikt voor deze uitnodiging, tenzij u zelf op het formulier iets anders hebt aangegeven. Als u vragen heeft over hoe we omgaan met uw gegevens, lees ons <a href="https://www.sp.nl/privacy">privacy statement</a> of neem contact op met <a href="mailto:privacy@sp.nl">privacy@sp.nl</a></p>
			</div>
		</div>
	</div>
</div>

<div class="links">
  <a href="<?php print $url; ?>"><?php print t('Go back to the form') ?></a>
</div>
