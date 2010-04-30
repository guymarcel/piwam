<?php
/*
 * This file is part of the piwam package.
 * (c) Adrien Mogenet <adrien.mogenet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Form with all the MemberExtraRows defined by the user
 *
 * @package     piwam
 * @subpackage  lib
 * @author      adrien
 * @since       1.2
 */
class MemberExtraRowsForm extends sfForm
{
  /**
   * Dynamically configure the existing extra rows
   */
  public function configure()
  {
    $id = 1;
    $rows = MemberExtraRowTable::getForAssociation($id);

    foreach ($rows as $row)
    {
      $isRequired = $row->getRequired();

      switch ($row->getType())
      {
        case 'string':
          $maxLength = (is_numeric($row->getParameters())) ? $row->getParameters() : 255;
          $options = array(
            'required'    => $isRequired,
            'max_length'  => $maxLength,
          );
          $messages = array(
            'max_length' => $maxLength . ' caractères max.'
          );
          $this->widgetSchema[$row->getId()] = new sfWidgetFormInput();
          $this->widgetSchema[$row->getId()]->setAttribute('class', 'formInputNormal');
          $this->validatorSchema[$row->getId()] = new sfValidatorString($options, $messages);
          break;

        case 'date':
          $this->widgetSchema[$row->getId()] = new sfWidgetFormJQueryDate(array(
            'image'       => image_path('calendar.gif'),
            'config'      => '{}',
            'culture'     => 'fr_FR',
            'date_widget' => new sfWidgetFormDate(array(
              'format' => '%day%.%month%.%year%',
              'years'  => DateTools::rangeOfYears(date('Y'), 1900)
            ))
          ));
          $this->validatorSchema[$row->getId()] = new sfValidatorDate(array('required' => $isRequired));
          break;

        case 'text':
          $this->widgetSchema[$row->getId()] = new sfWidgetFormTextarea();
          $this->validatorSchema[$row->getId()] = new sfValidatorString(array('required' => $isRequired));
          break;

        case 'choices':
          $choices = $row->getParametersAsChoices();
          $this->widgetSchema[$row->getId()] = new sfWidgetFormChoice(array('choices' => $choices));
          $this->widgetSchema[$row->getId()]->setAttribute('class', 'formInputNormal');
          $this->validatorSchema[$row->getId()] = new sfValidatorChoice(array('choices' => $choices));
          break;
          
        case 'boolean':
          $this->widgetSchema[$row->getId()] = new sfWidgetFormInputCheckbox();
          $this->validatorSchema[$row->getId()] = new sfValidatorBoolean();
          break;
      }

      $this->widgetSchema[$row->getId()]->setLabel($row->getLabel());

      /*
       * Set the default value if we are editing fields of a member and
       * a value already exists
       */

      if ($memberId = $this->getOption('member_id', false))
      {
        $value = MemberExtraValueTable::getValueForMember($row->getId(), $memberId);

        if (null != $value)
        {
          $this->setDefault($row->getId(), $value->getValue());
        }
      }
    }
  }
}
?>
