<?php
/**
 * Member
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
class Member extends BaseMember
{
  /**
   * Get Member object as string
   *
   * @return string
   */
  public function __toString()
  {
    return $this->getFirstname() . ' ' . $this->getLastname();
  }

  /**
   * Overrides the setPassword to encrypt it
   *
   * @param   string  $v
   * @return  Member  $this
   */
  public function setPassword($v)
  {
    if ($v !== '')
    {
      return $this->_set('password', sha1($v));
    }
    else
    {
      return $this;
    }
  }

  /**
   * Overrides the setUsername method (manage the null case)
   *
   * @param   string  $v
   * @return  Member  $this
   */
  public function setUsername($v)
  {
    if ($v == "")
    {
      $v = null;
    }

    return $this->_set('username', $v);
  }

  /**
   * Returns the whole URI of user's picture, or 'no-picture' image
   * if he doesn't have one
   *
   * @return string
   */
  public function getPictureURI()
  {
    if ($this->getPicture())
    {
      return '/uploads/trombinoscope/' . $this->getPicture();
    }
    else
    {
      return 'no_picture';
    }
  }

  /**
   * Remove all existing credentials that have been set to the
   * Member previously
   */
  public function resetAcl()
  {
    $q = Doctrine_Query::create()
          ->delete('AclCredential c')
          ->where('c.member_id = ?', $this->getId());

    return $q->execute();
  }

  /**
   * Add a new credential to the member
   *
   * @param   string  $code   : Code of the AclAction
   */
  public function addCredential($code)
  {
    $credential = new AclCredential();
    $credential->setMemberId($this->getId());
    $credential->setAclAction(AclActionTable::getByCode($code));
    $credential->save();
  }

  /**
   *
   * @todo    implements
   * @return  boolean
   */
  public function hasToPayDue()
  {
    return false;
  }

  /**
   * Overrides getter for City field.
   *
   * @return  string  well-formated city
   */
  public function getCity()
  {
    return mb_convert_case($this->_get('city'), MB_CASE_UPPER, "UTF8");
  }

  /**
   * Overrides getter for Lastname field
   *
   * @return  string  well-formated lastname
   */
  public function getLastname()
  {
    return mb_convert_case($this->_get('lastname'), MB_CASE_TITLE, "UTF8");
  }

  /**
   * Overrides getter for Firstname field
   *
   * @return  string  well-formated lastname
   */
  public function getFirstname()
  {
    return mb_convert_case($this->_get('firstname'), MB_CASE_TITLE, "UTF8");
  }

  /**
   * Overrides getter for Street field
   *
   * @return  string  well-formated lastname
   */
  public function getStreet()
  {
    return mb_convert_case($this->_get('street'), MB_CASE_TITLE, "UTF8");
  }

  /**
   * Get the whole adress of the member
   *
   * @return string
   */
  public function getCompleteAddress()
  {
    return StringTools::to7bit($this->getStreet()) . ', ' . $this->getZipcode() . ' ' . StringTools::to7bit($this->getCity());
  }
}