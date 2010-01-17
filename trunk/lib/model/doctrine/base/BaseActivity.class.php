<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Activity', 'doctrine');

/**
 * BaseActivity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $label
 * @property integer $state
 * @property integer $association_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property Association $Association
 * @property Member $CreatedByMember
 * @property Member $UpdatedByMember
 * @property Doctrine_Collection $Expenses
 * @property Doctrine_Collection $Incomes
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getLabel()           Returns the current record's "label" value
 * @method integer             getState()           Returns the current record's "state" value
 * @method integer             getAssociationId()   Returns the current record's "association_id" value
 * @method integer             getCreatedBy()       Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()       Returns the current record's "updated_by" value
 * @method Association         getAssociation()     Returns the current record's "Association" value
 * @method Member              getCreatedByMember() Returns the current record's "CreatedByMember" value
 * @method Member              getUpdatedByMember() Returns the current record's "UpdatedByMember" value
 * @method Doctrine_Collection getExpenses()        Returns the current record's "Expenses" collection
 * @method Doctrine_Collection getIncomes()         Returns the current record's "Incomes" collection
 * @method Activity            setId()              Sets the current record's "id" value
 * @method Activity            setLabel()           Sets the current record's "label" value
 * @method Activity            setState()           Sets the current record's "state" value
 * @method Activity            setAssociationId()   Sets the current record's "association_id" value
 * @method Activity            setCreatedBy()       Sets the current record's "created_by" value
 * @method Activity            setUpdatedBy()       Sets the current record's "updated_by" value
 * @method Activity            setAssociation()     Sets the current record's "Association" value
 * @method Activity            setCreatedByMember() Sets the current record's "CreatedByMember" value
 * @method Activity            setUpdatedByMember() Sets the current record's "UpdatedByMember" value
 * @method Activity            setExpenses()        Sets the current record's "Expenses" collection
 * @method Activity            setIncomes()         Sets the current record's "Incomes" collection
 * 
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseActivity extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('piwam_activity');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('state', 'integer', 1, array(
             'type' => 'integer',
             'default' => '1',
             'length' => '1',
             ));
        $this->hasColumn('association_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Association', array(
             'local' => 'association_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Member as CreatedByMember', array(
             'local' => 'created_by',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Member as UpdatedByMember', array(
             'local' => 'updated_by',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('Expense as Expenses', array(
             'local' => 'id',
             'foreign' => 'activity_id'));

        $this->hasMany('Income as Incomes', array(
             'local' => 'id',
             'foreign' => 'activity_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}