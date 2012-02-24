<?php

/**
 * SfTag form base class.
 *
 * @method SfTag getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseSfTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'is_triple'        => new sfWidgetFormInputText(),
      'triple_namespace' => new sfWidgetFormInputText(),
      'triple_key'       => new sfWidgetFormInputText(),
      'triple_value'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'SfTag', 'column' => 'id', 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'is_triple'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'triple_namespace' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'triple_key'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'triple_value'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfTag';
  }


}
