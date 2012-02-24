<?php

/**
 * Task form base class.
 *
 * @method Task getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseTaskForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'authorid'   => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'title'      => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'rank'       => new sfWidgetFormInputText(),
      'hidden'     => new sfWidgetFormInputCheckbox(),
      'statid'     => new sfWidgetFormPropelChoice(array('model' => 'Stat', 'add_empty' => false)),
      'urgencyid'  => new sfWidgetFormPropelChoice(array('model' => 'Urgency', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Task', 'column' => 'id', 'required' => false)),
      'userid'     => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'authorid'   => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'title'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'hidden'     => new sfValidatorBoolean(array('required' => false)),
      'statid'     => new sfValidatorPropelChoice(array('model' => 'Stat', 'column' => 'id')),
      'urgencyid'  => new sfValidatorPropelChoice(array('model' => 'Urgency', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('task[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }


}
