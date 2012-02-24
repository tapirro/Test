<?php

/**
 * Picture filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BasePictureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'content'      => new sfWidgetFormFilterInput(),
      'userid'       => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'owner'        => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'stat'         => new sfWidgetFormFilterInput(),
      'cost'         => new sfWidgetFormFilterInput(),
      'name'         => new sfWidgetFormFilterInput(),
      'modeid'       => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rank'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'privte'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'not_for_sale' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hidden'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'content'      => new sfValidatorPass(array('required' => false)),
      'userid'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'owner'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'stat'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cost'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'name'         => new sfValidatorPass(array('required' => false)),
      'modeid'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mode', 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rank'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'privte'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'not_for_sale' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hidden'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('picture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Picture';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'content'      => 'Text',
      'userid'       => 'ForeignKey',
      'owner'        => 'ForeignKey',
      'stat'         => 'Number',
      'cost'         => 'Number',
      'name'         => 'Text',
      'modeid'       => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'rank'         => 'Number',
      'privte'       => 'Boolean',
      'not_for_sale' => 'Boolean',
      'hidden'       => 'Boolean',
    );
  }
}
