<?php

/**
 * Rank filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseRankFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'   => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'objectid' => new sfWidgetFormFilterInput(),
      'model'    => new sfWidgetFormFilterInput(),
      'value'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'userid'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'objectid' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'model'    => new sfValidatorPass(array('required' => false)),
      'value'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rank_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rank';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'userid'   => 'ForeignKey',
      'objectid' => 'Number',
      'model'    => 'Text',
      'value'    => 'Number',
    );
  }
}
