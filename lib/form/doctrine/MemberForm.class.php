<?php

/**
 * Member form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MemberForm extends BaseMemberForm
{
  private $_firstRegistration = false;

  /**
   * Determines if we are performing the registration of the
   * first user or not
   *
   * @return  boolean
   * @since r33
   */
  public function isFirstRegistration()
  {
    return $this->_firstRegistration;
  }

  /**
   * Customizes the Member form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   *
   * r33 : At the beginning of the process we determine if we are registering
   *     the first Membre of a new association or not
   *
   * @since r7
   */
  public function configure()
  {
    $context = $this->getOption('context');
    $this->_firstRegistration = $this->getOption('first', false);

    if ($this->getOption('associationId'))
    {
      $associationId = $this->getOption('associationId');
    }

    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'], $this['association_id']);

    if ($this->getObject()->isNew())
    {
      // If this is the user is not the one who
      // is currently registering a new Association

      if (! $this->isFirstRegistration())
      {
        $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
        $this->setDefault('created_by', $context->getUser()->getUserId());
        $this->validatorSchema['created_by'] = new sfValidatorInteger(array('required' => false));
      }
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    }

    $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
    $this->setDefault('association_id', $associationId);
    $this->validatorSchema['association_id'] = new sfValidatorInteger();

    $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
    //$this->widgetSchema['status_id']->setOption('criteria', StatusTable::getCriteriaEnabledForAssociation($associationId));


    unset($this['password']);
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();

    /*
     * if this is not the registration of the first user who is
     * setting up a new Association, password can be empty (and
     * the user won't be able to log in)
     * Otherwise, user MUST give a passsword and pseudo
     */

    if (! $this->isFirstRegistration())
    {
      $this->validatorSchema['password'] = new sfValidatorString(array('required' => false));

      if ($this->_isUsernameMandatory($associationId))
      {
        // Password is not mandatory because if we are here, we are
        // editing the existing admin user
        // So if no password has been provided, password won't be
        // erased

        $this->validatorSchema['username'] = new sfValidatorString(array('required' => true));
      }
      else
      {
        $this->validatorSchema['username'] = new sfValidatorString(array('required' => false));
      }
    }
    else
    {
      $this->validatorSchema['password'] = new sfValidatorString(array('required' => true));
      $this->validatorSchema['username'] = new sfValidatorString(array('required' => true));
    }

    /**
     * @todo
     * FIXME
     */
    //$this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(array('model' => 'Membre', 'column' => 'pseudo'), array('invalid' => 'Ce pseudo existe déjà')));

    unset($this->validatorSchema['email']);
    unset($this->validatorSchema['website']);
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => false));
    $this->validatorSchema['website'] = new sfValidatorUrl(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorInteger();

    unset ($this->widgetSchema['country']);
    $countries = array('FR', 'BE', 'ES', 'DE', 'NL', 'CH', 'LU');
    $this->widgetSchema['country'] = new sfWidgetFormI18nSelectCountry(array('culture' => 'fr', 'countries' => $countries));
    $this->setDefault('country', 'FR');

    unset ($this->widgetSchema['subscription_date']);
    $context->getConfiguration()->loadHelpers("Asset");
    $this->widgetSchema['subscription_date'] = new sfWidgetFormJQueryDate(array(
      'image'   => image_path('calendar.gif'),
      'config'  => '{}',
      'culture' => 'fr_FR',
      'format'  => '%day%.%month%.%year%',
    ));

    $this->widgetSchema['picture'] = new sfWidgetFormInputFile();
    $this->validatorSchema['picture'] = new sfValidatorFile(array(  'path'       => MemberTable::PICTURE_DIR,
                                                                    'required'   => false,
                                                                    'mime_types' => 'web_images',
                                                                    'max_size'   => 1024 * 500
                                                                  ),
                                                            array(  'max_size'   => 'La taille du fichier est trop importante',
                                                                    'mime_types' => 'Seules les images sont acceptées'
                                                                  )
                                                            );
    $this->setDefault('subscription_date', date('d-m-Y'));
    $this->setDefault('state', 1);
    $this->_setCssClasses();
  }

  /*
   * Check if we can delete the pseudo (we can't delete the pseudo of the
   * "master" member
   */
  private function _isUsernameMandatory($associationId)
  {
    if ((false === $this->getObject()->isNew()) && $this->getObject()->getId())
    {
      $association = AssociationPeer::retrieveByPK($associationId);

      if ($this->getObject()->getId() == $association->getCreatedBy())
      {
        return true;
      }

      return false;
    }
    else
    {
      return false;
    }
  }

  /*
   * Set an appropriate CSS class to each form element
   */
  private function _setCssClasses()
  {
    $this->widgetSchema['lastname']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['firstname']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['username']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['password']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['street']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['zipcode']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['country']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['website']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['email']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['phone_home']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['phone_mobile']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['status_id']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['country']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['picture']->setAttribute('class', 'file');
  }
}
