<?php

/**
 * SysPic filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseSysPicFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'filename' => new sfWidgetFormFilterInput(),
      'hidden'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'filename' => new sfValidatorPass(array('required' => false)),
      'hidden'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sys_pic_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SysPic';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'filename' => 'Text',
      'hidden'   => 'Boolean',
    );
  }
}
