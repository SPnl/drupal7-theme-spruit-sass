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




// check if node type == doe mee
if ($node->type == 'doe_mee'){
	$options = ['absolute'=> TRUE];
	$link = "http://www.tijdvoorrechtvaardigheid.nl/?ref=shared-done";
	$node_title = htmlspecialchars($node->title);
	$cta_title = urlencode($node->field_cta_title['und'][0]['value']);
	$cta_subtitle = urlencode($node->field_cta_subtitle['und'][0]['value']);
	$facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$link;
	$og_description = urlencode($node->metatags['nl']['og:description']['value']);
	$twitter = 'https://twitter.com/home?status='.urlencode('Als we samen opstaan voor een rechtvaardig land, dan is er meer mogelijk dan je denkt. Word jij ook Vriend voor Rechtvaardigheid? #tijdvoorrechtvaardigheid ').$link;
	$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.$link.'&title='.$cta_title.'&summary=&source=';
	$email_body = rawurlencode($node->metatags['nl']['og:description']['value'].' -- Meld je ook aan via:'.$link.'-mail');
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

<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-8 text-center">
			<div class="webform-confirmation">
<h1>Bedankt voor je steun!</h1>
<p>Wat fantastisch dat ook jij onze beweging steunt! Samen staan we op voor een rechtvaardige samenleving. We kiezen voor hoop. Hoop dat de rechtvaardigheid het wint van het ieder-voor-zich-denken. Door Vriend voor Rechtvaardigheid te worden heb jij een eerste stap gezet.</p>
<p>Je ontvangt zo snel mogelijk jouw welkomstpakket. En er is meer: als vriend van rechtvaardigheid ben je van harte uitgenodigd om naar de speciale Meet & Greet met Lilian Marijnissen te komen!</p>

<?php
  $submissions = webform_get_submissions($node->nid);
  $url = "/vrienden/meet-en-greet";
  $data = array();
  if($submissions != NULL) {
    if(!empty($submissions[$sid]->data[3][0])) {
      $data['eml'] = $submissions[$sid]->data[2][0];
    }
    if(!empty($submissions[$sid]->data[4][0])) {
      $data['tel'] = $submissions[$sid]->data[4][0];
    }
    if(count($data) == 2) {
      $url = $url . "?eml=" . $data['eml'] . "&tel=" .$data['tel'];
    } elseif(count($data) == 1) {
      foreach($data as $key => $value) {
         $url = $url ."?". $key ."=" .$value;
      }
    }
  }
?>
<p><a href="<?php print($url); ?>" class="btn">Aanmelden voor <br/>Meet & greet</a></p>

				    <h3>Of help meteen mee door meer mensen over onze beweging te vertellen:</h3>
				    <ul class="share">
					  <li><a target="_blank" class="btn small facebook" href="<?php print $facebook; ?>">Facebook</a></li>
					  <li><a target="_blank" class="btn small twitter" href="<?php print $twitter; ?>">Twitter</a></li>
					  <li><a class="btn small email" href="mailto:?&subject=Word jij ook Vriend voor Rechtvaardigheid?&body=Ik%20vind%20dat%20het%20tijd%20is%20voor%20een%20rechtvaardig%20land.%20Want%20een%20samenleving%0Awaarin%20miljarden%20weggegeven%20worden%20aan%20buitenlandse%20aandeelhouders%20en%20multinationals,%20terwijl%20onze%20zorgverleners,%20agenten%20en%20leraren%20moeten%20vechten%20voor%20een%20beetje%20waardering,%20noem%20ik%20niet%20rechtvaardig.%20Wij%20gaan%20dat%20samen%20veranderen.%20Door%20Vriend%20voor%20Rechtvaardigheid%20te%20worden%20kan%20jij%20ook%20een%20eerste%20stap%20zetten.%20Doe%20jij%20ook%20mee?%20%0A%0AJe%20kunt%20je%20aanmelden%20op%20www.tijdvoorrechtvaardigheid.nl%20-%20dan%20ontvang%20je%20een%20mooi%20welkomstpakket!%0A%0ASamen%20staan%20we%20aan%20het%20begin%20van%20een%20nieuwe%20tijd.%20Een%20tijd%20voor%20rechtvaardigheid.">E-mail</a></li>
					</ul>
			</div>
			<div class="webform-privacy-statement text-center">
				<p>Je gegevens worden opgeslagen door de SP en alleen gebruikt voor 'Tijd voor Rechtvaardigheid', tenzij je meer hebt aangegeven. Als je vragen hebt over hoe we omgaan met je gegevens, lees ons <a href="https://www.sp.nl/privacy">privacy statement</a> of neem contact op met <a href="mailto:privacy@sp.nl">privacy@sp.nl</a></p>
			</div>
		</div>
	</div>
</div>

