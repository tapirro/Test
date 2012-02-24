<?php

/**
 * Rank form base class.
 *
 * @method Rank getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseRankForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'userid'   => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'objectid' => new sfWidgetFormInputText(),
      'model'    => new sfWidgetFormInputText(),
      'value'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Rank', 'column' => 'id', 'required' => false)),
      'userid'   => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'objectid' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'model'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'value'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rank[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rank';
  }


}
