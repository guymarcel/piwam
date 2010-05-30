<?php
/*
 * This file is part of the piwam package.
 * (c) Adrien Mogenet <adrien.mogenet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>
<table class="formtable delimited" id="credit_<?php echo $num ?>">
  <tr>
    <th>Opérations</th>
    <td><a href="#" onclick="deleteCredit(<?php echo $num ?>);return false;"><?php echo image_tag('/pwCorePlugin/images/icons/delete', array('alt' => 'Supprimer', 'align' => 'absmiddle')) ?> Supprimer</a></td>
  </tr>
  <tr>
    <th><?php echo $form['amount']->renderLabel() ?></th>
    <td><?php echo $form['amount'] . $form['amount']->renderError() ?><td>
  </tr>
  <tr>
    <th><?php echo $form['credited_account']->renderLabel() ?></th>
    <td><?php echo $form['credited_account'] . $form['credited_account']->renderError() ?><td>
  </tr>
  <tr>
    <th><?php echo $form['label']->renderLabel() ?></th>
    <td><?php echo $form['label'] . $form['label']->renderError() ?><td>
  </tr>
</table>