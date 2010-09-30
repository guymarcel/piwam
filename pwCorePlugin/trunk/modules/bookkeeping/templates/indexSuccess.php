<?php
/*
 * This file is part of the piwam package.
 * (c) Adrien Mogenet <adrien.mogenet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use_helper('Number');
use_helper('Date');
?>
<h2>Dernières entrées</h2>
<table class="datalist" summary="last entries">
  <thead>
    <tr>
      <th width="80px">Date</th>
      <th>Label</th>
      <th width="100px">Montant</th>
      <th width="50px">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($entries as $entry): ?>
      <?php include_partial('entryRow', array('entry' => $entry)); ?>
    <?php endforeach ?>
  </tbody>
</table>

<?php echo link_to('Nouvelle entrée', '@bk_new_entry', array('class' => 'button small add grey')) ?>
 &bull; <?php echo link_to('Liste des comptes', '@accounts_list') ?>

<h3>Évolutions</h3>
<h3>Actions</h3>
<ul>
</ul>