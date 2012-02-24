<?php

/**
 * usr actions.
 *
 * @package    taskana
 * @subpackage usr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class usrActions extends sfActions
{
  public function executeIndex()
  {
    $this->usrList = UsrPeer::doSelect(new Criteria());
  }

  public function executeCreate()
  {
    $this->form = new UsrForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = new UsrForm(UsrPeer::retrieveByPk($request->getParameter('id')));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new UsrForm(UsrPeer::retrieveByPk($request->getParameter('id')));

    $this->form->bind($request->getParameter('usr'));
    if ($this->form->isValid())
    {
      $usr = $this->form->save();

      $this->redirect('usr/edit?id='.$usr->getId());
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($usr = UsrPeer::retrieveByPk($request->getParameter('id')));

    $usr->delete();

    $this->redirect('usr/index');
  }
  
     public function executeLogin($request)
  {
  
      $login_array = $request->getParameter('login'); 
            //print_r($login_array);
       $this->getUser()->setAuthenticated(false);
       $this->getUser()->clearCredentials();
       $this->getUser()->getAttributeHolder()->removeNamespace('subscriber'); 
            
            
         // Convert password to md5
         $login_array['pass']=md5($login_array['pass']); 
            
         $c = new Criteria();
         $c->add(UsrPeer::EMAIL, $login_array['login']);
         $c->add(UsrPeer::PASS, $login_array['pass']);
         $usr = UsrPeer::doSelectOne($c);
     
       
        if ($usr)
        {
            $usr->save();
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->addCredential('subscriber');
                        
            $this->getUser()->setAttribute('subscriber_id',$usr->getId(), 'subscriber');
            $this->getUser()->setAttribute('login', $usr->getEmail(), 'subscriber');  
               
            $this->redirect("task/index");
        }else{
        echo "Неверный пароль";
        exit;}
        //$this->redirect($reffer);
        $this->lname = $login_array['login'];
        $this->err = "<div style='color: red; font-size: 80%; margin-bottom: 20px;'>Такой почтовый адрес не зарегистрирован, либо пароль неверный.</div>";     
  }
  
  public function executeAuth($request)
  {
      
  }
}
