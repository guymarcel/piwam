<?php

/**
 * AclCredential
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
class AclCredential extends BaseAclCredential
{
  /**
   * Get ID of root module
   *
   * @return integer
   */
  public function getModuleId()
  {
    return $this->getAclAction()->getAclModuleId();
  }

  /**
   * Get code corresponding to the credential
   *
   * @return string
   */
  public function getCode()
  {
    return $this->getAclAction()->getCode();
  }
}