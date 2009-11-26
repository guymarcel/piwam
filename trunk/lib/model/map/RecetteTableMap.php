<?php


/**
 * This class defines the structure of the 'piwam_recette' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Wed Nov 25 20:26:42 2009
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RecetteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RecetteTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('piwam_recette');
		$this->setPhpName('Recette');
		$this->setClassname('Recette');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('LIBELLE', 'Libelle', 'VARCHAR', true, 255, null);
		$this->addForeignKey('ASSOCIATION_ID', 'AssociationId', 'INTEGER', 'piwam_association', 'ID', true, null, null);
		$this->addColumn('MONTANT', 'Montant', 'DECIMAL', true, 10, null);
		$this->addForeignKey('COMPTE_ID', 'CompteId', 'INTEGER', 'piwam_compte', 'ID', true, null, null);
		$this->addForeignKey('ACTIVITE_ID', 'ActiviteId', 'INTEGER', 'piwam_activite', 'ID', true, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('PERCUE', 'Percue', 'BOOLEAN', false, null, true);
		$this->addForeignKey('ENREGISTRE_PAR', 'EnregistrePar', 'INTEGER', 'piwam_membre', 'ID', true, null, null);
		$this->addForeignKey('MIS_A_JOUR_PAR', 'MisAJourPar', 'INTEGER', 'piwam_membre', 'ID', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Association', 'Association', RelationMap::MANY_TO_ONE, array('association_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Compte', 'Compte', RelationMap::MANY_TO_ONE, array('compte_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Activite', 'Activite', RelationMap::MANY_TO_ONE, array('activite_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('MembreRelatedByEnregistrePar', 'Membre', RelationMap::MANY_TO_ONE, array('enregistre_par' => 'id', ), 'CASCADE', null);
    $this->addRelation('MembreRelatedByMisAJourPar', 'Membre', RelationMap::MANY_TO_ONE, array('mis_a_jour_par' => 'id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // RecetteTableMap
