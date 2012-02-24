<?php

/**
 * TaskComment filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseTaskCommentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'taskid'     => new sfWidgetFormPropelChoice(array('model' => 'Task', 'add_empty' => true)),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'content'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rank'       => new sfWidgetFormFilterInput(),
      'pid'        => new sfWidgetFormFilterInput(),
      'hidden'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'taskid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Task', 'column' => 'id')),
      'userid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'content'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pid'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hidden'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('task_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaskComment';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'taskid'     => 'ForeignKey',
      'userid'     => 'ForeignKey',
      'content'    => 'Text',
      'created_at' => 'Date',
      'rank'       => 'Number',
      'pid'        => 'Number',
      'hidden'     => 'Boolean',
    );
  }
}
