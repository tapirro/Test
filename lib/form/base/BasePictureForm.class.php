<?php

/**
 * Picture form base class.
 *
 * @method Picture getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BasePictureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'content'      => new sfWidgetFormTextarea(),
      'userid'       => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'owner'        => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'stat'         => new sfWidgetFormInputText(),
      'cost'         => new sfWidgetFormInputText(),
      'name'         => new sfWidgetFormInputText(),
      'modeid'       => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => false)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'rank'         => new sfWidgetFormInputText(),
      'privte'       => new sfWidgetFormInputCheckbox(),
      'not_for_sale' => new sfWidgetFormInputCheckbox(),
      'hidden'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Picture', 'column' => 'id', 'required' => false)),
      'content'      => new sfValidatorString(array('required' => false)),
      'userid'       => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'owner'        => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id', 'required' => false)),
      'stat'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cost'         => new sfValidatorNumber(array('required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'modeid'       => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id')),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'rank'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'empty_value' => '0')),
      'privte'       => new sfValidatorBoolean(array('required' => false)),
      'not_for_sale' => new sfValidatorBoolean(array('required' => false)),
      'hidden'       => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Picture', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('picture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Picture';
  }


}
