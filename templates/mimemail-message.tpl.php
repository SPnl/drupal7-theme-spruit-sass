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
  <style type="text/css">
  body { margin: 0; padding: 0; }
  <?php if (!empty($css)) : ?>
    <?php print $css; ?>
  <?php endif; ?>
  table { font-family: Helvetica, Arial, Verdana, Sans-serif; }
  table a:hover { text-decoration: underline !important; }
  tr.content h1, tr.content h2, tr.content h3, tr.content h4 { margin-top: 0px; }
  tr.content p, tr.content ul { color: #333333; margin-top: 0px; line-height: 25px;		/* font-size: 16px!important; */ }
  tr.content li { margin: 0; padding:; }
  tr.content p a { color: #ec1b23; text-decoration: none; }
  tr.content li a { color: #ec1b23; text-decoration: none; }
  tr.content a { color: #ec1b23; }
  tr.content ul { margin: 0 1.4em 0.4em 1.4em; }
  tr.content li { padding: .4em .4em; }
  td.headerblock { color: #fff; }
  a.spButton { display: block; }

  /* if media is supported */

  /* search for responsive email design/support for current lists */
  @media screen and (max-width:400px) {
    tr.spacer td { padding: 4px 0 0 0 !important; border-top: 24px solid #fff; border-bottom: 24px solid #fff; }
    .content td { padding: 8px !important; }
    #content-container { margin: 0 !important; }
  }
</style>
</head>
<body id="mimemail-body" <?php if ($module && $key): print 'class="'. $module .'-'. $key .'"'; endif; ?>>
  <!-- Full width wrapper -->
  <table bgcolor="#f1f1f1" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, Verdana, Sans-serif; padding: 0;" width="100%">
    <tbody><!-- ## Image ## -->
      <tr class="header">
        <td valign="top" width="100%"> </td>
      </tr>
      <!-- ## Main article ## -->
      <tr>
        <td width="100%"><!-- Content wrapper 632px width -->
          <table border="0" cellpadding="0" cellspacing="0" class="table" style="margin: 0 auto; max-width:632px;" width="100%">
            <tbody>
              <tr>
                <td class="cell" valign="top" width="100%">
                  <table border="0" cellpadding="0" cellspacing="0" class="table" id="content-container" style="width:600px;margin:4% 2% 0px 2%;">
                    <tbody>
                      <tr class="header">
                        <td style="border-top:5px solid #ec1b23;" valign="top" width="100%"></td>
                      </tr>
                      <tr class="content">
                        <td bgcolor="#ffffff" style="padding:4%;" valign="top" width="100%">
                          <!-- ## Article ## -->
                          <?php print $body; ?>
                          <!--  ## End article ## -->
                        </td>
                      </tr>
                      <tr>
                        <td style="height: 16px; text-align: center;"><span style="color:#f1f1f1;">*</span><!--spacer--></td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Footer -->

                  <table border="0" cellpadding="0" cellspacing="0" class="table" id="footer" width="100%">
                    <tbody>
                      <tr><!-- Disclaimer -->
                        <td align="center" class="content" valign="middle">
                          <p align="center" style="color:#a6a6a6; font-size:12px; font-family:Helvetica,Arial,sans-serif; margin-bottom:15px; padding:12px; line-height:13px;">
                            Je ontvangt deze mail omdat je een formulier op <?php print $base_url; ?> hebt ingevuld. Is dat niet het geval,
                               stuur dan een e-mail naar <a href="mailto:webmaster@sp.nl">webmaster@sp.nl</a>.
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Footer banner -->

                  <table border="0" cellpadding="0" cellspacing="0" class="table" id="footer-banner" style="padding-bottom:12px;" width="100%">
                    <tbody>
                      <tr class="header">
                        <td> </td>
                        <td style="text-align:center;" valign="top" width="107"><img alt="SP logo" src="https://www.spnet.nl/sites/default/files/civicrm/persist/contribute/images/sp_mail.png" style="max-width: 300px; height: 60px; width: 107px; display: block; margin: 0px auto;" /></td>
                        <td> </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

</body>
</html>
