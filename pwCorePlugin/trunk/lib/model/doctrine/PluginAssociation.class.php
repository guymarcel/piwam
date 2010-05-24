<?php
/**
 * Association
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class PluginAssociation extends BaseAssociation
{
  /**
   * Ctor
   *
   * @param $table
   * @param $isNewEntry
   * @return unknown_type
   */
  public function __construct($table = null, $isNewEntry = false)
  {
    parent::__construct($table, $isNewEntry);
  }

  /**
   * Add all the default linked entities (Status, Activite...). This method
   * should be called when we register a new Association.
   */
  public function initialize()
  {
    $id = $this->getId();
    
    StatusTable::add('Président', $id);
    StatusTable::add('Trésorier', $id);
    StatusTable::add('Secrétaire', $id);
    StatusTable::add('Membre actif', $id);
    StatusTable::add('Membre d\'honneur', $id);
    ActivityTable::add('Fonctionnement général de l\'association', $id);
    //SimpleAccountTable::add('Caisse de monnaie', 'CAISSE_MONNAIE', $id);
  }

  /**
   * Get the number of members who subscribed to the association
   *
   * @return integer
   */
  public function getNumberOfEnabledMembers()
  {
    $q = Doctrine_Query::create()
          ->select('m.id')
          ->from('Member m')
          ->where('m.association_id = ?', $this->getId())
          ->andWHere('m.state = ?', MemberTable::STATE_ENABLED);
    $n = $q->count();

    return ($n == null) ? 0 : $n;
  }
}