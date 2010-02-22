<?php
/**
 * MemberExtraRow
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class MemberExtraRow extends BaseMemberExtraRow
{
  /**
   * Parse the 'type' field in Database and return the real
   * type. (ie: `string 123 => string`)
   *
   * @return  string
   */
  public function getType()
  {
    $original = $this->_get('type');
    $split = explode(' ', $original);

    return $split[0];
  }

  /**
   * Return list of parameters as a list of choices. Allows to
   * check errors if any
   *
   * @return  arrau
   */
  public function getParametersAsChoices()
  {
    $original = $this->_get('type');
    $list = substr($original, 8);

    return explode(',', $list);
  }

  /**
   * Return the parameter as an integer. Allows to
   * check errors if any
   */
  public function getParameterAsInt()
  {
    $original = $this->_get('type');
    $split = explode(' ', $original);

    if ((count($split) === 2) && (ctype_digit($split[1])))
    {
      return $split[1];
    }
    else
    {
      throw new sfException('Error when parsing type of extra
        row "' . $this->getLabel() . '"');
    }
  }

  /**
   * Automatically slugify the label
   *
   * @param   string          $value
   * @return  MemberExtraRow  $this
   */
  public function setLabel($value)
  {
    $this->_set('label', $value);
    $this->setSlug(StringTools::slugify($value));

    return $this;
  }
}