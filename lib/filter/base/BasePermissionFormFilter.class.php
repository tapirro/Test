<?php

/**
 * Permission filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BasePermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'objectid'   => new sfWidgetFormFilterInput(),
      'model'      => new sfWidgetFormFilterInput(),
      'mode'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'userid'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'objectid'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'model'      => new sfValidatorPass(array('required' => false)),
      'mode'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permission';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'userid'     => 'ForeignKey',
      'objectid'   => 'Number',
      'model'      => 'Text',
      'mode'       => 'Number',
      'created_at' => 'Date',
    );
  }
}
