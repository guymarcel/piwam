<?php
/* 
 * Partial to display a new EntryForm instance
 */
?>
<table class="formtable">
  <tfoot>
    <tr>
      <td colspan="2">
        <input type="submit" value="Valider" class="blue button" />
      </td>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <th><?php echo $form['date']->renderLabel() ?></th>
      <td><?php echo $form['date'] ?></td>
    </tr>
    <tr>
      <th><?php echo $form['label']->renderLabel() ?></th>
      <td><?php echo $form['label'] ?></td>
    </tr>
    <tr>
      <th><?php echo $form['credits']->renderLabel() ?></th>
      <td>
        <table>
          <tfoot>
            <tr>
              <td>
                <button id="add_credit" type="button">Ajouter un crédit</button>
              </td>
            </tr>
          </tfoot>
          <tbody id="credits_container">
            <!-- Credits input will be dynamically added here -->
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['debits']->renderLabel() ?></th>
      <td>
        <table>
          <tfoot>
            <tr>
              <td colspan="2">
                <button id="add_debit" type="button">Ajouter un débit</button>
              </td>
            </tr>
          </tfoot>
          <tbody id="debits_container">
            <!-- Debits input will be dynamically added here -->
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
