<?php

/**
 * SfTag filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseSfTagFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'is_triple'        => new sfWidgetFormFilterInput(),
      'triple_namespace' => new sfWidgetFormFilterInput(),
      'triple_key'       => new sfWidgetFormFilterInput(),
      'triple_value'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'is_triple'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'triple_namespace' => new sfValidatorPass(array('required' => false)),
      'triple_key'       => new sfValidatorPass(array('required' => false)),
      'triple_value'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfTag';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'is_triple'        => 'Number',
      'triple_namespace' => 'Text',
      'triple_key'       => 'Text',
      'triple_value'     => 'Text',
    );
  }
}
