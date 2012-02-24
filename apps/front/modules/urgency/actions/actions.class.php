<?php

/**
 * urgency actions.
 *
 * @package    taskana
 * @subpackage urgency
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class urgencyActions extends sfActions
{
  public function executeIndex()
  {
    $this->urgencyList = UrgencyPeer::doSelect(new Criteria());
  }

  public function executeCreate()
  {
    $this->form = new UrgencyForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = new UrgencyForm(UrgencyPeer::retrieveByPk($request->getParameter('id')));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new UrgencyForm(UrgencyPeer::retrieveByPk($request->getParameter('id')));

    $this->form->bind($request->getParameter('urgency'));
    if ($this->form->isValid())
    {
      $urgency = $this->form->save();

      $this->redirect('urgency/edit?id='.$urgency->getId());
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($urgency = UrgencyPeer::retrieveByPk($request->getParameter('id')));

    $urgency->delete();

    $this->redirect('urgency/index');
  }
}
