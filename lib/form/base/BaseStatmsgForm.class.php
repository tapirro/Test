<?php

/**
 * Statmsg form base class.
 *
 * @method Statmsg getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseStatmsgForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'content'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Statmsg', 'column' => 'id', 'required' => false)),
      'userid'     => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'content'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('statmsg[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statmsg';
  }


}
