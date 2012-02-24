<?php

/**
 * Blog form base class.
 *
 * @method Blog getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseBlogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'userid'  => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'title'   => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
      'spic'    => new sfWidgetFormPropelChoice(array('model' => 'SysPic', 'add_empty' => true)),
      'rank'    => new sfWidgetFormInputText(),
      'hidden'  => new sfWidgetFormInputCheckbox(),
      'modeid'  => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Blog', 'column' => 'id', 'required' => false)),
      'userid'  => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'title'   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'content' => new sfValidatorString(array('required' => false)),
      'spic'    => new sfValidatorPropelChoice(array('model' => 'SysPic', 'column' => 'id', 'required' => false)),
      'rank'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'empty_value' => '0')),
      'hidden'  => new sfValidatorBoolean(array('required' => false)),
      'modeid'  => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('blog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blog';
  }


}
