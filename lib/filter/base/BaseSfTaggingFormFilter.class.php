<?php

/**
 * SfTagging filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseSfTaggingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'         => new sfWidgetFormPropelChoice(array('model' => 'SfTag', 'add_empty' => true)),
      'taggable_model' => new sfWidgetFormFilterInput(),
      'taggable_id'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tag_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SfTag', 'column' => 'id')),
      'taggable_model' => new sfValidatorPass(array('required' => false)),
      'taggable_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_tagging_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfTagging';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'tag_id'         => 'ForeignKey',
      'taggable_model' => 'Text',
      'taggable_id'    => 'Number',
    );
  }
}
