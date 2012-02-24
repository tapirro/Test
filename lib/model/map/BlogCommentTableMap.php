<?php


/**
 * This class defines the structure of the 'blog_comment' table.
 *
 *
 * This class was autogenerated by Propel 1.4.0-dev on:
 *
 * Wed Mar 31 16:35:30 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class BlogCommentTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.BlogCommentTableMap';

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
		$this->setName('blog_comment');
		$this->setPhpName('BlogComment');
		$this->setClassname('BlogComment');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('blog_comment_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('BLOGID', 'Blogid', 'INTEGER', 'blog', 'ID', true, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'usr', 'ID', true, null, null);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, null, null);
		$this->addColumn('HIDDEN', 'Hidden', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Blog', 'Blog', RelationMap::MANY_TO_ONE, array('blogid' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Usr', 'Usr', RelationMap::MANY_TO_ONE, array('userid' => 'id', ), 'RESTRICT', 'RESTRICT');
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // BlogCommentTableMap
