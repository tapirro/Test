<?php

/**
 * Blog filter form base class.
 *
 * @package    taskana
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 22284 2009-09-23 12:29:01Z Kris.Wallsmith $
 */
class BaseBlogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'  => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => true)),
      'title'   => new sfWidgetFormFilterInput(),
      'content' => new sfWidgetFormFilterInput(),
      'spic'    => new sfWidgetFormPropelChoice(array('model' => 'SysPic', 'add_empty' => true)),
      'rank'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hidden'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'modeid'  => new sfWidgetFormPropelChoice(array('model' => 'Mode', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'userid'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usr', 'column' => 'id')),
      'title'   => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
      'spic'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SysPic', 'column' => 'id')),
      'rank'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hidden'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'modeid'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mode', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('blog_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blog';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'userid'  => 'ForeignKey',
      'title'   => 'Text',
      'content' => 'Text',
      'spic'    => 'ForeignKey',
      'rank'    => 'Number',
      'hidden'  => 'Boolean',
      'modeid'  => 'ForeignKey',
    );
  }
}
