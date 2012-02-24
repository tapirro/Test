<?php

/**
 * PostComment form base class.
 *
 * @method PostComment getObject() Returns the current form's model object
 *
 * @package    taskana
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 23064 2009-10-14 21:00:23Z Kris.Wallsmith $
 */
class BasePostCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'postid'     => new sfWidgetFormPropelChoice(array('model' => 'Post', 'add_empty' => false)),
      'userid'     => new sfWidgetFormPropelChoice(array('model' => 'Usr', 'add_empty' => false)),
      'content'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'rank'       => new sfWidgetFormInputText(),
      'pid'        => new sfWidgetFormInputText(),
      'hidden'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PostComment', 'column' => 'id', 'required' => false)),
      'postid'     => new sfValidatorPropelChoice(array('model' => 'Post', 'column' => 'id')),
      'userid'     => new sfValidatorPropelChoice(array('model' => 'Usr', 'column' => 'id')),
      'content'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'pid'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'hidden'     => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostComment';
  }


}
