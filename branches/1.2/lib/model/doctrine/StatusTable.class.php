<?php
/**
 * Implements operations on Status table
 *
 * @package     piwam
 * @subpackage  model
 * @author      adrien
 * @since       1.2
 */
class StatusTable extends Doctrine_Table
{
  /**
   * Value of state field when disabled
   *
   * @var integer
   */
  const STATE_DISABLED    = 0;

  /**
   * Value of state field when enabled
   *
   * @var integer
   */
  const STATE_ENABLED     = 1;

  /**
   * Retrieve an unique Status by its id
   *
   * @param   integer $id
   * @return  Status
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('Status s')
          ->where('s.id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Retrieve existing status for association $id
   *
   * @param   integer         $id
   * @return  array of Status
   */
  public static function getEnabledForAssociation($id)
  {
    $q = self::getQueryEnabledForAssociation($id);

    return $q->execute();
  }

  /**
   * Get just the Doctrine_Query object to retrieve enabled Status
   * of association $id. Used in forms
   *
   * @param   integer       $id
   * @return  Doctrine_Query
   */
  public static function getQueryEnabledForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('Status s')
          ->where('s.association_id = ?',  $id)
          ->andWhere('s.state = ?', self::STATE_ENABLED)
          ->orderBy('s.label ASC');

    return $q;
  }
}