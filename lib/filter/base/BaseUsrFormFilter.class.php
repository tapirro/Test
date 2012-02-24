<?php

/**
 * Usr filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseUsrFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pass'       => new sfWidgetFormFilterInput(),
      'login'      => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'upic'       => new sfWidgetFormPropelChoice(array('model' => 'SysPic', 'add_empty' => true)),
      'rank'       => new sfWidgetFormFilterInput(),
      'balance'    => new sfWidgetFormFilterInput(),
      'bot'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hidden'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'color'      => new sfWidgetFormFilterInput(),
      'date_birth' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'pass'       => new sfValidatorPass(array('required' => false)),
      'login'      => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'upic'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SysPic', 'column' => 'id')),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'balance'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bot'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hidden'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'color'      => new sfValidatorPass(array('required' => false)),
      'date_birth' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('usr_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usr';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'pass'       => 'Text',
      'login'      => 'Text',
      'email'      => 'Text',
      'upic'       => 'ForeignKey',
      'rank'       => 'Number',
      'balance'    => 'Number',
      'bot'        => 'Boolean',
      'hidden'     => 'Boolean',
      'color'      => 'Text',
      'date_birth' => 'Date',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
