<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      -->
    </style>
    <?php endif; ?>
  </head>
  <body>
  <style>
       @media only screen
        and (min-device-width: 320px)
        and (max-device-width: 680px){
          #message-content {
            width: 100%!important;
          }
      }
   </style>

       <table width="100%" border="0" cellpadding="0" cellspacing="0" id="message-wrapper">
        <tr>
          <td align="center"">
            <table width="100%" id="message-content">
              <tr border="0" cellpadding="0" cellspacing="0">
            <td>
              <?php print $body; ?>
            </td>
         </tr>
         <tr border="0" cellpadding="0" cellspacing="0">
             <td id="message-footer">
               <p><small>Deze mail is verzonden door de SP aan <em><?php print $recipient; ?></em><br/>Als je geen mails meer van ons wilt ontvangen op dit adres <a href="mailto:geenmail@sp.nl">meld je dan af</a></small></p>
             </td>
         </tr>
            </table>
          </td>
        </tr>
       </table>
    </div>
  </body>
</html>
