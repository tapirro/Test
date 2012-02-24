<?php

/**
 * stat actions.
 *
 * @package    taskana
 * @subpackage stat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class statActions extends sfActions
{
  public function executeIndex()
  {
    $this->statList = StatPeer::doSelect(new Criteria());
  }

  public function executeCreate()
  {
    $this->form = new StatForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = new StatForm(StatPeer::retrieveByPk($request->getParameter('id')));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new StatForm(StatPeer::retrieveByPk($request->getParameter('id')));

    $this->form->bind($request->getParameter('stat'));
    if ($this->form->isValid())
    {
      $stat = $this->form->save();

      $this->redirect('stat/edit?id='.$stat->getId());
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($stat = StatPeer::retrieveByPk($request->getParameter('id')));

    $stat->delete();

    $this->redirect('stat/index');
  }
}
