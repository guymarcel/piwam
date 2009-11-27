<?php
/**
 * Doctrine class to retrieve rows of Member table
 *
 * @author  Adrien Mogenet
 * @since   1.2
 */
class MemberTable extends Doctrine_Table
{
  /**
   * Value of state if user account is disabled
   *
   * @var integer
   */
  const STATE_DISABLED  = 0;

  /**
   * Value of state if user account is enabled
   *
   * @var integer
   */
  const STATE_ENABLED   = 1;

  /**
   * Value of state if user account is pending
   *
   * @var integer
   */
  const STATE_PENDING   = 2;

  /**
   * Get the list of active members who belong to the
   * association $id
   *
   * @param   integer           $association_id
   * @param   integer           $page
   * @param   string            $column
   * @return  sfDoctrinePager
   */
  public static function getPagerOrderBy($association_id, $page = 1, $column = 'lastname')
  {
    $q = Doctrine_Query::create()
          ->select('m.*')
          ->from('Member m')
          ->where('m.association_id = ?', $association_id)
          ->andWhere('m.state = ?', self::STATE_ENABLED);

    $pager = new sfDoctrinePager('Member', 20);
    $pager->setQuery($q);
    $pager->setPage($page);

    return $pager;
  }

  /**
   * Retrieve pending user accounts
   *
   * @param   integer           $association_id
   * @return  array of Member
   */
  public static function getPendingMembers($association_id)
  {
    $q = Doctrine_Query::create()
          ->select('m.*')
          ->from('Member m')
          ->where('m.association_id = ?', $association_id)
          ->andWhere('state = ?', self::STATE_PENDING)
          ->fetchArray();
  }

  /**
   * Try to select users matching $username and $password.
   *
   * @param   string    $username
   * @param   string    $password
   * @return  Member
   */
  public static function getByUsernameAndPassword($username, $password)
  {

  }
}