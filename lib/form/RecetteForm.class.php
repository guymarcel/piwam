<?php

/**
 * Recette form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RecetteForm extends BaseRecetteForm
{
    /**
     * Customizes the account form. There is a lot of fields to unset in order
     * to re-create them from scratch with custom behaviour, especially the
     * hidden references (association, granted user id...)
     *
     * @since	r9
     */
    public function configure()
    {
        unset($this['created_at'], 		$this['updated_at']);
        unset($this['created_by'], 	$this['updated_by']);
        unset($this['state'], 			$this['association_id']);

        if ($this->getObject()->isNew()) {
            $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
            $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
            $this->setDefault('created_by', sfContext::getInstance()->getUser()->getAttribute('user_id', null, 'user'));
            $this->setDefault('association_id', sfContext::getInstance()->getUser()->getAttribute('association_id', null, 'user'));
            $this->validatorSchema['association_id'] = new sfValidatorInteger();
            $this->validatorSchema['created_by'] = new sfValidatorInteger();
        }

        $id = sfContext::getInstance()->getUser()->getAttribute('association_id', null, 'user');
        $this->widgetSchema['account_id']->setOption('criteria', accountPeer::getCriteriaForAssociationId($id));
        $this->widgetSchema['activity_id']->setOption('criteria', activityPeer::getCriteriaForAssociationId($id));

        $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
        $this->setDefault('state', 1);

        $this->validatorSchema['updated_by'] = new sfValidatorInteger();
        $this->validatorSchema['state'] = new sfValidatorBoolean();
        $this->validatorSchema['amount'] = new sfValidatorAmount(array('min' => 0), array('min' => 'ne peut être négatif'));

        // r19 : customize the appearance
        $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');
        $this->widgetSchema['amount']->setAttribute('class', 'formInputShort');
        $this->widgetSchema['account_id']->setAttribute('class', 'formInputLarge');
        $this->widgetSchema['activity_id']->setAttribute('class', 'formInputLarge');
        sfContext::getInstance()->getConfiguration()->loadHelpers("Asset");
        $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
			'image'		=> image_path('calendar.gif'),
  			'config' 	=> '{}',
			'culture'	=> 'fr_FR',
			'format'	=> '%day%.%month%.%year%',
        ));
        $this->setDefault('date', date('y-m-d'));
    }
}
