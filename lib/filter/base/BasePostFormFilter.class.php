<?php

/**
 * Post filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BasePostFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'blogid'     => new sfWidgetFormPropelChoice(array('model' => 'Blog', 'add_empty' => true)),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'title'      => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rank'       => new sfWidgetFormFilterInput(),
      'hidden'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'modeid'     => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'blogid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Blog', 'column' => 'id')),
      'userid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'title'      => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hidden'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'modeid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mode', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'blogid'     => 'ForeignKey',
      'userid'     => 'ForeignKey',
      'title'      => 'Text',
      'content'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'rank'       => 'Number',
      'hidden'     => 'Boolean',
      'modeid'     => 'ForeignKey',
    );
  }
}
