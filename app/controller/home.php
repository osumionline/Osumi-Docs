<?php
class home extends OController{
  /*
   * Página de inicio
   */
  function start($req){
    $this->getTemplate()->addPartial('header', 'common/header', ['lang' => 'cas']);
    $this->getTemplate()->addPartial('menu',   'common/menu',   ['page' => 'start']);
    $this->getTemplate()->addPartial('footer', 'common/footer', []);
  }
}
