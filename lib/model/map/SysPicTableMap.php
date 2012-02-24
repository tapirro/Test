<?php


/**
 * This class defines the structure of the 'sys_pic' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0-dev on:
 *
 * Wed Mar 31 16:35:32 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SysPicTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SysPicTableMap';

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
		$this->setName('sys_pic');
		$this->setPhpName('SysPic');
		$this->setClassname('SysPic');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('sys_pic_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('FILENAME', 'Filename', 'VARCHAR', false, 128, null);
		$this->addColumn('HIDDEN', 'Hidden', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Blog', 'Blog', RelationMap::ONE_TO_MANY, array('id' => 'spic', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Usr', 'Usr', RelationMap::ONE_TO_MANY, array('id' => 'upic', ), 'RESTRICT', 'RESTRICT');
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
		);
	} // getBehaviors()

} // SysPicTableMap