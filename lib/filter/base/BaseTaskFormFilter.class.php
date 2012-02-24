<?php

/**
 * Task filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseTaskFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'authorid'   => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'title'      => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rank'       => new sfWidgetFormFilterInput(),
      'hidden'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'statid'     => new sfWidgetFormPropelChoice(array('model' => 'Stat', 'add_empty' => true)),
      'urgencyid'  => new sfWidgetFormPropelChoice(array('model' => 'Urgency', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'userid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'authorid'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'title'      => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hidden'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'statid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Stat', 'column' => 'id')),
      'urgencyid'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Urgency', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('task_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'userid'     => 'ForeignKey',
      'authorid'   => 'ForeignKey',
      'title'      => 'Text',
      'content'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'rank'       => 'Number',
      'hidden'     => 'Boolean',
      'statid'     => 'ForeignKey',
      'urgencyid'  => 'ForeignKey',
    );
  }
}
