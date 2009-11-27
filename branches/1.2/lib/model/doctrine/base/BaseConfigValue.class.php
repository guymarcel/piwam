<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ConfigValue', 'doctrine');

/**
 * BaseConfigValue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $config_variable_id
 * @property integer $association_id
 * @property string $custom_value
 * @property ConfigVariable $ConfigVariable
 * @property Association $Association
 * 
 * @method integer        getConfigVariableId()   Returns the current record's "config_variable_id" value
 * @method integer        getAssociationId()      Returns the current record's "association_id" value
 * @method string         getCustomValue()        Returns the current record's "custom_value" value
 * @method ConfigVariable getConfigVariable()     Returns the current record's "ConfigVariable" value
 * @method Association    getAssociation()        Returns the current record's "Association" value
 * @method ConfigValue    setConfigVariableId()   Sets the current record's "config_variable_id" value
 * @method ConfigValue    setAssociationId()      Sets the current record's "association_id" value
 * @method ConfigValue    setCustomValue()        Sets the current record's "custom_value" value
 * @method ConfigValue    setConfigVariable()     Sets the current record's "ConfigVariable" value
 * @method ConfigValue    setAssociation()        Sets the current record's "Association" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseConfigValue extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('piwam_config_value');
        $this->hasColumn('config_variable_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('association_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '4',
             ));
        $this->hasColumn('custom_value', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ConfigVariable', array(
             'local' => 'config_variable_id',
             'foreign' => 'id'));

        $this->hasOne('Association', array(
             'local' => 'association_id',
             'foreign' => 'id'));
    }
}