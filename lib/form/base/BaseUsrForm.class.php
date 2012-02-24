<?php

/**
 * Usr form base class.
 *
 * @method Usr getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseUsrForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'pass'       => new sfWidgetFormInputText(),
      'login'      => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'upic'       => new sfWidgetFormPropelChoice(array('model' => 'SysPic', 'add_empty' => true)),
      'rank'       => new sfWidgetFormInputText(),
      'balance'    => new sfWidgetFormInputText(),
      'bot'        => new sfWidgetFormInputCheckbox(),
      'hidden'     => new sfWidgetFormInputCheckbox(),
      'color'      => new sfWidgetFormInputText(),
      'date_birth' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id', 'required' => false)),
      'pass'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'login'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'upic'       => new sfValidatorPropelChoice(array('model' => 'SysPic', 'column' => 'id', 'required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'balance'    => new sfValidatorNumber(array('required' => false)),
      'bot'        => new sfValidatorBoolean(array('required' => false)),
      'hidden'     => new sfValidatorBoolean(array('required' => false)),
      'color'      => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'date_birth' => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Usr', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('usr[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usr';
  }


}
