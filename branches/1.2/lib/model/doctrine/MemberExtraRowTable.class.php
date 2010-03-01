<?php
/**
 * Implement operations on MemberExtraRow table. This table
 * stores extra rows that we would like to add to member
 * definition.
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class MemberExtraRowTable extends Doctrine_Table
{
  /**
   * Retrieve object MemberExtraRow by specifying an Id
   *
   * @param   integer         $id
   * @return  MemberExtraRow
   */
  public function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('MemberExtraRow r')
          ->where('id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Retrieve rows for association $id
   *
   * @param   integer         $id
   * @return  array of MemberExtraRow
   */
  public static function getForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('MemberExtraRow r')
          ->where('r.association_id = ?', $id)
          ->orderBy('r.id DESC');

    return $q->execute();
  }
}
