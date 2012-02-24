<?php

/**
 * TaskComment form base class.
 *
 * @method TaskComment getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseTaskCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'taskid'     => new sfWidgetFormPropelChoice(array('model' => 'Task', 'add_empty' => false)),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'content'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'rank'       => new sfWidgetFormInputText(),
      'pid'        => new sfWidgetFormInputText(),
      'hidden'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'TaskComment', 'column' => 'id', 'required' => false)),
      'taskid'     => new sfValidatorPropelChoice(array('model' => 'Task', 'column' => 'id')),
      'userid'     => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'content'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'pid'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'hidden'     => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('task_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaskComment';
  }


}
