<?php

/**
 * SfTagging form base class.
 *
 * @method SfTagging getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BaseSfTaggingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'tag_id'         => new sfWidgetFormPropelChoice(array('model' => 'SfTag', 'add_empty' => false)),
      'taggable_model' => new sfWidgetFormInputText(),
      'taggable_id'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'SfTagging', 'column' => 'id', 'required' => false)),
      'tag_id'         => new sfValidatorPropelChoice(array('model' => 'SfTag', 'column' => 'id')),
      'taggable_model' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'taggable_id'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_tagging[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfTagging';
  }


}
