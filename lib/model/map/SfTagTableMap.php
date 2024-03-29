<?php


/**
 * This class defines the structure of the 'sf_tag' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0-dev on:
 *
 * Wed Mar 31 16:35:31 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SfTagTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SfTagTableMap';

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
		$this->setName('sf_tag');
		$this->setPhpName('SfTag');
		$this->setClassname('SfTag');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('sf_tag_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 100, null);
		$this->addColumn('IS_TRIPLE', 'IsTriple', 'INTEGER', false, null, null);
		$this->addColumn('TRIPLE_NAMESPACE', 'TripleNamespace', 'VARCHAR', false, 100, null);
		$this->addColumn('TRIPLE_KEY', 'TripleKey', 'VARCHAR', false, 100, null);
		$this->addColumn('TRIPLE_VALUE', 'TripleValue', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SfTagging', 'SfTagging', RelationMap::ONE_TO_MANY, array('id' => 'tag_id', ), 'CASCADE', 'RESTRICT');
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

} // SfTagTableMap
