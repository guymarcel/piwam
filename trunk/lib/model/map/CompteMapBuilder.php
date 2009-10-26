<?php


/**
 * This class adds structure of 'piwam_compte' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon Oct 26 23:18:37 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CompteMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CompteMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ComptePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ComptePeer::TABLE_NAME);
		$tMap->setPhpName('Compte');
		$tMap->setClassname('Compte');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('LIBELLE', 'Libelle', 'VARCHAR', true, 255);

		$tMap->addForeignKey('ASSOCIATION_ID', 'AssociationId', 'INTEGER', 'piwam_association', 'ID', true, null);

		$tMap->addColumn('REFERENCE', 'Reference', 'VARCHAR', true, 64);

		$tMap->addColumn('ACTIF', 'Actif', 'BOOLEAN', false, null);

		$tMap->addForeignKey('ENREGISTRE_PAR', 'EnregistrePar', 'INTEGER', 'piwam_membre', 'ID', false, null);

		$tMap->addForeignKey('MIS_A_JOUR_PAR', 'MisAJourPar', 'INTEGER', 'piwam_membre', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

	} // doBuild()

} // CompteMapBuilder
