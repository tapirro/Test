<?php

/**
 * Post form base class.
 *
 * @method Post getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BasePostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'blogid'     => new sfWidgetFormPropelChoice(array('model' => 'Blog', 'add_empty' => false)),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'title'      => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'rank'       => new sfWidgetFormInputText(),
      'hidden'     => new sfWidgetFormInputCheckbox(),
      'modeid'     => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Post', 'column' => 'id', 'required' => false)),
      'blogid'     => new sfValidatorPropelChoice(array('model' => 'Blog', 'column' => 'id')),
      'userid'     => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'title'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'hidden'     => new sfValidatorBoolean(array('required' => false)),
      'modeid'     => new sfValidatorPropelChoice(array('model' => 'Mode', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }


}
