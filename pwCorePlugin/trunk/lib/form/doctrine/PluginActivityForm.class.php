<?php

/**
 * Activity form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginActivityForm extends BaseActivityForm
{
  /**
   * Customizes the activity form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   *
   * @since r9
   */
  public function setup()
  {
    parent::setup();    
    
    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'], $this['association_id']);
    unset($this['description']);

    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['created_by'] = new sfValidatorInteger();
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    }

    $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['association_id'] = new sfValidatorInteger();
    $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
    $this->setDefault('state', 1);
    $this->validatorSchema['state'] = new sfValidatorBoolean();
    $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    $this->widgetSchema['description']->setAttribute('class', 'formInputLarge');
    $this->validatorSchema['description'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array('model' => 'Activity', 'column' => array('label', 'association_id')), array('invalid' => 'Cette activité existe déjà')));
    $this->setLabels();
  }

  /*
   * Set displayed field names
   */
  protected function setLabels()
  {
    $this->widgetSchema->setLabels(array(
      'label'       => 'Libellé',
      'description' => 'Description',
    ));
  }
}
