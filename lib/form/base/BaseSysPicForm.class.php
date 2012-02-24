<?php

/**
 * SysPic form base class.
 *
 * @method SysPic getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseSysPicForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'filename' => new sfWidgetFormInputText(),
      'hidden'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'SysPic', 'column' => 'id', 'required' => false)),
      'filename' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'hidden'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SysPic', 'column' => array('filename')))
    );

    $this->widgetSchema->setNameFormat('sys_pic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SysPic';
  }


}
