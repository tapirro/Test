<?php

/**
 * task actions.
 *
 * @package    taskana
 * @subpackage task
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class taskActions extends sfActions
{
  public function executeIndex()
  {
     if($this->getUser()->isAuthenticated() ){
        $spectatorId = $this->getUser()->getAttribute('subscriber_id','','subscriber'); 
        }
     if($spectatorId) {$spectator = UsrPeer::retrieveByPk(intval($spectatorId));}
     if(!$spectator){$this->redirect("usr/auth");}
      
      
    $c =  new Criteria();
    $c->addAscendingOrderByColumn(UsrPeer::ID);
    //$c->add(TaskPeer::STATID, 1);
    //$this->taskList = TaskPeer::doSelect($c);
    $this->usrList = UsrPeer::doSelect($c);
    $this->spectator = $spectator;
  
  
  } 
  
    public function executeSmallindex($request)
  {  
    $c =  new Criteria(); 
    $stat = $request->getParameter('stat', 'peer');
    $userid = $request->getParameter('userid');
    $c->add(TaskPeer::USERID, $userid);       
    $c->setLimit(30);             
    switch ($stat) {
        case 'peer':
                $c2 = $c->getNewCriterion(TaskPeer::STATID, 1);
                $c2->addOr($c->getNewCriterion(TaskPeer::STATID, 2));
                $c->add($c2);
        break;
        case 'testing':
             $c->add(TaskPeer::STATID, 3);
        break;  
        case 'ready':
             $c->add(TaskPeer::STATID, 6);
        break; 
            
        
    }
      
   
   
    $this->taskList = TaskPeer::doSelect($c);
    //$this->usrList = UsrPeer::doSelect($c);
  }

  public function executeCreate()
  {
    $this->form = new TaskForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = new TaskForm(TaskPeer::retrieveByPk($request->getParameter('id')));
  }
  
    public function executeSetstat($request)
  {
    if($this->getUser()->isAuthenticated() ){
        $spectatorId = $this->getUser()->getAttribute('subscriber_id','','subscriber'); 
        }
    $stat =  intval($request->getParameter('stat'));
    $task = TaskPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless(!$task or !$stat or ($task->getUserid() == $spectatorId));
    
    $task->setStatid($stat);
    $task->Save();
    $this->redirect('task/index');
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TaskForm(TaskPeer::retrieveByPk($request->getParameter('id')));

    $this->form->bind($request->getParameter('task'));
    if ($this->form->isValid())
    {
      $task = $this->form->save();

      $this->redirect('task/index');
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($task = TaskPeer::retrieveByPk($request->getParameter('id')));

    $task->delete();

    $this->redirect('task/index');
  }
}



