<?php
class UserView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function mostrarLogin($Titulo, $message = ''){
    $this->Smarty->assign('Titulo', $Titulo);
    $this->Smarty->assign('Message', $message);
    $this->Smarty->display('templates/login.tpl');
  }

  function mostrarSignUp($Titulo, $message = ''){
    $this->Smarty->assign('Titulo', $Titulo);
    $this->Smarty->assign('Message', $message);
    $this->Smarty->display('templates/signUp.tpl');
  }
}

 ?>
